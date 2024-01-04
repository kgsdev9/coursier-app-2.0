<div class="row mt-0 mt-md-4">
    <div class="col-lg-12 col-md-8 col-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <!-- Card -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                @if($candidatureId)
                <h3 class="mb-0">Modifier candidature</h3>
                @else
                <h3 class="mb-0">Nouvelle candidature</h3>
                @endif
                <p class="mb-0">
                    Entrer les  informations sur la candidatures.
                </p>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                        @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" id="img-uploaded" class="avatar-xl rounded-circle">
                        @else
                        <img src="{{asset('storage/photos/'.$oldImage) }}" alt=""  class="avatar-xl rounded-circle">
                        @endif
                        <div class="ms-3">
                            <h4 class="mb-0">Photo</h4>
                            <p class="mb-0">
                                PNG ou JPG ne dépassant pas 20 px de large et de haut.
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type="file" wire:model="photo">
                        <div wire:loading wire:target="photo">Uploading...</div>
                    </div>
                </div>
                <hr class="my-5">
                <div>
                  <div class="row gx-3 needs-validation">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="fname">Nom </label>
                            <input type="text" wire:model="nom" id="fname" class="form-control" placeholder="Entrer le nom du candidat" required="">

                        </div>
                        <!-- Last name -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="lname">Prénom</label>
                            <input type="text"  wire:model="prenom" id="lname" class="form-control" placeholder="Last Name" required="">

                        </div>
                        <!-- Phone -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="phone">Email</label>
                            <input type="text" id="phone" wire:model="email" class="form-control" placeholder="Phone" required="">
                            <div class="invalid-feedback">
                                Please enter phone number.
                            </div>
                        </div>
                        <!-- Birthday -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="birth">Matricule</label>
                            <input class="form-control flatpickr flatpickr-input" wire:model="matricule" type="text" wire:model="candidature">
                            <div class="invalid-feedback">
                                Please choose a date.
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Identifiant permanent1</label>
                            <input type="text" id="address" wire:model="identifiant_permanent" class="form-control" placeholder="Address" required="">

                        </div>
                        <!-- Address -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address2">Télephone</label>
                            <input type="text" id="address2" wire:model="telephone" class="form-control" placeholder="+225009998978" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Serie bac </label>
                            <input type="text" id="address" wire:model="serie" class="form-control" placeholder="Serie D" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Centre composition </label>
                            <input type="text" id="address" wire:model="centre_composition" class="form-control" placeholder="Serie D" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Ville  composition </label>
                            <input type="text" id="address" wire:model="ville_composition" class="form-control" placeholder="Serie D" required="">

                        </div>


                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Numero BTS</label>
                            <input type="text" id="address" wire:model="numero_bts" class="form-control" placeholder="Serie D" required="">
                            <div class="invalid-feedback">
                                Please enter address.
                            </div>
                        </div>

                        <!-- State -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="editState">Mention</label>
                            <select class="form-select"  wire:model="mention" required="">
                                <option value="Bien">Bien</option>
                                <option value="Assez birn">Assez bien </option>
                                <option value="Tres bien">Trés Bien </option>
                            </select>

                        </div>
                        <!-- Country -->

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Point bac </label>
                            <input type="text" id="address" wire:model="point_bac" class="form-control" placeholder="230" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Ecole d'origine </label>
                            <input type="text" id="address" wire:model="ecole_origine" class="form-control" placeholder="Université methodiste" required="">

                        </div>


                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="editState">Sece</label>
                            <select class="form-select"  wire:model="sexe" required="">
                                <option value="M">Bien</option>
                                <option value="F">Assez bien </option>

                            </select>

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Numero de table </label>
                            <input type="text"  wire:model="numero_table" class="form-control" placeholder="113309989" required="">

                        </div>
                        <div class="col-12">
                            @if($candidatureId)
                            <button class="btn btn-primary" wire:click="update()">Modifier la candidature</button>
                            @else
                            <button class="btn btn-primary" wire:click="createCandidature">Enregistrer la candidature</button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
