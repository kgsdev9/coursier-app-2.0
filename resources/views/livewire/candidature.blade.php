<div>
    <div class="container">
     <div class="col-lg-12 col-md-8 col-12">
         <div class="card mb-4">
             <div class="p-4 d-flex justify-content-between align-items-center">
                 <div>
                     <h3 class="mb-0">Mes candidatures</h3>
                     <span>liste des mes candidatures engagées .</span>
                 </div>
                 <button class="btn btn-dark" wire:click="displayFormCandidature()"> <i class="fa fa-plus"></i>  Nouvelle candidature</button>
             </div>
         </div>
         <div class="card">

         @if($mode ==false)
         <div class="card">
             <div class="card-header border-bottom-0">
                 <div class="row">
                     <div class="col pe-0">

                             <input type="search"  wire:model.live="search"  class="form-control" placeholder="Rechercher">
                     </div>
                     <div class="col-auto">
                         <a href="{{route('candidature.users.export')}}" class="btn btn-secondary"> <i class="fa fa-file-excel-o"></i> Export CSV</a>
                         <a href="{{route('candidature.users.pdf')}}" class="btn btn-outline-warning"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                     </div>
                 </div>
             </div>
             <!-- Table -->
             <div class="table-responsive">
                 <table class="table table-hover table-centered">
                     <thead class="table-light">
                         <tr>

                             <th>Nom Prénom</th>
                             <th>Matricule</th>
                             <th>Télephone</th>
                             <th>Filiere</th>
                             <th>Type candidature</th>
                             <th>Etat</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($allCandidatures as $candidature)
                         <tr>

                             <td>
                                 <div class="d-flex align-items-center">
                                    <img src="{{asset('candidatures/candidatures/'.$candidature->photo)}}" class="rounded-circle avatar-md me-2">
                                     <h5 class="mb-0">{{$candidature->nom}} {{$candidature->prenom}}</h5>
                                 </div>
                             </td>
                             <td>{{$candidature->matricule}}</td>
                             <td>{{$candidature->telephone}}</td>
                             <td>{{$candidature->filiere->nom}}</td>
                             <td>
                                 {{$candidature->typecandidature->nom}}
                             </td>
                             <td>
                                @if($candidature->etat == "0")
                                <span class="badge bg-warning-soft">Encours</span>
                                @else
                                <span class="badge bg-success-soft">Validée</span>
                               @endif
                            </td>

                             <td class="pe-0 align-middle border-top-0">
                                 <a href="https://wa.me/+225{{$candidature->telephone}}?text=Je vous contacte pour votre candidature" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fa fa-whatsapp"></i> </a>
                                 @can('manager_general')
                                 <button wire:click="valider({{$candidature->id}})" class="btn btn-outline-success btn-sm">Valider</button>
                                 @endcan
                                     <button class="btn btn-outline-dark btn-sm" wire:click="edit({{$candidature->id}})"> <i class="fa fa-edit"></i></button>

                                     <button class="btn btn-outline-danger btn-sm" wire:click="delete({{$candidature->id}})" wire:confirm.prompt="Vous êtes sûr? \n\nType tapez oui pour confirmer|oui"> <i class="fa fa-trash"></i></button>
                                     <br>
                                 <a href="{{route('candidature.show', $candidature->id)}}" class="btn btn-outline-dark btn-sm" ><i class="fa fa-eye"></i></a>
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
