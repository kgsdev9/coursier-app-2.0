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
                <th>N° Cmde</th>
                <th>Télephone</th>
                <th>Commune</th>
                <th>Adressse</th>
                <th>Montant Qte</th>
                <th>Date</th>
                <th>statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listeextraits as $extrait)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ $extrait->n_registre }} {{ $extrait->nom_complet }}</h5>
                    </div>
                </td>
                <td>{{ $extrait->codecommande }}</td>
                <td>
                    <a href="https://wa.me/+225{{ $extrait->telephone }}?text=Je vous contacte pour votre candidature" class="text-dark d-flex align-items-center">
                        <i class="fa fa-whatsapp nav-icon me-2"></i>
                        {{ $extrait->user->telephone ?? '' }}
                    </a>
                </td>
                <td>{{ $extrait->commune->libellecommune ?? '' }}</td>
                <td>{{ $extrait->adresse ?? '' }}</td>
                <td>{{ $extrait->montanttc ?? '' }} FCFA Qte {{ $extrait->qtecmde ?? '' }}</td>
                <td>{{ $extrait->created_at ? $extrait->created_at->format('d-m-Y') : '' }}</td>
                <td>
                    @if($extrait->status == 1)
                        En cours
                    @elseif($extrait->status == 2)
                        Validé
                    @elseif($extrait->status == 3)
                        Échec
                    @else
                        Non défini
                    @endif
                </td>
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
