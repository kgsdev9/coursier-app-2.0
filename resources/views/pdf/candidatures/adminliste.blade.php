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

<h2> Liste de toutes les  candidatures </h2>

<table>
  <tr>
    <th>Photo  </th>
    <th>Nom Prénom</th>
    <th>Matricule</th>
    <th>Télephone</th>
    <th>Id Permanent</th>
  </tr>
  @foreach ($allCandidature as $etudiant)
  <tr>
    <tr>
    <td><img src="{{ public_path('storage/photos/'.$etudiant->photo) }}" alt="" style="height:50px;"></td>
    <td>{{$etudiant->nom}} {{$etudiant->prenom}} </td>
    <td>{{$etudiant->matricule}}</td>
    <td>{{$etudiant->telephone}}</td>
    <td>{{$etudiant->identifiant_permanent}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>









