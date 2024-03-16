<?php

namespace App\Http\Controllers\Render;

use App\Models\Candidature;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Versement;
use Illuminate\Support\Facades\Auth;

class RenderInvoicePdfController extends Controller
{
    public function printCandidatureUserPDF() {
        $allUsersCandidare = Candidature::where('user_id', Auth::user()->id)->get();

        $pdf = Pdf::loadView('pdf.candidatures.liste', [
            'allUsersCandidare'=> $allUsersCandidare
        ])->setPaper('a4', 'landscape');
        return $pdf->download('candidatureusers.pdf');
     }

     public function printallVersementStudent($id) {
        $candidature = Candidature::find($id);
        $versement = Versement::where('candidature_id', $candidature->id)->orderByDesc('created_at')->get();
        $pdf = Pdf::loadView('pdf.versement.versementetudiant', [
            'candidature'=> $candidature,
            'allversementstudent' =>$versement
        ])->setPaper('a4', 'landscape');
        return $pdf->download('listedesversements.pdf');
     }

     public function singleVersementStudent($id) {
        $versement = Versement::find($id);
        $pdf = Pdf::loadView('pdf.versement.singleversement', [
            'singleVersement' =>$versement
        ])->setPaper('a4', 'landscape');
        return $pdf->download('recudepaiement.pdf');
     }


     public function printCandidatureAdminPDF() {
        $allUsersCandidare = Candidature::all();
        $pdf = Pdf::loadView('pdf.candidatures.adminliste', [
            'allCandidature'=> $allUsersCandidare
        ])->setPaper('a4', 'landscape');
        return $pdf->download('candidatureliste.pdf');
     }


     public function printVersement() {
        $allVersements = Versement::all();
        $pdf = Pdf::loadView('pdf.versement.liste', [
            'allVersements'=> $allVersements
        ])->setPaper('a4', 'landscape');
        return $pdf->download('listeversement.pdf');
     }



}

