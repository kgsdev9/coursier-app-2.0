@extends('layouts.app')

@section('content')
<div class="container" x-data="formSteps()">
    <div class="row justify-content-center align-items-center" style="height: 70vh;">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">DOCUMENT EXPRESS CI</h3>
                    <!-- Formulaire Alpine.js avec des étapes -->
                    <div>

                        <!-- Étape 1: Entrée du numéro de téléphone -->
                        <template x-if="currentStep === 1">
                            <div>
                                <p class="text-center text-muted">Commandez vos documents en ligne et payez à la livraison</p>
                                <div class="form-floating mb-3">
                                    <input type="tel" id="phone" class="form-control"
                                        placeholder="Entrez votre numéro de téléphone" x-model="phone" @input="validatePhone">
                                    <label for="phone">Entrez votre numéro</label>
                                    <span x-show="phoneError" class="text-danger">Le numéro est invalide</span>
                                </div>

                                <div class="d-grid">
                                    <button type="button" class="btn btn-warning btn-block" @click="nextStep(1)" :disabled="phoneError || isLoading">
                                        <span x-show="!isLoading">Continuer
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-in-right"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span x-show="isLoading">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <!-- Étape 2: Sélection du type de document -->
                        <template x-if="currentStep === 2">
                            <div>
                                <p class="text-center text-muted">Sélectionnez le type de document</p>
                                <div class="row">
                                    <template x-for="doc in listetypedoucment" :key="doc.id">
                                        <div class="col-md-3 mb-3">
                                            <a @click="selectDocument(doc)" :class="['bg-white', 'text-center', 'shadow-sm', 'text-wrap', 'rounded-4', 'w-100', selectedDocument === doc ? 'border-warning' : '']"
                                               style="cursor: pointer;">
                                                <div class="p-3 position-relative">
                                                    <div class="position-absolute top-0 end-0 p-2" x-show="selectedDocument === doc">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                                        </svg>
                                                    </div>
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="80" height="80" rx="40" fill="#FFEEDA"></rect>
                                                        <path opacity="0.2" d="M55 22V52H29.5C28.3065 52 27.1619 52.4741 26.318 53.318C25.4741 54.1619 25 55.3065 25 56.5V26.5C25 25.3065 25.4741 24.1619 26.318 23.318C27.1619 22.4741 28.3065 22 29.5 22H37V40L43 35.5L49 40V22H55Z" fill="#C28135"></path>
                                                        <path d="M55 20.5H29.5C27.9087 20.5 26.3826 21.1321 25.2574 22.2574C24.1321 23.3826 23.5 24.9087 23.5 26.5V58C23.5 58.3978 23.658 58.7794 23.9393 59.0607C24.2206 59.342 24.6022 59.5 25 59.5H52C52.3978 59.5 52.7794 59.342 53.0607 59.0607C53.342 58.7794 53.5 58.3978 53.5 58C53.5 57.6022 53.342 57.2206 53.0607 56.9393C52.7794 56.658 52.3978 56.5 52 56.5H26.5C26.5 55.7043 26.8161 54.9413 27.3787 54.3787C27.9413 53.8161 28.7044 53.5 29.5 53.5H55C55.3978 53.5 55.7794 53.342 56.0607 53.0607C56.342 52.7794 56.5 52.3978 56.5 52V22C56.5 21.6022 56.342 21.2206 56.0607 20.9393C55.7794 20.658 55.3978 20.5 55 20.5ZM38.5 23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5ZM53.5 50.5H29.5C28.4465 50.4986 27.4114 50.7761 26.5 51.3044V26.5C26.5 25.7044 26.8161 24.9413 27.3787 24.3787C27.9413 23.8161 28.7044 23.5 29.5 23.5H35.5V40C35.5 40.2786 35.5776 40.5516 35.724 40.7886C35.8705 41.0256 36.08 41.2171 36.3292 41.3416C36.5783 41.4662 36.8573 41.519 37.1347 41.4939C37.4122 41.4689 37.6771 41.3671 37.9 41.2L43 37.375L48.1019 41.2C48.361 41.3943 48.6761 41.4996 49 41.5C49.2329 41.4997 49.4625 41.4458 49.6712 41.3425C49.9205 41.2178 50.13 41.0261 50.2764 40.789C50.423 40.552 50.5 40.279 50.5 40V23.5H53.5C53.5 24.1046 53.7794 24.6581 54.0607 24.9393C54.342 25.2206 54.6239 25.5 55 25.5V50.5ZM55 25.5C54.6239 25.5 54.342 25.2206 54.0607 24.9393C53.7794 24.6581 53.5 24.1046 53.5 23.5H50.5V22C50.5 21.6022 50.342 21.2206 50.0607 20.9393C49.7794 20.658 49.3978 20.5 49 20.5H38.5V23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5H53.5ZM35 23.5H47.5V34H35V23.5Z" fill="#F6C90A"></path>
                                                    </svg>
                                                    <p class="mt-3 mb-0" x-text="doc.name"></p>
                                                </div>
                                            </a>
                                        </div>
                                    </template>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-warning" @click="nextStep(2)" :disabled="!selectedDocument || isLoading">
                                        <span x-show="!isLoading">Continuer</span>
                                        <span x-show="isLoading">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <!-- Étape 3: Informations supplémentaires -->
                        <template x-if="currentStep === 3">
                            <div>
                                <p class="text-center text-muted">Complétez vos informations</p>

                                <!-- Nom complet -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" x-model="fullname"
                                        placeholder="Nom complet" />
                                    <label for="fullname">Nom complet</label>
                                </div>

                                <!-- Commune -->
                                <div class="form-floating mb-3">
                                    {{-- <label for="commune">Commune</label> --}}
                                    <select id="commune" class="form-select" x-model="commune">
                                        <option value="" disabled selected>Choisissez une commune</option>
                                        <template x-for="commune in communes" :key="commune.id">
                                            <option :value="commune.id" x-text="commune.libellecommune"></option>
                                        </template>
                                    </select>
                                </div>


                                <!-- Lieu de livraison -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="deliveryPlace" x-model="deliveryPlace"
                                        placeholder="Lieu de livraison" />
                                    <label for="deliveryPlace">Lieu de livraison</label>
                                </div>

                                <div class="mb-3">
                                    <label for="imageUpload" class="form-label">Télécharger Le Fichier</label>
                                    <div class="position-relative">
                                        <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                             style="cursor: pointer;" @click="document.getElementById('imageUpload').click()">
                                            <template x-if="image">
                                                <img :src="URL.createObjectURL(image)" class="img-fluid rounded"
                                                     style="max-height: 150px; width: 100%; object-fit: cover;" alt="Aperçu">
                                            </template>
                                            <template x-if="!image">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 150px;">
                                                    <i class="bi bi-camera" style="font-size: 2rem; color: #6c757d;"></i>
                                                </div>
                                            </template>
                                        </div>
                                        <input type="file" class="d-none" id="imageUpload" accept="image/*"
                                               @change="uploadImage" />
                                    </div>
                                    <div x-show="imageError" class="text-danger">Veuillez télécharger une image valide</div>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-warning" @click="save" :disabled="!isFormValid || isLoading">
                                        <span x-show="!isLoading">Confirmer</span>
                                        <span x-show="isLoading">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <template x-if="currentStep === 4">
                            <div>
                                <h4>Récapitulatif de votre commande</h4>

                                <p><strong>Numéro de téléphone :</strong> <span x-text="phone"></span></p>
                                <p><strong>Type de document :</strong> <span x-text="selectedDocument ? selectedDocument.name : ''"></span></p>
                                <p><strong>Nom complet :</strong> <span x-text="fullname"></span></p>
                                <p><strong>Commune :</strong> <span x-text="commune"></span></p>
                                <p><strong>Lieu de livraison :</strong> <span x-text="deliveryPlace"></span></p>

                                <!-- Quantité de documents -->
                                <div class="form-floating mb-3">
                                    <label for="documentQty">Quantité de documents :</label>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" @click="documentQty = Math.max(documentQty - 1, 1)" class="btn btn-outline-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM5 7h6v2H5V7z"></path>
                                            </svg>
                                        </button>

                                        &nbsp;
                                        <input type="number" id="documentQty" x-model="documentQty" class="form-control text-center form-control-sm w-50"
                                            placeholder="2" min="1" readonly value="2" />
                                        &nbsp;
                                        <button type="button" @click="documentQty = documentQty + 1" class="btn btn-outline-warning btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Code Promo -->
                                <div class="form-floating mb-3">
                                    <label for="promoCode">Code promo :</label>
                                    <input type="text" id="promoCode" x-model="promoCode" class="form-control" placeholder="Entrez votre code promo" />
                                    <button type="button" class="btn btn-outline-info mt-2" @click="applyPromoCode">Appliquer</button>
                                    <div x-show="promoApplied" class="text-success mt-2">Réduction appliquée !</div>
                                    <div x-show="promoError" class="text-danger mt-2">Code promo invalide.</div>
                                </div>

                                <!-- Prix total avec réduction -->
                                <p><strong>Total : </strong> <span x-text="calculateTotal()"></span> Fcfa</p>

                                <div class="d-grid">
                                    <button type="button" class="btn btn-secondary" @click="prevStep(3)">Retour</button>
                                    <button type="button" class="btn btn-warning mt-3" @click="submitOrder" :disabled="isLoading">
                                        <span x-show="!isLoading">Confirmer la commande</span>
                                        <span x-show="isLoading">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </template>

                    </div>

                    <!-- Section entreprise -->
                    <div class="d-flex justify-content-center align-items-center" style="height:30vh;">
                        <div class="text-center">
                            <div class="mt-2">
                                <h4><strong>Khms Group</strong> est une SARL au capital de <strong>1 million de francs CFA</strong>.</h4>
                            </div>
                            <div class="text-muted">Les documents sont validés sous 24H pour les clients ayant payé sur place
                                en CASH.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function formSteps() {
        return {
            currentStep: 1,
            phone: '',
            phoneError: false,
            listetypedoucment:@json($typedocument),
            communes:@json($communes),
            isLoading: false,
            selectedDocument: null,
            documentQty: 1,
            image: null,
            fullname: '',
            commune: '',
            deliveryPlace: '',
            imageError: false,

            validatePhone() {
                const phoneRegex = /^[0-9]{10}$/;
                this.phoneError = !phoneRegex.test(this.phone);
            },
            nextStep(step) {
                if (step === 1) {
                    if (!this.phoneError) {
                        this.currentStep++;
                    }
                } else if (step === 2) {
                    if (this.selectedDocument) {
                        this.currentStep++;
                    }
                }
            },
            selectDocument(doc) {
                this.selectedDocument = this.selectedDocument === doc ? null : doc;
            },
            uploadImage(event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    this.image = file;
                    this.imageError = false;
                } else {
                    this.imageError = true;
                    this.image = null;
                }
            },
            get isFormValid() {
                return this.fullname && this.commune && this.deliveryPlace && this.image;
            },
            save() {
                // Simuler une action d'enregistrement
                this.isLoading = true;
                setTimeout(() => {
                    this.isLoading = false;
                    alert('Formulaire envoyé!');
                }, 2000);
            }
        }
    }
</script>
@endpush
