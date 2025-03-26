<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\EventRule;
use App\Models\EventOrganizer;
use App\Models\Sponser;
use App\Models\MainOrganizer;
use App\Models\EventRegistration;
use Auth;
use App\Exports\EventExport;
use App\Exports\EventsExport;
use App\Exports\UserExport;
use App\Exports\UsersPaidExport;
use App\Exports\UsersUnPaidExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function events(Request $request)
    {
        $search = $request->get('search', '');
        $events = Event::search($search)->get();
        return view('frontend.events', compact('events'));
    }

    public function event($id)
    {
        $event = Event::find($id);
        $eventRule = EventRule::where('event_id', $id)->get();
        $eventOrganizer = EventOrganizer::where('event_id', $id)->get();
        return view('frontend.event', compact('event'), compact('eventRule'), compact('eventOrganizer'));
    }

    public function sponsors()
    {
        $sponsors = Sponser::all();
        return view('frontend.sponsors', compact('sponsors'));
    }

    public function organizers()
    {
        $organizers = MainOrganizer::all();
        return view('frontend.about', compact('organizers'));
    }
    public function qrcode_scanner()
    {
        return view('frontend.qrcode_scanner');
    }
    // public function team(){
    //     $sponsors = Sponser::all();
    //     return view('frontend.sponsors',compact('sponsors'));
    // }

    public function profile()
    {
        // dd(Auth::user()->eventRegistrations);
        $all_events = Event::where('is_registration', 1)->get();
        return view('frontend.profile', compact('all_events'));
    }

    public function addEvents(Request $request)
    {
        // dd($request);

        if (isset($request->events)) {
            foreach ($request->events as  $event) {
                // $event = EventRegistration::where('user_id','=',Auth::user()->id);
                // $event->where('event_id', '=', $event);
                if (EventRegistration::where('user_id', '=', Auth::user()->id)->where('event_id', '=', $event)->exists()) {
                } else {
                    $reg = new EventRegistration;
                    $reg->user_id = Auth::user()->id;
                    $reg->event_id = $event;
                    $reg->save();
                }
            }
        }

        return redirect('profile');
    }

    public function link_storage()
    {
        Artisan::call("storage:link");
    }

    public function user_details(Request $request)
    {
        $user = User::where('uid', $request->uid)->first();
        if ($user) {
            return view('frontend.user_details', compact('user'));
        } else {
            return 'user not found dude';
        }
    }
    public function exportSingleEvent($id)
    {
        $event = Event::find($id);
        return Excel::download(new EventExport($id), $event->name.'.xlsx');
    }
    public function exportAllEvent()
    {
        return Excel::download(new EventsExport, 'events.xlsx');
    }
    public function exportAllUsers()
    {
        return Excel::download(new UserExport, 'users.xlsx'); 
    }
    public function exportPaidUsers()
    {
        return Excel::download(new UsersPaidExport, 'users.xlsx');
    }
    public function exportUnPaidUsers()
    {
        return Excel::download(new UsersUnPaidExport, 'users.xlsx');
    }
}
