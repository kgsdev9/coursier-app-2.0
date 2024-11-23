<div>
    <div class="container">
     <div class="col-lg-12 col-md-8 col-12">
         <div class="card mb-4">
             <div class="p-4 d-flex justify-content-between align-items-center">
                 <div>
                     <h3 class="mb-0">EXPRESSIONS DE BESOINS EXTRAIT  </h3>
                     <span>liste des commandes d'extraits</span>
                 </div>
                 <button class="btn btn-dark"> <i class="fa fa-plus"></i> Nouvelle Demande</button>
             </div>
         </div>
         <div class="card">
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

                             <th>N° Registre</th>
                             <th>N° Commande</th>
                             <th>Télephone</th>
                             <th>Commune</th>
                             <th>Adressse</th>
                             <th>Montant Qte</th>
                             <th>Date</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($allextraits as $extrait)
                         <tr>

                             <td>
                                 <div class="d-flex align-items-center">
                                   <a href="{{asset('documents/extraits/'.$extrait->document)}}" target="_blank"> <img src="{{asset('assets/img/avatars/1.png')}}" class="rounded-circle avatar-md me-2"></a>
                                     <h5 class="mb-0">{{$extrait->n_registre}} {{$extrait->nom_complet}}</h5>
                                 </div>
                             </td>
                              <td>{{$extrait->codecommande }}</td>
                              <td>{{$extrait->telephone ?? 'rien'}}</td>
                              <td>{{$extrait->commune->libellecommune ?? 'rien'}}</td>
                              <td>{{$extrait->adresse ?? 'rien'}}</td>
                              <td>{{$extrait->montanttc ?? 'rien'}} FCFA  Qte Cmde {{$extrait->qtecmde ?? 'rien'}} </td>
                              <td>{{$extrait->created_at ?? 'rien'}}</td>


                             <td class="pe-0 align-middle border-top-0">
                                 <a href="https://wa.me/+225{{$extrait->telephone}}?text=Je vous contacte pour votre candidature" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fa fa-whatsapp"></i> </a>
                                 @can('manager_general')
                                 <button wire:click="valider({{$extrait->id}})" class="btn btn-outline-success btn-sm">Valider</button>
                                 @endcan
                                     <button class="btn btn-outline-danger btn-sm" wire:click="delete({{$extrait->id}})" wire:confirm.prompt="Vous êtes sûr? \n\nType tapez oui pour confirmer|oui"> <i class="fa fa-trash"></i></button>
                                     <br>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             <div class="pt-2 pb-4">
                 <nav>
                     <ul class="pagination justify-content-center mb-0">
                         {{$allextraits->links()}}
                     </ul>
                 </nav>
             </div>
         </div>

     </div>
    </div>
 </div>
