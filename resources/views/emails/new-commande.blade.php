<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Commande</title>
</head>
<body>
    <h1>Nouvelle commande reçue</h1>
    <p><strong>Numéro de registre : </strong>{{ $commande['n_registre'] }}</p>
    <p><strong>Nom complet : </strong>{{ $commande['nom_complet'] }}</p>
    <p><strong>Adresse : </strong>{{ $commande['adresse'] }}</p>
    <p><strong>Quantité : </strong>{{ $commande['quantite'] }}</p>
    <p><strong>Montant total : </strong>{{ $commande['montanttc'] }} FCFA </p>
</body>
</html>
