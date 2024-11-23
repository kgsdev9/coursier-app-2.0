<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 70vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Mon Coursier de Babi</h3>
                    <p class="text-center text-muted">Commandez vos documents en ligne et payez à la livraison</p>
                    <form wire:submit.prevent="saveCommande()">
                        @if ($currentStep == 1)

                                <div class="form-floating mb-3">
                                    <input type="tel" id="phone" class="form-control" placeholder="Entrez votre numéro de téléphone" wire:model="phone">
                                    <label for="phone">Entrez votre numéro</label>
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="button" class="btn btn-warning btn-block" wire:click="goToStep()">Continuer</button>
                                </div>
                        @endif

                        <!-- Étape 2: Choix du type de prestation -->
                        @if ($currentStep == 2)
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-md-3 mb-3">
                                        <a wire:click="$set('requestType', 'extrait_naissance')"
                                        class="bg-white text-center shadow-sm text-wrap rounded-4 w-100
                                        {{ $requestType == 'extrait_naissance' ? 'border-warning' : '' }}"
                                        style="cursor: pointer;">
                                            <div class="p-3">
                                                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="80" height="80" rx="40" fill="#F2EFFF"></rect>
                                                    <path opacity="0.2" d="M58 52C58 53.1935 57.5259 54.3381 56.682 55.182C55.8381 56.0259 54.6935 56.5 53.5 56.5H32.5C33.6935 56.5 34.8381 56.0259 35.682 55.182C36.5259 54.3381 37 53.1935 37 52C37 50.125 35.5 49 35.5 49H56.5C56.5 49 58 50.125 58 52Z" fill="#754FFE"></path>
                                                    <path d="M34 35.5C34 35.1022 34.158 34.7206 34.4393 34.4393C34.7206 34.158 35.1022 34 35.5 34H47.5C47.8978 34 48.2794 34.158 48.5607 34.4393C48.842 34.7206 49 35.1022 49 35.5C49 35.8978 48.842 36.2794 48.5607 36.5607C48.2794 36.842 47.8978 37 47.5 37H35.5C35.1022 37 34.7206 36.842 34.4393 36.5607C34.158 36.2794 34 35.8978 34 35.5ZM35.5 43H47.5C47.8978 43 48.2794 42.842 48.5607 42.5607C48.842 42.2794 49 41.8978 49 41.5C49 41.1022 48.842 40.7206 48.5607 40.4393C48.2794 40.158 47.8978 40 47.5 40H35.5C35.1022 40 34.7206 40.158 34.4393 40.4393C34.158 40.7206 34 41.1022 34 41.5C34 41.8978 34.158 42.2794 34.4393 42.5607C34.7206 42.842 35.1022 43 35.5 43ZM59.5 52C59.5 53.5913 58.8679 55.1174 57.7426 56.2426C56.6174 57.3679 55.0913 58 53.5 58H32.5C30.9087 58 29.3826 57.3679 28.2574 56.2426C27.1321 55.1174 26.5 53.5913 26.5 52V28C26.5 27.2044 26.1839 26.4413 25.6213 25.8787C25.0587 25.3161 24.2956 25 23.5 25C22.7044 25 21.9413 25.3161 21.3787 25.8787C20.8161 26.4413 20.5 27.2044 20.5 28C20.5 29.0763 21.4056 29.8038 21.415 29.8113C21.6633 30.0023 21.8455 30.2663 21.9361 30.5661C22.0267 30.866 22.0211 31.1867 21.9202 31.4832C21.8193 31.7798 21.6281 32.0373 21.3734 32.2197C21.1187 32.402 20.8133 32.5 20.5 32.5C20.1756 32.5006 19.8601 32.3945 19.6019 32.1981C19.3844 32.0387 17.5 30.5519 17.5 28C17.5 26.4087 18.1321 24.8826 19.2574 23.7574C20.3826 22.6321 21.9087 22 23.5 22H49C50.5913 22 52.1174 22.6321 53.2426 23.7574C54.3679 24.8826 55 26.4087 55 28V47.5H56.5C56.8246 47.5 57.1404 47.6053 57.4 47.8C57.625 47.9613 59.5 49.4481 59.5 52ZM34.0487 48.5275C34.1512 48.225 34.3468 47.9626 34.6075 47.7781C34.8682 47.5935 35.1806 47.4962 35.5 47.5H52V28C52 27.2044 51.6839 26.4413 51.1213 25.8787C50.5587 25.3161 49.7957 25 49 25H28.6919C29.2224 25.9107 29.5013 26.946 29.5 28V52C29.5 52.7956 29.8161 53.5587 30.3787 54.1213C30.9413 54.6839 31.7044 55 32.5 55C33.2956 55 34.0587 54.6839 34.6213 54.1213C35.1839 53.5587 35.5 52.7956 35.5 52C35.5 50.9237 34.5944 50.1962 34.585 50.1887C34.3294 50.0059 34.1393 49.7457 34.0427 49.4466C33.9462 49.1475 33.9483 48.8253 34.0487 48.5275ZM56.5 52C56.4812 51.4442 56.2668 50.913 55.8944 50.5H38.2694C38.4201 50.9857 38.4966 51.4914 38.4963 52C38.4977 53.0535 38.2202 54.0886 37.6919 55H53.5C54.2957 55 55.0587 54.6839 55.6213 54.1213C56.1839 53.5587 56.5 52.7956 56.5 52Z" fill="#754FFE"></path>
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

                        <!-- Étape 3: Formulaire spécifique -->
                        @if ($currentStep == 3)
                            @if($requestType == 'extrait_naissance')
                            <form wire:submit.prevent="save">
                                <!-- Nom complet -->
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

                                <!-- Document requis -->


                                <!-- Commune -->

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
                                            <textarea name="adresse" id="adresse" wire:model="adresse" cols="30" rows="2" class="form-control" ></textarea>

                                            <label for="adresse">Adresse livraison </label>
                                            @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <span>Pas disponible </span>
                            @endif
                            <div class="d-grid">
                                <button type="submit" wire:click="save" class="btn btn-warning btn-block">Continuer</button>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="button" wire:click="goBack" class="btn btn-secondary btn-block">
                                    Retour
                                </button>
                            </div>
                        @endif

                        <!-- Étape 4: Récapitulatif -->
                        @if ($currentStep == 4)
                            <div>
                                <h5 class="text-center mb-4">Récapitulatif de votre commande</h5>
                                <div class="row gy-4">
                                    <div class="col-xl-8 col-lg-7 col-12">
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
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                            <ul class="list-group mb-3">
                                                <li class="list-group-item">NET A PAYER  (Prix du service + Livraison): {{ $totalPrice + $prixserviceinlivraison }} FCFA</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-12">
                                        <div class="d-flex flex-column gap-4">
                                            <div class="card">
                                                <div class="card-body d-flex flex-column gap-3">
                                                    <h4 class="mb-0">Historique</h4>
                                                    @guest
                                                    <div class="d-flex align-items-center gap-3">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" class="avatar-lg rounded-circle" alt="">
                                                        <div class="d-flex flex-column">
                                                            <h4 class="mb-0">{{ Auth::user()->id}}</h4>
                                                        </div>
                                                    </div>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-grid">
                                    <button wire:click="confirm" class="btn btn-success btn-block"> Confirmer {{ $totalPrice + $prixserviceinlivraison }} FCFA</button>
                                </div>

                                <div class="d-grid mt-2">
                                    <button type="button" wire:click="goBack" class="btn btn-outline-secondary btn-block">
                                        Retour
                                    </button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
