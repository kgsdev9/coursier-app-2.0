@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-9 col-md-8 col-12 align-items-center justify-content-between">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Informatiion sur le profil </h3>

                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <img src="{{asset('storage/photos/'.$detailCandidature->photo)}}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar">
                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <form class="row gx-3 needs-validation" novalidate="">
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">Nom</label>
                                <input type="text" id="fname" class="form-control" placeholder="First Name" required="" value="{{$detailCandidature->nom}}" disabled>
                            </div>
                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname">Prénom</label>
                                <input type="text" id="lname" class="form-control" placeholder="Last Name" value="{{$detailCandidature->prenom}}" disabled>
                                <div class="invalid-feedback">Please enter last name.</div>
                            </div>
                            <!-- Phone -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Télephone</label>
                                <input type="text" id="phone" class="form-control" placeholder="Phone" value="{{$detailCandidature->telephone}}" disabled>
                            </div>
                            <!-- Birthday -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="birth">Matricule</label>
                                <input class="form-control flatpickr flatpickr-input" type="text" value="{{$detailCandidature->matricule}}" disabled>
                            </div>
                            <!-- Address -->
                            @can('administrateur')
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Identifiant permanent</label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->identifiant_permanent}}" disabled>

                            </div>
                            @endcan


                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Serie Bac </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->serie}}" disabled>

                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Date de naissance  </label>
                                <input type="date" id="address" class="form-control" value="{{$detailCandidature->date_naissance}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Lieu  de naissance  </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->lieu_naissance}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Type candidature </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->typecandidature->nom}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Sexe </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->sexe}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Filiere </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->filiere->nom}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Centre composition Bac  </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->centre_composition}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Ville  composition Bac  </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->ville_composition}}" disabled>
                            </div>
                            @can('administrateur')


                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Status    </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->status}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Numero bts</label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->numero_bts}}" disabled>
                            </div>
                            @endcan

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Numero table  </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->numero_table}}" disabled>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Email  </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->email}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Ecole d'origine</label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->ecole_origine}}" disabled>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Nationnalité</label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->nationalite->nom}}" disabled>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
