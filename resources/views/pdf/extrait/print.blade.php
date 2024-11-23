<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrait</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Facture -  {{ $extrait->codecommande }} Payable à la livraison</h2>

        <table>

            <tr>
                <th>Code Commande</th>
                <td>{{ $extrait->codecommande }}</td>
            </tr>

            <tr>
                <th>Date Commande</th>
                <td>{{ $extrait->created_at }}</td>
            </tr>

            <tr>
                <th>Nom Complet</th>
                <td>{{ $extrait->nom_complet }}</td>
            </tr>

            <tr>
                <th>Adresse</th>
                <td>{{ $extrait->adresse }}</td>
            </tr>

            <tr>
                <th>Numéro de registre</th>
                <td>{{ $extrait->n_registre }}</td>
            </tr>
           
            <tr>
                <th>Telephone</th>
                <td>{{ $extrait->user->telephone }}</td>
            </tr>
            <tr>
                <th>Modèle de Livraison</th>
                <td>A Domicile</td>
            </tr>
            <tr>
                <th>Commune</th>
                <td>{{ $extrait->commune->libellecommune }}</td>
            </tr>

            <tr>
                <th>Quantité Commandée</th>
                <td>{{ $extrait->qtecmde }}</td>
            </tr>

            <tr>
                <th>Montant TVA</th>
                <td>{{ $extrait->montanttva }}</td>
            </tr>
            <tr>
                <th>Montant TTC</th>
                <td>{{ $extrait->montanttc }} FCFA</td>
            </tr>



        </table>
    </div>

</body>
</html>
