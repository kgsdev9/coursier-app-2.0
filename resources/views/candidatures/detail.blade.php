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
                            <img src="{{Storage::url($detailCandidature->photo)}}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar">
                            <div class="ms-3">
                                <h4 class="mb-0">Photo</h4>

                            </div>
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
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Identifiant permanent</label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->identifiant_permanent}}" disabled>

                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Serie Bac </label>
                                <input type="text" id="address" class="form-control" value="{{$detailCandidature->serie}}" disabled>

                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="editState">State</label>
                                <select class="form-select" id="editState" required="">
                                    <option value="">Select State</option>
                                    <option value="1">Gujarat</option>
                                    <option value="2">Rajasthan</option>
                                    <option value="3">Maharashtra</option>
                                </select>
                                <div class="invalid-feedback">Please choose state.</div>
                            </div>
                            <!-- Country -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="editCountry">Country</label>
                                <select class="form-select" id="editCountry" required="">
                                    <option value="">Select Country</option>
                                    <option value="1">India</option>
                                    <option value="2">UK</option>
                                    <option value="3">USA</option>
                                </select>
                                <div class="invalid-feedback">Please choose country.</div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
