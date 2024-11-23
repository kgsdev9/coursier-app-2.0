<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes extraits</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

    <h2>Liste des commandes extraits</h2>

    <table>
        <thead>
            <tr>
                <th>N° Registre</th>
                <th>N° Commande</th>
                <th>Téléphone</th>
                <th>Commune</th>
                <th>Adresse</th>
                <th>Montant TTC</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listeextraits as $extrait)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{$extrait->n_registre}} {{$extrait->nom_complet}}</h5>
                    </div>
                </td>
                <td>{{$extrait->codecommande}}</td>
                <td>{{$extrait->telephone ?? 'rien'}}</td>
                <td>{{$extrait->commune->libellecommune ?? 'rien'}}</td>
                <td>{{$extrait->adresse ?? 'rien'}}</td>
                <td>{{$extrait->montanttc ?? 'rien'}} FCFA - Qte Cmde {{$extrait->qtecmde ?? 'rien'}}</td>
                <td>{{$extrait->created_at ?? 'rien'}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right; font-weight: bold;">Total :</td>
                <td style="font-weight: bold;">
                    {{ $listeextraits->sum('montanttc') }} FCFA
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
