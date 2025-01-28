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
                                        placeholder="Entrez votre numéro de téléphone" type="tel" x-model="phone" @input="updatePhone" @blur="validatePhone">
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


                                    <button type="button" class="btn btn-secondary mt-2" @click="prevStep(1)">
                                        Précédent
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

                                <div class="d-grid mt-2">

                                    <button type="button" class="btn btn-warning " @click="nextStep(3)" :disabled="!isFormValid || isLoading">
                                        <span x-show="!isLoading">Suivant</span>
                                        <span x-show="isLoading">
                                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </span>
                                    </button>


                                    <button type="button" class="btn btn-secondary mt-4" @click="prevStep(2)">
                                        Précédent
                                    </button>


                                </div>
                            </div>
                        </template>

                        <!-- Étape 4: Synthèse et confirmation -->
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
                                    <label for="documentQty"></label>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" @click="documentQty = Math.max(documentQty - 2, 2)" class="btn btn-outline-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM5 7h6v2H5V7z"></path>
                                            </svg>
                                        </button>

                                        &nbsp;
                                        <input type="number" id="documentQty" x-model="documentQty" class="form-control text-center form-control-sm w-50"
                                            placeholder="2" min="2" readonly value="2" />
                                        &nbsp;
                                        <button type="button" @click="documentQty = documentQty + 2" class="btn btn-outline-warning btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM7 4h2v3h3v2H9v3H7V9H4V7h3V4z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Case à cocher pour savoir si l'utilisateur est dans la commune -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="isInCommune" x-model="isInCommune">
                                    <label class="form-check-label" for="isInCommune">
                                        Je suis dans la commune où je fais la demande.
                                    </label>
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
                                <p><strong>Total : </strong> <span x-text="calculateTotal()"></span> Fcfa (Inclus la livraison à domicile)</p>

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
                </div>


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

<script>

function formSteps() {
    return {
        currentStep: 1,
        isLoading: false,
        phone: '',
        phoneError: false,
        selectedDocument: null,
        fullname: '',
        commune: '',
        deliveryPlace: '',
        image: null,
        imageError: false,
        listetypedoucment:@json($typedocument),
        communes:@json($communes),

        // Variables pour la quantité et le code promo
        documentQty: 2,
        promoCode: '',
        promoApplied: false,
        promoError: false,
        promoDiscount: 0,  // Réduction en pourcentage, par exemple 10% pour un code promo valide

        // Prix de base
        pricePerTwoDocuments: 1000, // 2 documents coûtent 1000 FCFA
        servicePrice: 1500, // Prix du service
        deliveryPrice: 1000, // Prix de la livraison de base
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
            this.phoneError = !phoneRegex.test(this.phone);  // Si le numéro ne correspond pas au format, afficher l'erreur
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
                this.currentStep = 1;  // Réinitialiser l'étape après confirmation
            }, 2000);
        },


        get isFormValid() {
                return this.phone && this.selectedDocument && this.fullname && this.commune && this.deliveryPlace && this.image && !this.imageError;
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

        submitOrder() {
    this.isLoading = true;

    // Données à envoyer
    const formData = {
        phone: this.phone,
        selectedDocument: this.selectedDocument,
        documentQty: this.documentQty,
        promoCode: this.promoCode,
        isInCommune: this.isInCommune,
        totalAmount: this.calculateTotal(),
    };

    // Utiliser Fetch pour envoyer les données au backend
    fetch('/api/submit-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',  // On spécifie que les données sont en JSON
            'Accept': 'application/json',
        },
        body: JSON.stringify(formData)  // On convertit l'objet en chaîne JSON
    })
    .then(response => response.json())  // Convertir la réponse en JSON
    .then(data => {
        this.isLoading = false;
        if (data.success) {
            alert('Commande confirmée !');
            this.currentStep = 1;  // Réinitialiser l'étape après confirmation
        } else {
            alert('Une erreur est survenue, veuillez réessayer.');
        }
    })
    .catch(error => {
        this.isLoading = false;
        console.error('Erreur lors de l\'envoi de la commande', error);
        alert('Une erreur est survenue, veuillez réessayer.');
    });
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
