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
                        <div>
                              <input type="file">

                        </div>
                    </div>
                    <hr class="my-5">
                    <div>
                        <h4 class="mb-0">Personal Details</h4>
                        <p class="mb-4">Edit your personal information and address.</p>
                        <!-- Form -->
                        <form class="row gx-3 needs-validation" novalidate="">
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" placeholder="First Name" required="" value="{{$detailCandidature->nom}}">

                            </div>
                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control" placeholder="Last Name" required="">
                                <div class="invalid-feedback">Please enter last name.</div>
                            </div>
                            <!-- Phone -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" placeholder="Phone" required="">
                                <div class="invalid-feedback">Please enter phone number.</div>
                            </div>
                            <!-- Birthday -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="birth">Birthday</label>
                                <input class="form-control flatpickr flatpickr-input" type="text" placeholder="Birth of Date" id="birth" name="birth" readonly="readonly">
                                <div class="invalid-feedback">Please choose a date.</div>
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Address Line 1</label>
                                <input type="text" id="address" class="form-control" placeholder="Address" required="">
                                <div class="invalid-feedback">Please enter address.</div>
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address2">Address Line 2</label>
                                <input type="text" id="address2" class="form-control" placeholder="Address" required="">
                                <div class="invalid-feedback">Please enter address.</div>
                            </div>
                            <!-- State -->
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
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
