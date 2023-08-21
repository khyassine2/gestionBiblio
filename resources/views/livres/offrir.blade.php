@extends('layouts.app')
@section('content')
<div class="container" style="padding-bottom: -6% !important">
<h1 id='typewriter'>bievenu sur la page offrire Livre</h1>
</div>
@endsection
@section('main')
<h1 align='center' style="text-decoration: underline">Offrir un livre</h1>
<form class="row g-3 needs-validation container mb-5" method="post" action="{{ route('offrirstore') }}" enctype="multipart/form-data">
    @csrf
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Code livre</label>
    <input type="text" class="form-control" id="validationCustom01" value="{{ old('codeLivre') }}" name="codeLivre" placeholder="Code livre" >
    <div class="text-danger">
      @error('codeLivre')
        {{$message}}
      @enderror
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Titre Livre</label>
    <input type="text" class="form-control" id="validationCustom02" name='titre' placeholder="Titre Livre" value="{{ old('titre') }}">
    <div class="text-danger">
        @error('titre')
          {{$message}}
        @enderror
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Prix</label>
    <div class="input-group">
        <input type="text" class="form-control" id="validationCustom02" name="prix" placeholder="Prix de livre" value="{{ old('prix') }}">
        <div class="text-danger">
            @error('prix')
              {{$message}}
            @enderror
        </div>
    </div>
  </div>

    {{--  <div class="invalid-feedback">
      Please provide a valid city.
    </div>  --}}
  <div class="col-md-6">
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
  </div><div class="col-md-6">
    <label for="validationCustom04" class="form-label">Image Livre</label>
    <input type="file" name="image" class="form-control">
    <div class="text-danger">
        @error('image')
          {{$message}}
        @enderror
      </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">Offre by</label>
    <input type="text" name="nom" class="form-control" placeholder="entrez votre nom s'il vous plait" value={{ isset(Auth::user()->nom) ? Auth::user()->nom : old('nom') }}>
    <div class="text-danger">
        @error('nom')
          {{$message}}
        @enderror
      </div>
  </div>
  <div class="col-12 text-center">
        <a class='btn btn-outline-primary' href={{ route('home') }}>To back</a>
        <button type="submit" class='btn btn-outline-info'>Ajouter</button>
        </div>
  </div>
</form>


@endsection
