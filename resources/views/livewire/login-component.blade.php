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
                                <button type="button" class="btn btn-warning btn-block" wire:click="save">
                                    <span wire:loading.remove wire:target="save">Continuer    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"></path>
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                                      </svg></span>
                                    <span wire:loading wire:target="save">
                                        <div class="spinner-border spinner-border-sm text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </span>
                                </button>
                            </div>
                        @endif


                        <!-- Étape 2: Choix du type de prestation -->
                        @if ($currentStep == 2)
                        <div class="mt-4">
                            @can('access-admin')
                            <div class="alert alert-danger text-center">
                                <a class="btn btn-outline-dark" href="{{route('cmde.extrait')}}">ESPACE D'ADMINISTRATION.</a>
                            </div>
                            @else
                            <div class="mt-4">
                                @can('access-admin')
                                @else
                                <p class="text-center text-muted">Quelle Document souhaitez-vous etablir ?</p>
                                <div class="row justify-content-center">
                                    <div class="col-md-3 mb-3">
                                        <a wire:click="$set('requestType', 'extrait_naissance')"
                                           class="bg-white text-center shadow-sm text-wrap rounded-4 w-100
                                           {{ $requestType == 'extrait_naissance' ? 'border-warning' : '' }}"
                                           style="cursor: pointer;">
                                            <div class="p-3 position-relative">
                                                @if($requestType == 'extrait_naissance')
                                                <div class="position-absolute top-0 end-0 p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                                      </svg>
                                                </div>
                                                @endif
                                                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="80" height="80" rx="40" fill="#FFEEDA"></rect>
                                                    <path opacity="0.2" d="M55 22V52H29.5C28.3065 52 27.1619 52.4741 26.318 53.318C25.4741 54.1619 25 55.3065 25 56.5V26.5C25 25.3065 25.4741 24.1619 26.318 23.318C27.1619 22.4741 28.3065 22 29.5 22H37V40L43 35.5L49 40V22H55Z" fill="#C28135"></path>
                                                    <path d="M55 20.5H29.5C27.9087 20.5 26.3826 21.1321 25.2574 22.2574C24.1321 23.3826 23.5 24.9087 23.5 26.5V58C23.5 58.3978 23.658 58.7794 23.9393 59.0607C24.2206 59.342 24.6022 59.5 25 59.5H52C52.3978 59.5 52.7794 59.342 53.0607 59.0607C53.342 58.7794 53.5 58.3978 53.5 58C53.5 57.6022 53.342 57.2206 53.0607 56.9393C52.7794 56.658 52.3978 56.5 52 56.5H26.5C26.5 55.7043 26.8161 54.9413 27.3787 54.3787C27.9413 53.8161 28.7044 53.5 29.5 53.5H55C55.3978 53.5 55.7794 53.342 56.0607 53.0607C56.342 52.7794 56.5 52.3978 56.5 52V22C56.5 21.6022 56.342 21.2206 56.0607 20.9393C55.7794 20.658 55.3978 20.5 55 20.5ZM38.5 23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5ZM53.5 50.5H29.5C28.4465 50.4986 27.4114 50.7761 26.5 51.3044V26.5C26.5 25.7044 26.8161 24.9413 27.3787 24.3787C27.9413 23.8161 28.7044 23.5 29.5 23.5H35.5V40C35.5 40.2786 35.5776 40.5516 35.724 40.7886C35.8705 41.0256 36.08 41.2171 36.3292 41.3416C36.5783 41.4662 36.8573 41.519 37.1347 41.4939C37.4122 41.4689 37.6771 41.3671 37.9 41.2L43 37.375L48.1019 41.2C48.361 41.3943 48.6761 41.4996 49 41.5C49.2329 41.4997 49.4625 41.4458 49.6712 41.3425C49.9205 41.2178 50.13 41.0261 50.2764 40.789C50.4228 40.5519 50.5002 40.2787 50.5 40V23.5H53.5V50.5Z" fill="#C28135"></path>
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
                                            <div class="p-3 position-relative">
                                                @if($requestType == 'casier_judiciaire')
                                                    <div class="position-absolute top-0 end-0 p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                                          </svg>

                                                    </div>
                                                @endif
                                                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="80" height="80" rx="40" fill="#FFEEDA"></rect>
                                                    <path opacity="0.2" d="M55 22V52H29.5C28.3065 52 27.1619 52.4741 26.318 53.318C25.4741 54.1619 25 55.3065 25 56.5V26.5C25 25.3065 25.4741 24.1619 26.318 23.318C27.1619 22.4741 28.3065 22 29.5 22H37V40L43 35.5L49 40V22H55Z" fill="#C28135"></path>
                                                    <path d="M55 20.5H29.5C27.9087 20.5 26.3826 21.1321 25.2574 22.2574C24.1321 23.3826 23.5 24.9087 23.5 26.5V58C23.5 58.3978 23.658 58.7794 23.9393 59.0607C24.2206 59.342 24.6022 59.5 25 59.5H52C52.3978 59.5 52.7794 59.342 53.0607 59.0607C53.342 58.7794 53.5 58.3978 53.5 58C53.5 57.6022 53.342 57.2206 53.0607 56.9393C52.7794 56.658 52.3978 56.5 52 56.5H26.5C26.5 55.7043 26.8161 54.9413 27.3787 54.3787C27.9413 53.8161 28.7044 53.5 29.5 53.5H55C55.3978 53.5 55.7794 53.342 56.0607 53.0607C56.342 52.7794 56.5 52.3978 56.5 52V22C56.5 21.6022 56.342 21.2206 56.0607 20.9393C55.7794 20.658 55.3978 20.5 55 20.5ZM38.5 23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5ZM53.5 50.5H29.5C28.4465 50.4986 27.4114 50.7761 26.5 51.3044V26.5C26.5 25.7044 26.8161 24.9413 27.3787 24.3787C27.9413 23.8161 28.7044 23.5 29.5 23.5H35.5V40C35.5 40.2786 35.5776 40.5516 35.724 40.7886C35.8705 41.0256 36.08 41.2171 36.3292 41.3416C36.5783 41.4662 36.8573 41.519 37.1347 41.4939C37.4122 41.4689 37.6771 41.3671 37.9 41.2L43 37.375L48.1019 41.2C48.361 41.3943 48.6761 41.4996 49 41.5C49.2329 41.4997 49.4625 41.4458 49.6712 41.3425C49.9205 41.2178 50.13 41.0261 50.2764 40.789C50.4228 40.5519 50.5002 40.2787 50.5 40V23.5H53.5V50.5Z" fill="#C28135"></path>
                                                  </svg>
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
                                            <div class="p-3 position-relative">
                                                <!-- Icône de sélection (affichée si 'certificat_nationalité' est sélectionné) -->
                                                @if($requestType == 'certificat_nationalité')
                                                    <div class="position-absolute top-0 end-0 p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                                          </svg>
                                                    </div>
                                                @endif
                                                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="80" height="80" rx="40" fill="#FFEEDA"></rect>
                                                    <path opacity="0.2" d="M55 22V52H29.5C28.3065 52 27.1619 52.4741 26.318 53.318C25.4741 54.1619 25 55.3065 25 56.5V26.5C25 25.3065 25.4741 24.1619 26.318 23.318C27.1619 22.4741 28.3065 22 29.5 22H37V40L43 35.5L49 40V22H55Z" fill="#C28135"></path>
                                                    <path d="M55 20.5H29.5C27.9087 20.5 26.3826 21.1321 25.2574 22.2574C24.1321 23.3826 23.5 24.9087 23.5 26.5V58C23.5 58.3978 23.658 58.7794 23.9393 59.0607C24.2206 59.342 24.6022 59.5 25 59.5H52C52.3978 59.5 52.7794 59.342 53.0607 59.0607C53.342 58.7794 53.5 58.3978 53.5 58C53.5 57.6022 53.342 57.2206 53.0607 56.9393C52.7794 56.658 52.3978 56.5 52 56.5H26.5C26.5 55.7043 26.8161 54.9413 27.3787 54.3787C27.9413 53.8161 28.7044 53.5 29.5 53.5H55C55.3978 53.5 55.7794 53.342 56.0607 53.0607C56.342 52.7794 56.5 52.3978 56.5 52V22C56.5 21.6022 56.342 21.2206 56.0607 20.9393C55.7794 20.658 55.3978 20.5 55 20.5ZM38.5 23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5ZM53.5 50.5H29.5C28.4465 50.4986 27.4114 50.7761 26.5 51.3044V26.5C26.5 25.7044 26.8161 24.9413 27.3787 24.3787C27.9413 23.8161 28.7044 23.5 29.5 23.5H35.5V40C35.5 40.2786 35.5776 40.5516 35.724 40.7886C35.8705 41.0256 36.08 41.2171 36.3292 41.3416C36.5783 41.4662 36.8573 41.519 37.1347 41.4939C37.4122 41.4689 37.6771 41.3671 37.9 41.2L43 37.375L48.1019 41.2C48.361 41.3943 48.6761 41.4996 49 41.5C49.2329 41.4997 49.4625 41.4458 49.6712 41.3425C49.9205 41.2178 50.13 41.0261 50.2764 40.789C50.4228 40.5519 50.5002 40.2787 50.5 40V23.5H53.5V50.5Z" fill="#C28135"></path>
                                                  </svg>
                                                <div class="mt-3">
                                                    <h3 class="mb-0 h5">Certificat de nationalité</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <!-- Boutons de navigation pour l'étape 2 -->
                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-warning btn-block" wire:click="save" {{ !$requestType ? 'disabled' : '' }}>
                                        <span wire:loading.remove wire:target="save">Continuer
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"></path>
                                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                                              </svg>


                                        </span>
                                        <span wire:loading wire:target="save">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>
                                </div>

                                <div class="d-grid mt-2">
                                    <button type="button" wire:click="goBack" class="btn btn-secondary btn-block" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="goBack">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z"/>
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z"/>
                                              </svg>
                                            Retour
                                        </span>
                                        <span wire:loading wire:target="goBack">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Retour...
                                        </span>
                                    </button>
                                </div>
                                @endcan
                            </div>

                            @endcan
                        </div>


                        @endif

                        <!-- Étape 3: Formulaire spécifique au type de prestation -->
                        @if ($currentStep == 3)
                        <p class="text-center text-muted">Renseigner les informations correctes svp</p>
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
                                            <option value="" selected>Choisissez la commune</option>
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
                            @elseif($requestType == 'casier_judiciaire')
                            <div class="d-flex justify-content-center align-items-center" style="height:20vh;">
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7.002 5.002a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H7.502a.5.5 0 0 1-.5-.5V5.002zm0 4.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H7.502a.5.5 0 0 1-.5-.5v-.5z"/>
                                    </svg>
                                    <span>Le service n'est pas encore disponible pour le moment veuillez patienter</span>
                                </div>
                            </div>


                            @elseif($requestType == 'certificat_nationalité')
                            <div class="d-flex justify-content-center align-items-center" style="height:20vh;">
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7.002 5.002a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H7.502a.5.5 0 0 1-.5-.5V5.002zm0 4.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H7.502a.5.5 0 0 1-.5-.5v-.5z"/>
                                    </svg>
                                    <span>Le service n'est pas encore disponible pour le moment veuillez patienter</span>
                                </div>
                            </div>
                            @endif

                            <div class="d-grid mt-4">
                                <button type="button" wire:click="save" class="btn btn-warning btn-block" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="save">Continuer
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"></path>
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                                          </svg>

                                    </span>
                                    <span wire:loading wire:target="save">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Dernier etape...
                                    </span>
                                </button>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="button" wire:click="goBack" class="btn btn-secondary btn-block" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="goBack">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z"/>
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z"/>
                                          </svg>

                                        Retour</span>
                                    <span wire:loading wire:target="goBack">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Retour...
                                    </span>
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
                                    <button type="submit" class="btn btn-success btn-block" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="saveCommande">
                                            Soumettre
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M13.78 3.22a1 1 0 0 1 0 1.415L7.707 10.707a1 1 0 0 1-1.414 0L2.22 6.72a1 1 0 1 1 1.414-1.415L7 8.586l5.366-5.365a1 1 0 0 1 1.414 0z"/>
                                            </svg>
                                        </span>
                                        <span wire:loading wire:target="saveCommande">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Traitement en cours...
                                        </span>
                                    </button>
                                </div>
                                <div class="d-grid mt-2">
                                    <button type="button" wire:click="goBack" class="btn btn-secondary btn-block" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="goBack">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z"/>
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z"/>
                                            </svg>
                                            Retour
                                        </span>
                                        <span wire:loading wire:target="goBack">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Retour...
                                        </span>
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
