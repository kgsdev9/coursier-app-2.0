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
<img src="{{ public_path('candidatures/candidatures/'.$candidature->photo) }}" alt="" style="height:60px">
<h2> Liste des versements de   {{$candidature->nom}}  {{$candidature->preom}}  </h2>
@php
    $somme  = 0;
@endphp
<table>
  <tr>
    <th>Reférence</th>
    <th>Montant</th>
    <th>Date</th>
  </tr>
  @foreach ($allversementstudent as $versement)
  @php
      $somme +=$versement->montant
  @endphp
  <tr>
    <tr>
    <td>{{$versement->code_transaction}}  </td>
    <td>{{$versement->montant}} FCFA </td>
    <td>{{$versement->created_at}}</td>
  </tr>
  @endforeach
</table>
    <h1>Montant versé par l'etudiant {{$somme}} FCFA </h1>
</body>
</html>









