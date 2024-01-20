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
                            <input type="text"  wire:model="prenom" id="lname" class="form-control" placeholder="Guy stephane" required="">

                        </div>
                        <!-- Phone -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="phone">Email</label>
                            <input type="text" id="phone" wire:model="email" class="form-control" placeholder="kgsdev8@gmail.com" required="">
                            <div class="invalid-feedback">
                                Please enter phone number.
                            </div>
                        </div>
                        <!-- Birthday -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="birth">Matricule MENET </label>
                            <input class="form-control flatpickr flatpickr-input" wire:model="matricule" type="text" placeholder="TD98877878">
                            <div class="invalid-feedback">
                                Please choose a date.
                            </div>
                        </div>

                        @can('administrateur')


                        <!-- Address -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Identifiant permanent </label>
                            <input type="text" id="address" wire:model="identifiant_permanent" class="form-control" placeholder="KJGG8877888" required="">

                        </div>
                        @endcan
                         <!-- Address -->
                         <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Lieu de naissance</label>
                            <input type="text" id="address" wire:model="lieu_naissance" class="form-control" placeholder="Cocody" required="">

                        </div>


                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Date de naissance</label>
                            <input type="date" id="address" wire:model="date_naissance" class="form-control" placeholder="Address" required="">

                        </div>
                        <!-- Address -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address2">Télephone (01)</label>
                            <input type="text" id="address2" wire:model="telephone" class="form-control" placeholder="+225009998978" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address2">Télephone (02)</label>
                            <input type="text" id="address2" wire:model="contact" class="form-control" placeholder="+225009998978" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Série du BAC (BP,BP)  </label>
                            <select  class="form-control" wire:model="serie">
                                <option value="">Choisir</option>
                                <option value="D">D</option>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="C">C</option>
                                <option value="E">E</option>
                                <option value="F1">F1</option>
                                <option value="F2">F2</option>
                                <option value="F3">F3</option>
                                <option value="F4">F4</option>
                                <option value="F7">F7</option>
                                <option value="G2">G1</option>
                                <option value="G2">G2</option>
                                <option value="G2">H1</option>
                                <option value="G2">H3</option>
                                <option value="G2">BT</option>
                                <option value="G2">BP</option>
                        </select>

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Centre composition Bac  </label>
                            <input type="text" id="address" wire:model="centre_composition" class="form-control" placeholder="KOFFI AGO" required="">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Ville composition </label>
                            <select class="form-control" wire:model="ville_composition">
                                       <option value="">Choisir</option>
                                      <option value="ABIDJAN">ABIDJAN</option>
                                      <option value="DAOUKRO">DAOUKRO</option>
                                      <option value="BONOUA">BONOUA</option>
                                      <option value="AZAGUIE">AZAGUIE</option>
                                      <option value="YAMOUSSOUKRO">YAMOUSSOUKRO</option>
                                      <option value="BONDOUKOU">BONDOUKOU</option>
                                      <option value="AZAGUIE">AZAGUIE</option>
                                      <option value="ABENGOUROU">ABENGOUROU</option>
                                      <option value="ADZOPE">ADZOPE</option>
                                      <option value="BOUAKE">BOUAKE</option>
                                      <option value="DALOA">DALOA</option>
                                      <option value="DIMBOKRO">DIMBOKRO</option>
                                      <option value="BOUAKE">BOUAKE</option>
                                      <option value="GAGNOA">GAGNOA</option>
                                      <option value="KORHOGO">KORHOGO</option>
                                      <option value="SAN PEDRO">SAN PEDRO</option>
                                      <option value="ODIENNE">ODIENNE</option>
                                      <option value="JACQUEVILLE">JACQUEVILLE</option>
                            </select>

                        </div>

                        @can('administrateur')


                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Numero BTS</label>
                            <input type="text" id="address" wire:model="numero_bts" class="form-control" placeholder="Serie D" required="">
                            <div class="invalid-feedback">
                                Please enter address.
                            </div>
                        </div>
                        @endcan
                        <!-- State -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="editState">Type de candidature</label>
                            <select class="form-select"  wire:model="typecandidature_id" >
                                <option value="">Choisir</option>
                                @foreach ($allTypeCandidature as $type)
                                <option value="{{$type->id}}">{{$type->nom}}</option>
                                @endforeach
                            </select>

                        </div>
                        <!-- Country -->

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Filiere BTS </label>
                             <select wire:model="filiere_id" id="" class="form-control">
                                <option value="">Choisir une filiere</option>
                                @foreach ($allFilieres as $filiere)
                                <option value="{{$filiere->id}}">{{$filiere->nom}}</option>
                                @endforeach

                             </select>

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Point Bac  </label>
                             <input type="number" class="form-control" wire:model="point_bac" placeholder="244">

                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Ecole d'origine </label>
                            <input type="text" id="address" wire:model="ecole_origine" class="form-control" placeholder="Université methodiste" required="">

                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="editState">Sexe</label>
                            <select class="form-select"  wire:model="sexe">
                                <option value="">Choisir</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin </option>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Numero de table BT/BAC </label>
                            <input type="text"  wire:model="numero_table" class="form-control" placeholder="113309989" required="">

                        </div>
                        @can('administrateur')
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Status </label>
                            <select class="form-select"  wire:model="status" required="">
                                <option value="">Choisir un status</option>
                                <option value="Affecte">Affecte</option>
                                <option value="Non Affecte">Non Affecte</option>

                            </select>

                        </div>
                        @endif
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="address">Nationnalite</label>
                            <select class="form-select"  wire:model="nationalite_id" required="">
                                <option value="">Choisir un status</option>
                                @foreach ($allNationalites as $nationnalites)
                                <option value="{{$nationnalites->id}}">{{ $nationnalites->nom}}</option>
                                @endforeach
                            </select>

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
