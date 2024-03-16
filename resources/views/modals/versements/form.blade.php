<div wire:ignore.self  class="modal fade" id="exampleModal" data-bs-backdrop="static"   aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <div class="card-body">
                @php
                $somme = 0;
            @endphp
                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{ asset('candidatures/candidatures/'.$showCandidature?->photo) }}" alt="" class="rounded-circle avatar-xl mb-3">
                        <h1>{{$showCandidature?->nom}} {{$showCandidature?->prenom}} </h1>
                    </div>
                    <div class="col-lg-4 mt-8">
                        <a class="btn btn-outline-success" href="{{route('versement.etudiant',$showCandidature?->id)}}">Impréssion des versements</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="mb-1">Entrer le montant  @error('montant')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror</label>
                        <input type="number" class="form-control" wire:model="montant">
                      </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <br>

                        <button type="button" class="btn btn-outline-secondary" wire:click="store()">Enregistrer</button>
                      </div>
                </div>
            </div>

          <table class="table table-bordered mt-2">
            <thead>
                <th>Montant</th>
                <th>Code Transaction</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>

                @foreach ($allVersementByUser as $versement)
                @php
                    $somme+= $versement->montant;
                @endphp
                <tr>
                    <td>{{$versement->montant}} FCFA </td>
                    <td> {{$versement->code_transaction}} </td>
                    <td>{{$versement->created_at}}</td>
                    <td>
                     <button type="button" wire:click="destroy({{$versement->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                     <a type="button" href="{{route('versement.print.single', $versement->id)}}" class="btn btn-outline-success"><i class="fa fa-download"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>

          </table>
          <h3>{{$somme}} FCFA versé</h3>
        </div>




        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal()">Fermer</button>
        </div>
      </div>
    </div>
  </div>
