<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventsExport  implements FromView
{

    public function view(): View
    {
        set_time_limit(300);
        return view('exports.all_registrations', [
            'event_registrations' => EventRegistration::all()
        ]);
    }
}
