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

                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table  id="myTable"  class="table table-hover table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>Nom </th>
                            <th>Email</th>
                            <th>Matricule</th>
                            <th>Administrateur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allusers as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{$user->name}}</h5>
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->is_admin}}</td>
                            <td class="pe-0 align-middle border-top-0">
                                <a href="#" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fa fa-edit"></i> </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fa fa-trash"></i> </a>
                                <a href="#" class="btn btn-outline-success btn-sm" wire:navigate>Consulter</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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





