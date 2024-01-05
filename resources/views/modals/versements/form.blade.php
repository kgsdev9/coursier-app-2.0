<div wire:ignore.self  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row">
               <img src="{{ asset('storage/photos/'.$showCandidature?->photo) }}" alt="" class="rounded-circle avatar-xl mb-3">
                <h1>{{$showCandidature?->nom}} {{$showCandidature?->prenom}} </h1>
            </div>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-grouo">
            <label for="">Entrer le montant</label>
            <input type="number" class="form-control" wire:model="montant">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary" wire:click="store()">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
