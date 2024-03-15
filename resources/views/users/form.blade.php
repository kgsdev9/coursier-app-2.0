<div class="row justify-content-center">
    <div class="col-lg-8 col-12">

            <div class="card mb-4">
                <!-- card body -->
                <div class="card-body">
                    @if($userId)
                    <h4 class="mb-4">Modifier utilisateur</h4>
                    @else
                    <h4 class="mb-4">Nouvel utilisateur</h4>
                    @endif
                    <!-- row -->
                    <div class="row gx-3">
                        <!-- input -->
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="firstName">Nom Complet </label>
                            <input type="text" class="form-control" placeholder="nom utilisateur" wire:model="fullname"  required="">

                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Télephone</label>
                            <input type="email" class="form-control" placeholder="+2250768365866" wire:model="telephone" required="">
                        </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Lieu de résidence</label>
                            <input type="text" class="form-control" placeholder="+Dokui Chaine avion" wire:model="lieu_de_residence" required="">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Email</label>
                            <input type="email" class="form-control" placeholder="email" wire:model="email" required="">
                        </div>
                        <!-- input -->

                        <!-- input -->
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="phone">Mot de passe </label>
                            <input type="password" class="form-control" placeholder="******" id="phone" required="" wire:model="password">

                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label" >Selectionnerun role </label>
                             <select  wire:model="role_id" class="form-control">
                                <option value="">Choisir</option>
                                @foreach ($allRoles as $role)
                                    <option value="{{$role->id}}">{{$role->nom}}</option>
                                @endforeach
                             </select>

                        </div>

                        <div class="mb-3 col-md-12">
                            @if($userId)
                          <button class="btn btn-outline-dark" wire:click="update()">Modifier</button>
                            @else
                            <button class="btn btn-outline-dark" wire:click="createUser()"> Enregistrer</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>




    </div>
</div>
