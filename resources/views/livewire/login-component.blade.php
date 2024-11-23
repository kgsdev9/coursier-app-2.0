<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 70vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Mon Coursier de Babi</h3>
                    <!-- Formulaire Livewire avec des étapes -->
                    <form wire:submit.prevent="saveCommande">

                        <!-- Étape 1: Entrée du numéro de téléphone -->
                        @if ($currentStep == 1)
                        <p class="text-center text-muted " >Commandez vos documents en ligne et payez à la livraison</p>
                            <div class="form-floating mb-3">
                                <input type="tel" id="phone" class="form-control" placeholder="Entrez votre numéro de téléphone" wire:model="phone">
                                <label for="phone">Entrez votre numéro</label>
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-grid">
                                <button type="button" class="btn btn-warning btn-block" wire:click="save">Continuer</button>
                            </div>
                        @endif

                        <!-- Étape 2: Choix du type de prestation -->
                        @if ($currentStep == 2)

                            <div class="mt-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 mb-3">
                                        <a wire:click="$set('requestType', 'extrait_naissance')"
                                           class="bg-white text-center shadow-sm text-wrap rounded-4 w-100
                                           {{ $requestType == 'extrait_naissance' ? 'border-warning' : '' }}"
                                           style="cursor: pointer;">
                                            <div class="p-3">
                                                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- SVG content -->
                                                </svg>
                                                <div class="mt-3">
                                                    <h3 class="mb-0 h5">Extrait de naissance</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a wire:click="$set('requestType', 'casier_judiciaire')"
                                           class="bg-white text-center shadow-sm text-wrap rounded-4 w-100
                                           {{ $requestType == 'casier_judiciaire' ? 'border-warning' : '' }}"
                                           style="cursor: pointer;">
                                            <div class="p-3">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Casier judiciaire" class="avatar avatar-xl rounded-circle">
                                                <div class="mt-3">
                                                    <h3 class="mb-0 h5">Casier judiciaire</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a wire:click="$set('requestType', 'certificat_nationalité')"
                                           class="bg-white text-center shadow-sm text-wrap rounded-4 w-100
                                           {{ $requestType == 'certificat_nationalité' ? 'border-warning' : '' }}"
                                           style="cursor: pointer;">
                                            <div class="p-3">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Certificat de nationalité" class="avatar avatar-xl rounded-circle">
                                                <div class="mt-3">
                                                    <h3 class="mb-0 h5">Certificat de nationalité</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Boutons de navigation pour l'étape 2 -->
                                <div class="d-grid mt-4">
                                    <button type="button" wire:click="save" class="btn btn-warning btn-block" {{ !$requestType ? 'disabled' : '' }}>
                                        Continuer
                                    </button>
                                </div>
                                <div class="d-grid mt-2">
                                    <button type="button" wire:click="goBack" class="btn btn-secondary btn-block">
                                        Retour
                                    </button>
                                </div>
                            </div>
                        @endif

                        <!-- Étape 3: Formulaire spécifique au type de prestation -->
                        @if ($currentStep == 3)
                            @if($requestType == 'extrait_naissance')
                            <div class="form-floating mb-3">
                                <input type="text" id="n_registre" class="form-control" placeholder="Nom complet" wire:model="n_registre">
                                <label for="n_registre">N° Registre</label>
                                @error('n_registre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Date de naissance -->
                            <div class="form-floating mb-3">
                                <input type="text" id="nom_complet"  placeholder="Nom complet" class="form-control" wire:model="nom_complet">
                                <label for="nom_complet">Nom Prénom Complet</label>
                                @error('nom_complet') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="row">
                                <!-- Montant TTC -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="file" id="document" class="form-control" placeholder="Document requis" wire:model="document">
                                        <label for="document">Document requis</label>
                                        @error('document') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                                <!-- Quantité -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" id="quantite" class="form-control" placeholder="Quantité" wire:model="quantite" min="1">
                                        <label for="quantite">Quantité de l'extrait </label>
                                        @error('quantite') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Montant TTC -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="commune_id" class="form-control" wire:model="commune_id">
                                            <option value="" disabled selected>Choisissez la commune</option>
                                            @foreach ($listecommune as $commune)
                                                <option value="{{$commune->id}}">{{$commune->libellecommune}}</option>
                                            @endforeach
                                        </select>
                                        <label for="commune_id">Commune</label>
                                        @error('commune_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                                <!-- Quantité -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <textarea name="" id="" cols="30" wire:model="adresse" rows="2" class="form-control" ></textarea>

                                        <label for="adresse">Lieu de livraison </label>
                                        @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Boutons de navigation pour l'étape 3 -->
                            <div class="d-grid mt-4">
                                <button type="button" wire:click="save" class="btn btn-warning btn-block">
                                    Continuer
                                </button>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="button" wire:click="goBack" class="btn btn-secondary btn-block">
                                    Retour
                                </button>
                            </div>
                        @endif

                        <!-- Étape 4: Choix du mode de livraison -->
                        @if ($currentStep == 4)
                        <div class="row gy-4">
                            <div class="col-xl-12 col-lg-7 col-12">
                                <div class="d-flex flex-column gap-4">
                                    <!-- card -->
                                    <div class="card">
                                        <!-- card header -->
                                        <div class="card-header border-bottom-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-1">Réglement à la livraison</h4>
                                                    <span>
                                                        Date:
                                                        <span class="badge bg-success-soft ms-2">{{now()}}</span>
                                                    </span>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <!-- Table -->
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Demande</th>
                                                        <th>Quantite</th>
                                                        <th>Montant Ht</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-body">{{$requestType}}</span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $quantite ?? 'rien' }}</td>
                                                        <td>{{ $totalPrice ?? 'rien' }} FCFA</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">Montant TTC</td>
                                                        <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">{{ $totalPrice }} FCFA</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="fw-medium text-dark border-bottom-0 pb-0">Service Complet </td>
                                                        <td class="fw-medium text-dark border-bottom-0 pb-0 text-end"> 1500 FCFA Service + Livraison  1500 FCFA = 3000 FCFA </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item">NET A PAYER à à la livraison : {{ $totalPrice + $prixserviceinlivraison }} FCFA </li>
                                    </ul>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-success btn-block">
                                        Soumettre
                                    </button>
                                </div>
                                <div class="d-grid mt-2">
                                    <button type="button" wire:click="goBack" class="btn btn-secondary btn-block">
                                        Retour
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
