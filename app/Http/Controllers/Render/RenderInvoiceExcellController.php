<?php

namespace App\Http\Controllers\Render;

use App\Exports\AdminCandidatureExport;
use App\Exports\UserCanidatureExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class RenderInvoiceExcellController extends Controller
{
     public function printCandidatureUserExcell() {
        return Excel::download(new UserCanidatureExport, 'candidature.xlsx');
     }


     public function printCandidatureAdminExcell() {
        return Excel::download(new AdminCandidatureExport, 'candidatureadmin.xlsx');
     }
}
