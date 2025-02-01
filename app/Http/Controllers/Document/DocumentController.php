<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\TExtrait;
use Illuminate\Http\Request;
use Str;
use App\Mail\NewCommandeNotification;
use Illuminate\Support\Facades\Mail;

class DocumentController extends Controller
{

    public function store(Request $request)
    {


        $image = "";

        if ($request->hasFile('image')) {
            $image = md5($request->image->getClientOriginalName() . microtime()) . '.' . $request->image->extension();
            $request->image->storeAs('extraits', $image);
        }

        $codeextrait  = TExtrait::generateExtraitCode();
        // Enregistrement sans validation
        TExtrait::create([
            'n_registre' => $request->n_registre,
            'fullname' => $request->fullname,
            'telephone' => $request->phone,
            'libellemodelivraison' => 'A Domicile',
            'document' => $image,
            'qtecmde' => $request->documentQty,
            'commune_id' => $request->commune ?? 1,
            'codecommande' => $codeextrait,
            'montanttva' => 0,
            'montantservice' => $request->serviceprice,
            'prixservice' => $request->serviceprice,
            'datelivreprevu' => now(),
            'adresse' => $request->deliveryPlace,
            'montanttc' => $request->totalAmount,
        ]);

        // Mail::to(['kgsdev8@gmail.com', 'kouassiach79@gmail.com'])
        //     ->send(new NewCommandeNotification([
        //         'n_registre' => $request->n_registre,
        //         'nom_complet' => $request->fullname,
        //         'adresse' => $request->deliveryPlace,
        //         'quantite' => $request->documentQty,
        //         'montanttc' => $request->totalAmount,
        //     ]));

        return response()->json([
            'message' => 'Enregistrement effectué avec succès',
            'success' => 1

        ], 201);
    }
}
