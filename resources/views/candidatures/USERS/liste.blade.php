@extends('layouts.app')
@section('content')

<section class="container-fluid p-4">

    <div class="row">
        <div class="col-md-12 col-xl-8 col-12">
            <div class="row">


                <div class="col-md-12 mb-4">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Rapport sur les statistique de {{$user->name}}</h4>
                        </div>
                        <!-- card body -->

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4 col-md-12 col-12">
                                <div class="d-flex align-items-center justify-content-between p-4">
                                    <div>
                                        <h2 class="h1 fw-bold mb-0"> {{$countCandidature}}</h2>
                                        <p class="mb-0">Total candidature</p>
                                    </div>

                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-lg-4 col-md-12 col-12 border-start-md">
                                <div class="d-flex align-items-center justify-content-between p-4">
                                    <div>
                                        <h2 class="h1 fw-bold mb-0">{{$etatFiancier}} FCFA </h2>
                                        <p class="mb-0">Etat financier</p>
                                    </div>

                                </div>
                            </div>
                            <!-- col -->
                            <div class="col-lg-4 col-md-12 col-12 border-start-md">
                                <div class="d-flex align-items-center justify-content-between p-4">
                                    <div>
                                        <h2 class="h1 fw-bold mb-0">0 </h2>
                                        <p class="mb-0">Total versement</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <!-- card -->
                    <div class="card">
                        <!-- card body -->

                        <div class="card-header">
                            <h4 class="mb-0">Liste des candidatures </h4>
                        </div>
                        <!-- table -->
                        <div class="table-responsive overflow-y-hidden">
                            <table class="table mb-0 text-nowrap table-hover table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom </th>
                                        <th>Matricule</th>
                                        <th>Télephone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allCandidaturesByuSers as $candidature)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img src="{{ asset('candidatures/candidatures/'.$candidature->photo) }}" alt="" class="rounded-circle">
                                                </div>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">{{$candidature->nom}} {{$candidature->prenom}}</h5>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{$candidature->matricule}}</td>
                                        <td>
                                            {{$candidature->telephone}}
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4 col-12">


            <div class="card">
                <!-- Card header -->
                <div class="card-header card-header-height d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Derniers connexions {{$user->name}} </h4>
                    </div>

                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list-timeline-activity">
                        @foreach ($activites as $activite)
                        <li class="list-group-item px-0 pt-0 border-0 pb-6">
                            <div class="row position-relative">
                                <div class="col-auto">

                                </div>
                                <div class="col ms-n3">
                                    <h4 class="mb-0 h5"></h4>
                                    <p class="mb-0 text-body">date de connexion </p>
                                </div>
                                <div class="col-auto">
                                    <span class="fs-6">{{$activite->start_date}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
