@extends('layouts.app')
@section('title', 'Documents Rapide Ci en ligne')
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
                                    <p class="text-center text-muted">Commandez vos documents en ligne et payez à la
                                        livraison</p>
                                    <div class="form-floating mb-3">
                                        <input type="tel" id="phone" class="form-control"
                                            placeholder="Entrez votre numéro de téléphone" type="tel" x-model="phone">
                                        <label for="phone">Entrez votre numéro</label>
                                        <span x-show="phoneError" class="text-danger">Le numéro est invalide</span>
                                    </div>

                                    <div class="d-grid">
                                        <button type="button" class="btn btn-warning btn-block" @click="nextStep(1)"
                                            :disabled="phoneError || isLoading">
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
                                    <div class="row justify-content-center">
                                        <template x-for="doc in listetypedoucment" :key="doc.id">
                                            <div class="col-md-3 mb-3">
                                                <a @click="selectDocument(doc)"
                                                    :class="['bg-white', 'text-center', 'shadow-sm', 'text-wrap', 'rounded-4',
                                                        'w-100', selectedDocument === doc ? 'border-warning' : ''
                                                    ]"
                                                    style="cursor: pointer;">
                                                    <div class="p-3 position-relative">
                                                        <div class="position-absolute top-0 end-0 p-2"
                                                            x-show="selectedDocument === doc">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-patch-check-fill text-success"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <svg width="80" height="80" viewBox="0 0 80 80"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="80" height="80" rx="40"
                                                                fill="#FFEEDA"></rect>
                                                            <path opacity="0.2"
                                                                d="M55 22V52H29.5C28.3065 52 27.1619 52.4741 26.318 53.318C25.4741 54.1619 25 55.3065 25 56.5V26.5C25 25.3065 25.4741 24.1619 26.318 23.318C27.1619 22.4741 28.3065 22 29.5 22H37V40L43 35.5L49 40V22H55Z"
                                                                fill="#C28135"></path>
                                                            <path
                                                                d="M55 20.5H29.5C27.9087 20.5 26.3826 21.1321 25.2574 22.2574C24.1321 23.3826 23.5 24.9087 23.5 26.5V58C23.5 58.3978 23.658 58.7794 23.9393 59.0607C24.2206 59.342 24.6022 59.5 25 59.5H52C52.3978 59.5 52.7794 59.342 53.0607 59.0607C53.342 58.7794 53.5 58.3978 53.5 58C53.5 57.6022 53.342 57.2206 53.0607 56.9393C52.7794 56.658 52.3978 56.5 52 56.5H26.5C26.5 55.7043 26.8161 54.9413 27.3787 54.3787C27.9413 53.8161 28.7044 53.5 29.5 53.5H55C55.3978 53.5 55.7794 53.342 56.0607 53.0607C56.342 52.7794 56.5 52.3978 56.5 52V22C56.5 21.6022 56.342 21.2206 56.0607 20.9393C55.7794 20.658 55.3978 20.5 55 20.5ZM38.5 23.5H47.5V37L43.8981 34.3C43.6385 34.1053 43.3227 34 42.9981 34C42.6736 34 42.3578 34.1053 42.0981 34.3L38.5 37V23.5ZM53.5 50.5H29.5C28.4465 50.4986 27.4114 50.7761 26.5 51.3044V26.5C26.5 25.7044 26.8161 24.9413 27.3787 24.3787C27.9413 23.8161 28.7044 23.5 29.5 23.5H35.5V40C35.5 40.2786 35.5776 40.5516 35.724 40.7886C35.8705 41.0256 36.08 41.2171 36.3292 41.3416C36.5783 41.4662 36.8573 41.519 37.1347 41.4939C37.4122 41.4689 37.6771 41.3671 37.9 41.2L43 37.375L48.1019 41.2C48.361 41.3943 48.6761 41.4996 49 41.5C49.2329 41.4997 49.4625 41.4458 49.6712 41.3425C49.9205 41.2178 50.13 41.0261 50.2764 40.789C50.4228 40.5519 50.5002 40.2787 50.5 40V23.5H53.5V50.5Z"
                                                                fill="#C28135"></path>
                                                        </svg>
                                                        <h3 class="mb-0 h5" x-text="doc.name"></h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="d-grid mt-4">

                                        <button type="button" class="btn btn-warning" @click="nextStep(2)"
                                            :disabled="!selectedDocument || isLoading">
                                            <span x-show="!isLoading">Continuer <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
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


                                        <button type="button" class="btn btn-secondary mt-2" @click="prevStep(1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z">
                                                </path>
                                            </svg> Précédent
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

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="n_registre" x-model="n_registre"
                                            placeholder="N° Registre" />
                                        <label for="n_registre">N° Registre</label>
                                    </div>

                                    <!-- Commune -->
                                    <div class="form-floating mb-3">
                                        <select id="commune" class="form-select" x-model="commune">
                                            <option value="" disabled selected>Choisissez une commune</option>
                                            <template x-for="commune in communes" :key="commune.id">
                                                <option :value="commune.id" x-text="commune.libellecommune"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- Lieu de livraison -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="deliveryPlace"
                                            x-model="deliveryPlace" placeholder="Lieu de livraison" />
                                        <label for="deliveryPlace">Lieu de livraison</label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="imageUpload" class="form-label">Télécharger Le Fichier</label>
                                        <div class="position-relative">
                                            <div class="border rounded shadow-sm p-2 bg-light position-relative"
                                                style="cursor: pointer;"
                                                @click="document.getElementById('imageUpload').click()">
                                                <template x-if="image">
                                                    <img :src="URL.createObjectURL(image)" class="img-fluid rounded"
                                                        style="max-height: 150px; width: 100%; object-fit: cover;"
                                                        alt="Aperçu">
                                                </template>
                                                <template x-if="!image">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="height: 150px;">
                                                        <i class="bi bi-camera"
                                                            style="font-size: 2rem; color: #6c757d;"></i>
                                                    </div>
                                                </template>
                                            </div>
                                            <input type="file" class="d-none" id="imageUpload" accept="image/*"
                                                @change="uploadImage" />
                                        </div>
                                        <div x-show="imageError" class="text-danger">Veuillez télécharger une image valide
                                        </div>
                                    </div>

                                    <div class="d-grid mt-2">

                                        <button type="button" class="btn btn-warning " @click="nextStep(3)"
                                            :disabled="!isFormValid || isLoading">
                                            <span x-show="!isLoading">Suivant
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


                                        <button type="button" class="btn btn-secondary mt-2" @click="prevStep(2)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z">
                                                </path>
                                            </svg> Précédent
                                        </button>


                                    </div>
                                </div>
                            </template>

                            <!-- Étape 4: Synthèse et confirmation -->
                            <template x-if="currentStep === 4">
                                <div>
                                    <h4>Récapitulatif de votre commande</h4>

                                    <p><strong>Numéro de téléphone :</strong> <span x-text="phone"></span></p>
                                    <p><strong>Type de document :</strong> <span
                                            x-text="selectedDocument ? selectedDocument.name : ''"></span></p>
                                    <p><strong>Nom complet :</strong> <span x-text="fullname"></span></p>
                                    <p><strong>Commune :</strong> <span x-text="commune"></span></p>
                                    <p><strong>Lieu de livraison :</strong> <span x-text="deliveryPlace"></span></p>

                                    <!-- Quantité de documents -->
                                    <div class="form-floating mb-3">
                                        <label for="documentQty"></label>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="button" @click="documentQty = Math.max(documentQty - 2, 2)"
                                                class="btn btn-outline-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM5 7h6v2H5V7z"></path>
                                                </svg>
                                            </button>

                                            &nbsp;
                                            <input type="number" id="documentQty" x-model="documentQty"
                                                class="form-control text-center form-control-sm w-50" placeholder="2"
                                                min="2" readonly value="2" />
                                            &nbsp;
                                            <button type="button" @click="documentQty = documentQty + 2"
                                                class="btn btn-outline-warning btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Case à cocher pour savoir si l'utilisateur est dans la commune -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isInCommune"
                                            x-model="isInCommune">
                                        <label class="form-check-label" for="isInCommune">
                                            Je suis dans la commune où je fais la demande.
                                        </label>
                                    </div>

                                    <!-- Code Promo -->
                                    <div class="form-floating mb-3">
                                        <label for="promoCode">Code promo :</label>
                                        <input type="text" id="promoCode" x-model="promoCode" class="form-control"
                                            placeholder="Entrez votre code promo" />
                                        <button type="button" class="btn btn-outline-info mt-2"
                                            @click="applyPromoCode">Appliquer</button>
                                        <div x-show="promoApplied" class="text-success mt-2">Réduction appliquée !</div>
                                        <div x-show="promoError" class="text-danger mt-2">Code promo invalide.</div>
                                    </div>

                                    <!-- Prix total avec réduction -->
                                    <p><strong>Total : </strong> <span x-text="calculateTotal()"></span> Fcfa (Inclus la
                                        livraison à domicile)</p>

                                    <div class="d-grid">
                                        <button type="button" class="btn btn-secondary" @click="prevStep(3)">Retour <svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 7.5a.5.5 0 0 1-.5-.5V3.707L7.854 5.854a.5.5 0 1 1-.708-.708L10.5 2.207a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a.5.5 0 0 1-.707-.707L10.5 4.707V7a.5.5 0 0 1-.5.5z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M4 8a.5.5 0 0 0-.5.5V12.5A1.5 1.5 0 0 0 5 14h8a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-.5-.5H4z">
                                                </path>
                                            </svg></button>
                                        <button type="button" class="btn btn-warning mt-3" @click="submitOrder"
                                            :disabled="isLoading">
                                            <span x-show="!isLoading">Confirmer la commande <svg width="16"
                                                    height="16" viewBox="0 0 80 80"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="80" height="80" rx="40" fill="#FFEEDA">
                                                    </rect>
                                                    <path d="M60 22L35 50L20 35" stroke="#4CAF50" stroke-width="4"
                                                        fill="none" />
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

                            {{-- etape 5 --}}

                            <template x-if="currentStep === 5">
                                <div>
                                    <div class="container d-flex justify-content-center align-items-center"
                                        style="min-height:20vh;">
                                        <div class="text-center">
                                            <!-- Icône de félicitations -->
                                            <div class="mb-4">
                                                <i class="fa fa-check-circle text-success" style="font-size: 5rem;"></i>
                                            </div>
                                            <!-- Message de confirmation -->
                                            <h1 class="display-4">Votre commande a été confirmée avec succès!</h1>
                                            <p class="lead">Nous démarrons rapidement les processus auprès de la mairie
                                                concernée.</p>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="button" class="btn btn-warning" @click="beginCommande()">Faire
                                            une
                                            nouvelle demande </button>

                                    </div>
                                </div>
                            </template>






                        </div>
                    </div>
                    @include('avis')
                    <div class="d-flex justify-content-center align-items-center" style="height:30vh;">
                        <div class="text-center">
                            <div class="mt-2">
                                <h4><strong>Khms Group</strong> est une SARL au capital de <strong>1 million de francs
                                        CFA</strong>.</h4>
                            </div>

                            <div>
                                Nous sommes engagés à offrir des services de qualité et à garantir la sécurité et la
                                confidentialité de vos documents.
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-10">Produit développé et maintenu par KGS Informatique.</div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function formSteps() {
            return {
                currentStep: 1,
                isLoading: false,
                phone: '',
                phoneError: false,
                selectedDocument: null,
                fullname: '',
                n_registre: '',
                commune: '',
                deliveryPlace: '',
                image: null,
                imageError: false,
                listetypedoucment: @json($typedocument),
                communes: @json($communes),

                // Variables pour la quantité et le code promo
                documentQty: 2,
                promoCode: '',
                promoApplied: false,
                promoError: false,
                promoDiscount: 0, // Réduction en pourcentage, par exemple 10% pour un code promo valide

                // Prix de base
                pricePerTwoDocuments: 1000, // 2 documents coûtent 1000 FCFA
                servicePrice: 2000, // Prix du service
                deliveryPrice: 1500, // Prix de la livraison de base
                deliveryDiscount: 1000, // Réduction sur la livraison si l'utilisateur est dans la commune

                // Case à cocher pour savoir si l'utilisateur est dans la commune
                isInCommune: false, // Déterminer si l'utilisateur est dans la commune

                nextStep(step) {
                    if (step === 1 && !this.phoneError) {
                        this.currentStep = 2;
                    } else if (step === 2 && this.selectedDocument) {
                        this.currentStep = 3;
                    } else if (step === 3) {
                        this.currentStep = 4;
                    }
                },

                beginCommande() {
                    this.resetForm();
                    this.currentStep = 1;
                },
                resetForm() {
                    this.phone = "";
                    this.fullname = "";
                    this.n_registre = "";
                    this.deliveryPlace = "";
                    this.deliveryPlace = "";
                    this.selectedDocument = null;
                    this.image = null;
                    this.documentQty = 2;
                    this.isInCommune = false;
                },

                prevStep(step) {
                    this.currentStep = step;
                },

                updatePhone() {
                    // Si le numéro ne commence pas déjà par +225, on l'ajoute
                    if (!this.phone.startsWith("+225")) {
                        this.phone = "+225" + this.phone.trim();
                    }
                },

                // Validation du numéro de téléphone
                validatePhone() {
                    // Vérifier que le numéro commence bien par +225 et a 12 caractères
                    const phoneRegex = /^\+225[0-9]{10}$/;
                    this.phoneError = !phoneRegex.test(this
                        .phone); // Si le numéro ne correspond pas au format, afficher l'erreur
                },

                selectDocument(doc) {
                    this.selectedDocument = doc;
                },

                save() {
                    // Logique pour soumettre les informations
                    this.isLoading = true;
                    setTimeout(() => {
                        this.isLoading = false;
                        alert('Commande confirmée !');
                        this.currentStep = 1; // Réinitialiser l'étape après confirmation
                    }, 2000);
                },


                get isFormValid() {
                    return this.phone && this.selectedDocument && this.fullname && this.commune && this.deliveryPlace &&
                        this.image && !this.imageError;
                },


                uploadImage(event) {
                    const file = event.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        this.image = file;
                        this.imageError = false;
                    } else {
                        this.image = null;
                        this.imageError = true;
                    }

                },



                async submitOrder() {
                    this.isLoading = true;
                    const formData = new FormData();
                    formData.append('phone', this.phone);
                    formData.append('fullname', this.fullname);
                    formData.append('commune', this.commune);
                    formData.append('n_registre', this.n_registre);
                    formData.append('deliveryprice', this.deliveryPrice);
                    formData.append('serviceprice', this.servicePrice);
                    formData.append('selectedDocument', this.selectedDocument);
                    formData.append('documentQty', this.documentQty);
                    formData.append('promoCode', this.promoCode);
                    formData.append('deliveryPlace', this.deliveryPlace);
                    formData.append('isInCommune', this.isInCommune);
                    formData.append('image', this.image);
                    formData.append('totalAmount', this.calculateTotal());


                    try {
                        const response = await fetch('{{ route('document.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData
                        });

                        if (response.ok) {

                            const data = await response.json();
                            const success = data.success;
                            this.currentStep = 5;

                            this.resetForm();

                        } else {
                            // Swal.fire({
                            //     icon: 'error',
                            //     title: 'Erreur lors de l\'enregistrement.',
                            //     showConfirmButton: true
                            // });
                        }
                    } catch (error) {
                        console.error('Erreur réseau :', error);
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Une erreur est survenue.',
                        //     showConfirmButton: true
                        // });
                    } finally {
                        this.isLoading = false;
                    }
                },


                // Méthode pour appliquer le code promo
                applyPromoCode() {
                    const validPromoCodes = ['PROMO10', 'DISCOUNT20']; // Exemple de codes promo valides
                    if (validPromoCodes.includes(this.promoCode)) {
                        if (this.promoCode === 'PROMO10') {
                            this.promoDiscount = 10; // Réduction de 10%
                        } else if (this.promoCode === 'DISCOUNT20') {
                            this.promoDiscount = 20; // Réduction de 20%
                        }
                        this.promoApplied = true;
                        this.promoError = false;
                    } else {
                        this.promoError = true;
                        this.promoApplied = false;
                    }
                },

                // Calcul du total
                calculateTotal() {
                    // Calculer le prix des documents en fonction de la quantité
                    const numberOfPairs = Math.ceil(this.documentQty / 2);
                    const documentTotalPrice = this.pricePerTwoDocuments * numberOfPairs;

                    // Calculer le prix de la livraison
                    let finalDeliveryPrice = this.deliveryPrice;
                    if (this.isInCommune) {
                        finalDeliveryPrice -= this.deliveryDiscount; // Réduction si dans la commune
                    }

                    // Calcul du total
                    let total = documentTotalPrice + this.servicePrice + finalDeliveryPrice;

                    // Appliquer la réduction du code promo
                    if (this.promoDiscount > 0) {
                        total = total - (total * (this.promoDiscount / 100)); // Appliquer la réduction
                    }

                    return total.toFixed(2); // Retourner le total avec 2 décimales
                }
            }
        }
    </script>
@endsection
