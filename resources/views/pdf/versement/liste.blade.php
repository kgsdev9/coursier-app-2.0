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
<img src="{{public_path('logo.png')}}" alt="" style="height:60px">

<h2> Liste des versements  </h2>

<table>
  <tr>
    <th>Photo  </th>
    <th>Nom Prénom</th>
    <th>Montant</th>
    <th>Reférence</th>
    <th>Date</th>
  </tr>
  @foreach ($allVersements as $versement)
  <tr>
    <tr> 
    <td><img src="{{ public_path('candidatures/candidatures/'.$versement->candidature->photo) }}" alt="" style="height:50px;"></td>
    <td>{{$versement->candidature->nom}} {{$versement->candidature->prenom}} </td>
    <td>{{$versement->montant}} FCFA </td>
    <td>{{$versement->code_transaction}}</td>
    <td>{{$versement->created_at}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>









