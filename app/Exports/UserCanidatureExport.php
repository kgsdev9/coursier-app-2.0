<?php

namespace App\Exports;

use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserCanidatureExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Candidature::where('user_id', Auth::user()->id)->get();
    }
}
