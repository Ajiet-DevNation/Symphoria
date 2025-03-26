<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersUnPaidExport  implements FromView
{

    public function view(): View
    {
        set_time_limit(300);
        return view('exports.users', [
            'users' => User::where('is_paid', 0)->get()
        ]);
    }
}
