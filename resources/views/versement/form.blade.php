<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">Nouveau versement</h3>


    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-4 mb-lg-0">
                <img src="" alt=""  class="avatar-xl rounded-circle">
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
                    <select name="" class="form-control " id="select2">
                        @foreach ($allCandidatures as $candidature)
                        <option value="{{$candidature->id}}">{{$candidature->nom}}</option>
                        @endforeach
                     </select>
                </div>

                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address">Numero de table </label>
                    <input type="text"  wire:model="numero_table" class="form-control" placeholder="113309989" required="">

                </div>
                <div class="col-12">

                    <button class="btn btn-primary" wire:click="update()">Modifier la candidature</button>


                </div>
            </div>
        </div>
    </div>
</div>
