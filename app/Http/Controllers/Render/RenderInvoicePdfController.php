<?php

namespace App\Http\Controllers\Render;

use App\Models\Candidature;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RenderInvoicePdfController extends Controller
{
    public function printCandidatureUserPDF() {
        $allUsersCandidare = Candidature::where('user_id', Auth::user()->id)->get();

        $pdf = Pdf::loadView('pdf.candidatures.liste', [
            'allUsersCandidare'=> $allUsersCandidare
        ]);
        return $pdf->download('invoice.pdf');
     }
}

