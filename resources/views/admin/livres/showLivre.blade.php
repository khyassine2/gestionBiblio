@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur details de livres</h1>
@endsection

@section('main')
<div class='container '>
    <div class="col-md-12 col-lg-12">
        <label for="validationCustom01" class="form-label">Code livre</label>
        <input type="text" class="form-control" id="validationCustom01" value={{ $livres->isbn}} name="codeLivre"  readonly>
      </div>
      <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Titre Livre</label>
        <input type="text" class="form-control" id="validationCustom02" name='titre' placeholder="Titre Livre" value={{ $livres->titre}} readonly>
      </div>
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Prix</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationCustom02" name="prix" placeholder="Prix de livre" value={{ $livres->prix }} readonly>
        </div>
      </div>

      <div class="col-md-12 mb-2 my-2">
        <label for="validationCustom04" class="form-label">Image Livre</label>
        <img src="/storage/{{$livres->image  }}" width="80px" height='80px' class='rounded-1'>
      </div>
      <div class="col-md-12">
        <label for="validationCustom04" class="form-label">Offre by</label>
        <input type="text" name="nom" class="form-control" placeholder="entrez votre nom s'il vous plait" value={{ $livres->offreby }} readonly>
      </div>
      <div class="col-12 d-flex justify-content-center mb-5 my-4">
            <a class='btn btn-outline-primary' href={{ route('gestionLivre',['operation'=>'all']) }}>To back</a>
            @if (isset($op) && $op=='delete')
            <form action={{route('livre.destroy',$livres->isbn)}} method='post'>
                @csrf
                @method('delete')
                <button class='btn btn-outline-danger ms-3' type='submit'>Delete</button>
            @endif
         </form>
            </div>
      </div>

</div>
@endsection
