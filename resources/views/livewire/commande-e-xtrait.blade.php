<div>
    <div class="container">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="card mb-4">
                <div class="p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">EXPRESSIONS DE BESOINS EXTRAIT</h3>
                        <span>Liste des commandes d'extraits</span>
                    </div>
                    <button class="btn btn-dark"> <i class="fa fa-plus"></i> Nouvelle Demande</button>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="row">
                        <div class="col-md-2 pe-0">
                            <input type="search" wire:model.live.2000ms="search" class="form-control" placeholder="Rechercher">
                        </div>

                        <div class="col-md-2 pe-0">
                            <input type="date" wire:model.live.2000ms="created_at" class="form-control" placeholder="Rechercher">
                        </div>

                        <div class="col-md-3 pe-0">
                            <select class="form-select" wire:model.live.2000ms="commune_id">
                                <option value="">Choisir une commune</option>
                                @foreach ($listecommunes as $commune)
                                    <option value="{{ $commune->id }}">{{ $commune->libellecommune }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 pe-0">
                            <select class="form-select" wire:model.live.500ms="statut">
                                <option value="">Choisir un statut</option>
                                @foreach ($listestatusparametre as $parametre)
                                    <option value="{{$parametre->codeintparametre}}">{{$parametre->libellestatut}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                           <button href="#" class="btn btn-outline-warning" wire:click="handlePrint()">
                            <i class="fa fa-clipboard nav-icon"></i> IMPRIMER
                        </button>

                        </div>
                    </div>
                </div>
                <div wire:loading.flex class="justify-content-center my-4">
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
                <div class="table-responsive" wire:loading.remove>
                    <table class="table table-hover table-centered">
                        <thead class="table-light">
                            <tr>
                                <th>N° Registre</th>
                                <th>N° Cmde</th>
                                <th>Télephone</th>
                                <th>Commune</th>
                                <th>Adressse</th>
                                <th>Montant Qte</th>
                                <th>Date</th>
                                <th>statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allextraits as $extrait)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('documents/extraits/' . $extrait->document) }}" target="_blank">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" class="rounded-circle avatar-md me-2">
                                            </a>
                                            <h5 class="mb-0">{{ $extrait->n_registre }} {{ $extrait->nom_complet }}</h5>
                                        </div>
                                    </td>
                                    <td>{{ $extrait->codecommande }}</td>
                                    <td>
                                        <a href="https://wa.me/+225{{ $extrait->telephone }}?text=Je vous contacte pour votre candidature" class="text-dark d-flex align-items-center">
                                            <i class="fa fa-whatsapp nav-icon me-2"></i>
                                            {{ $extrait->user->telephone ?? '' }}
                                        </a>
                                    </td>

                                    <td>{{ $extrait->commune->libellecommune ?? '' }}</td>
                                    <td>{{ $extrait->adresse ?? '' }}</td>
                                    <td>{{ $extrait->montanttc ?? '' }} FCFA Qte {{ $extrait->qtecmde ?? '' }}</td>
                                    <td>{{ $extrait->created_at ? $extrait->created_at->format('d-m-Y') : '' }}</td>
                                    <td>
                                        @if($extrait->status == 1)
                                            En cours
                                        @elseif($extrait->status == 2)
                                            Validé
                                        @elseif($extrait->status == 3)
                                            Échec
                                        @else
                                            Non défini
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start gap-2">

                                            @if($extrait->status == 1 || $extrait->status == 3)

                                            <button class="btn btn-success btn-sm" wire:click="valider({{ $extrait->id }})">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @elseif($extrait->status == 2)

                                            <button class="btn btn-danger btn-sm" wire:click="invalider({{ $extrait->id }})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @else
                                            <span>Statut inconnu</span>
                                        @endif

                                            <button  class="btn btn-dark btn-sm" wire:click="printFacture({{ $extrait->id }})">
                                                <i class="fa fa-clipboard nav-icon"></i>
                                            </button>

                                            <button  class="btn btn-outline-danger btn-sm" wire:click="delete({{ $extrait->id }})">
                                                <i class="fa fa-trash nav-icon"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pt-2 pb-4">
                    <nav>
                        <ul class="pagination justify-content-center mb-0">
                            {{ $allextraits->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


</div>







