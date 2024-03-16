<!DOCTYPE html>
<html>
<head>
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
<img src="{{ public_path('candidatures/candidatures/'.$singleVersement->candidature->photo) }}" alt="" style="height:60px">
<h2> Facture de versement de    {{$singleVersement->candidature->nom}}  {{$singleVersement->candidature->prenom}}  </h2>
<table>
  <tr>
    <th>Reférence</th>
    <th>Montant</th>
    <th>Date</th>
  </tr>
  <tr>
    <tr>
    <td>{{$singleVersement->code_transaction}}  </td>
    <td>{{$singleVersement->montant}} FCFA </td>
    <td>{{$singleVersement->created_at}}</td>
  </tr>
</table>
</body>
</html>









