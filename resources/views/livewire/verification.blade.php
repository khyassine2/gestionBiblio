<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Entrez votre Num inscription </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-md-10 col-sm-6">
                <form  class="d-inline-flex" wire:submit.prevent='verification()'>
                    <input type="text" class="form-control" id="validationCustom01" name="numinsc" wire:model='numInsc' placeholder="Entrez votre num inscription">
                <button type="submit" class='btn btn-outline-primary ms-2'>Valider</button>
                </form>
                <div class='text-danger'>{{ $err }}</div>
            </div>
        </div>
      </div>
    </div>
</div>
