<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventExport  implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function __construct($id)
    {
        $this->id = $id;
    }
    // public function query()
    // {
    //     return EventRegistration::query()->where('event_id',$this->id);
    // }

    public function view(): View
    {
        set_time_limit(300);
        return view('exports.event_registrations', [
            'event_registrations' => EventRegistration::where('event_id', $this->id)->get()
        ]);
    }
}
