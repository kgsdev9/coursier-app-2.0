<div>
   <div class="container">
    <div class="col-lg-12 col-md-8 col-12">
        <div class="card mb-4">
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">Mes candidatures</h3>
                    <span>liste des mes candidatures engagées .</span>
                </div>
                <button class="btn btn-dark" wire:click="displayFormCandidature()"> Nouvelle candidature</button>
            </div>
        </div>
        @if($mode ==false)
        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="row">
                    <div class="col pe-0">
                            <input type="search"  wire:model="search" class="form-control" placeholder="Rechercher">
                    </div>
                    <div class="col-auto">
                        <a href="{{route('candidature.users.export')}}" class="btn btn-secondary">Export CSV</a>
                        <a href="{{route('candidature.users.export')}}" class="btn btn-outline-warning">Export PDF</a>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Enrolled</th>
                            <th>Progress</th>
                            <th>Q/A</th>
                            <th>Locations</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCandidatures as $candidature)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{Storage::url($candidature->photo)}}" alt="" class="rounded-circle avatar-md me-2">
                                    <h5 class="mb-0">{{$candidature->nom}} {{$candidature->prenom}}</h5>
                                </div>
                            </td>
                            <td>3/12/2020</td>
                            <td>0%</td>
                            <td>0</td>
                            <td>
                                <span class="fs-6">
                                    <i class="fe fe-map-pin me-1"></i>
                                    Greece
                                </span>
                            </td>
                            <td class="pe-0 align-middle border-top-0">
                                <a href="#" class="btn btn-outline-secondary btn-sm">Message</a>
                            </td>

                            <td class="pe-0 align-middle border-top-0">
                               <button wire:click="valider({{$candidature->id}})" class="btn btn-outline-success btn-sm">Valider</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt-2 pb-4">
                <nav>
                    <ul class="pagination justify-content-center mb-0">
                        {{$allCandidatures->links()}}
                    </ul>
                </nav>
            </div>
        </div>
        @else
        @include('candidatures.form')
        @endif
    </div>
   </div>
</div>
