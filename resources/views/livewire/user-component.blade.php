<div class="container">
    <div class="col-lg-12 col-md-8 col-12">
        <div class="card mb-4">
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">Toutes les users</h3>
                    <span>toutes les users engagées par utilisateurs .</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="row">
                    <div class="col pe-0">
                     <input type="search"  wire:model.live="search"  class="form-control" placeholder="Rechercher">
                    </div>
                     <div class="col-auto">
                        <button wire:click="displayForm()" class="btn btn-secondary"> <i class="fa fa-plus"></i>Nouveau</button>

                    </div>
                </div>
            </div>
            <!-- Table -->
            @if($mode)
            <div class="table-responsive">
                <table  id="myTable"  class="table table-hover table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>Nom </th>
                            <th>Email</th>
                            <th>Télephone</th>
                            <th>Administrateur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allusers as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{$user->fullname}}</h5>
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>{{$user->role->nom}}</td>
                            <td class="pe-0 align-middle border-top-0">
                                <a href="#" class="btn btn-outline-secondary btn-sm" wire:click="edit({{$user}})"><i class="fa fa-edit"></i> </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" wire:click="delete({{$user}})"><i class="fa fa-trash"></i> </a>
                                <a href="#" class="btn btn-outline-success btn-sm">N°candidature  {{count($user->candidatures)}} </a>
                                <a href="{{route('users.candidature', $user)}}" class="btn btn-outline-secondary btn-sm"> Mes Candidatures</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            @include('users.form');
            @endif
            <div class="pt-2 pb-4">
                <nav>
                    <ul class="pagination justify-content-center mb-0">
                        {{$allusers->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
   </div>





