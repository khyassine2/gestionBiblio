@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur modification des livres</h1>
@endsection

@section('main')
<form method='post' action={{route('livre.update',$livres->isbn)}} enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class='container '>
    <div class="col-md-12 col-lg-12">
        <label for="validationCustom01" class="form-label">Code livre</label>
        <input type="text" class="form-control" id="validationCustom01" value={{ $livres->isbn}} name="codeLivre"  readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Titre Livre</label>
        <input type="text" class="form-control" id="validationCustom02" name='titre' placeholder="Titre Livre" value={{ old('titre',$livres->titre)}} >
        <div class="text-danger">
            @error('titre')
              {{$message}}
            @enderror
          </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Prix</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationCustom02" name="prix" placeholder="Prix de livre" value={{ old('prix',$livres->prix) }} >
            <div class="text-danger">
                @error('prix')
                  {{$message}}
                @enderror
              </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <label for="validationCustom04" class="form-label">Théme</label>
        <select class="form-select" id="validationCustom04" name='theme' >
            @foreach ($themes as $item)
            <option value="{{ $item->id }}">{{ $item->titre }}</option>
            @endforeach
        </select>
        <div class="text-danger">
            @error('theme')
              {{$message}}
            @enderror
          </div>
        </div>
    <div class="col-md-12 mb-2">
        <label for="validationCustom04" class="form-label">Image Livre</label>
        <input type="file" name='image' class='form-control'>
        <input type="hidden" value={{ $livres->image }} name='image0'>
        <div class="text-danger">
            @error('image')
              {{$message}}
            @enderror
          </div>
    </div>

    <div class="col-12 d-flex justify-content-center mb-5 my-4">
            <a class='btn btn-outline-primary' href={{ route('gestionLivre',['operation'=>'all']) }}>To back</a>
            <button class='btn btn-outline-warning ms-3' type='submit'>update</button>

    </div>
    </div>

</form>
@endsection
