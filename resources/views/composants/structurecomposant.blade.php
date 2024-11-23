<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 70vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Mon Coursier de Babi</h3>
                    <p class="text-center text-muted">Commandez vos documents en ligne et payez à la livraison</p>

                    <!-- Formulaire Livewire avec des étapes -->
                    <form wire:submit.prevent="saveCommande">

                        <!-- Étape 1: Entrée du numéro de téléphone -->
                        @if ($currentStep == 1)
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
                                    <input type="text" id="n_registre" class="form-control" placeholder="N° Registre" wire:model="n_registre">
                                    <label for="n_registre">N° Registre</label>
                                    @error('n_registre') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" id="nom_complet" class="form-control" placeholder="Nom complet" wire:model="nom_complet">
                                    <label for="nom_complet">Nom Prénom Complet</label>
                                    @error('nom_complet') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <div class="form-group mb-3">
                                <label for="deliveryMode">Mode de Livraison</label>
                                <select id="deliveryMode" class="form-control" wire:model="deliveryMode">
                                    <option value="">Choisissez le mode de livraison</option>
                                    <option value="standard">Standard (Gratuit)</option>
                                    <option value="express">Express (15 000 FCFA)</option>
                                </select>
                                @error('deliveryMode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Boutons de navigation pour l'étape 4 -->
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

                        <!-- Étape 5: Validation finale -->
                        @if ($currentStep == 5)
                            <div class="alert alert-success">
                                <p>Veuillez vérifier vos informations avant de soumettre la commande.</p>
                                <ul>
                                    <li><strong>Téléphone :</strong> {{ $phone }}</li>
                                    <li><strong>Type de prestation :</strong> {{ $requestType }}</li>
                                    <li><strong>Mode de livraison :</strong> {{ $deliveryMode }}</li>
                                    <li><strong>Prix total :</strong> {{ $servicePrice }}</li>
                                </ul>
                            </div>

                            <!-- Boutons de soumission pour l'étape 5 -->
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
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
