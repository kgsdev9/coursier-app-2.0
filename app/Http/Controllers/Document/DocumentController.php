<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\TExtrait;
use Illuminate\Http\Request;
use Str;

class DocumentController extends Controller
{
   
    public function store(Request $request)
    {
        // Enregistrement sans validation
        TExtrait::create([
            'n_registre' => $request->n_registre,
            'fullname' => $request->fullname,
            'telephone' => $request->phone,
            'libellemodelivraison' => 'A Domicile',
            'document' => $request->document ?? 'rien',
            'qtecmde' => $request->documentQty,
            'commune_id' => $request->commune ?? 1,
            'codecommande' => $request->codecommande ?? rand(1000, 8899),
            'montanttva' => 0,
            'montantservice' => $request->serviceprice,
            'prixservice' => $request->serviceprice,
            'datelivreprevu' => now(),
            'adresse' => $request->deliveryPlace,
            'montanttc' => $request->totalAmount,
        ]);

        return response()->json([
            'message' => 'Enregistrement effectué avec succès',
            'success' => 1

        ], 201);
    }



}
