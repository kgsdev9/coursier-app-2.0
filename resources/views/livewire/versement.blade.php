<div>
    <div class="container">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="card mb-4">
                <div class="p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">Mes Versements </h3>
                        <span>Gestion des verements.</span>
                    </div>

                </div>
            </div>
            <div >
                <div>
                    <div class="col-xl-12 col-lg-12 col-12 mb-3">
                        <!-- Content -->
                        <div class="row">
                            <div class="col pe-0">
                                <!-- Form -->
                                <form>
                                    <input type="search" wire:model.live="search"  class="form-control" placeholder="Rechercher">
                                </form>
                            </div>
                            <!-- Button -->
                            <div class="col-auto">
                                <a href="#" class="btn btn-secondary">Export CSV</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($allCandidatures as $candidature)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/photos/'.$candidature->photo) }}" class="rounded-circle avatar-xl mb-3" alt="avatar">
                                        <h4 class="mb-1">{{$candidature->nom}} {{$candidature->prenom}}</h4>
                                        <p class="mb-0">
                                            <i class="fe fe-map-pin me-1"></i>
                                           Matricule {{$candidature->matricule}}
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary" wire:click="displayCandidature({{$candidature->id}})" >
                                            <i class="fa fa-plus"></i>Nouveau versement
                                          </button>

                                        <br><br>
                                        <a href="#" class="btn btn-outline-warning"> <i class="fa fa-list"></i> Liste des versements</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                            @include('modals.versements.form')
                        <div class="col-lg-12 col-md-12 col-12">


                        </div>
                    </div>

                    <nav>
                        {{$allCandidatures->links()}}
                     </nav>
                </div>

            </div>
        </div>
       </div>


       @include('modals.versements.form')
</div>


@push('scripts')
<script>
window.addEventListener('closeModal', event => {
            $('#exampleModal').modal('hide');
        });

        window.addEventListener('openModal', event => {
            $('#exampleModal').modal('show');
        });
</script>
@endpush


