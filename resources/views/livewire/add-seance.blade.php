
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">Name</label>
                    <div class="col-8">
                        <input type="date" class="form-control" wire:model.debounce.10000000000ms="dateSeance"  placeholder="dateSeance" id='dateSeance'>
                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">heure de debut</label>
                    <div class="col-8">
                        <input type="text" class="form-control" wire:model.debounce.10000000000ms='heureDebut' id="heureDebut"  placeholder="heureDebut">
                        <span>
                            
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-4 col-form-label">duree </label>
                    <div class="col-8">
                        <input type="text" class="form-control" wire:model.debounce.10000000000ms="duree" id="duree"  placeholder="duree">
                    </div>
                </div>
                
          </div>
          
          <div class="mb-3 d-flex">
            <label for="livre" class="col-4">livre:</label>
            <select  id="livre" class='form-control' wire:model.debounce.10000000000ms='livre_id'>
                @foreach ($livre as $item)
                    <option value="{{ $item->isbn }}">{{ $item->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 d-flex">
          <label for="personne" class="col-4">Personne:</label>
          <select  id="personne" class='form-control' wire:model.debounce.10000000000ms='personne_id'>
              @foreach ($personne as $item)
                  <option value="{{ $item->id }}">{{ $item->nom }}</option>
              @endforeach
          </select>
      </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button wire:click.prevent="store" class="btn btn-primary">Ajouter</button>
          
        </div>
      </div>
    </div>
  </div>
