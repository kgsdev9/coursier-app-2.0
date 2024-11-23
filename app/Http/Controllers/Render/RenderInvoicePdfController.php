<?php

namespace App\Http\Controllers\Render;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\TExtrait;
use Illuminate\Http\Request;

class RenderInvoicePdfController extends Controller
{

    public function printCandidatureUserPDF(Request $request)
    {
        dd('ssss');
        // Récupération des critères depuis la requête
        $search = $request->input('search', '');
        $commune_id = $request->input('commune_id', '');
        $statut = $request->input('statut', '');

        // Filtrage basé sur les critères
        $query = TExtrait::query();

        if (!empty($search)) {
            $query->where('codecommande', 'like', '%' . $search . '%');
        }

        if (!empty($commune_id)) {
            $query->where('commune_id', $commune_id);
        }

        // if (!empty($statut)) {
        //     $query->where('statut', $statut);
        // }

        $extraits = $query->orderByDesc('created_at')->get();

        // Génération du PDF avec DomPDF
        $pdf = Pdf::loadView('pdf.candidatures.liste', [
            'listeextraits'=> $extraits
        ])->setPaper('a4', 'landscape');
        return $pdf->download('extraits.pdf');
    }


}

