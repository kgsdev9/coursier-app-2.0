<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportCandidatureRequest;
use App\Imports\CandidatureImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class ImportController extends Controller
{
     public function import(ImportCandidatureRequest $request)  {

          Excel::import(new CandidatureImport, $request->file('file'));
     
            return redirect()->back();
     }
}
