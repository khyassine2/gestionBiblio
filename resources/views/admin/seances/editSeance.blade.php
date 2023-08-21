@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur update de seances</h1>
@endsection

@section('main')
<form class="row g-3 needs-validation container mb-5" method="post" action="{{ route('seances.update',$seance->livre_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Date Seance</label>
    <input type="date" class="form-control" id="validationCustom01" value="{{ old('dateSeance',$seance->dateSeance) }}" name="dateSeance" placeholder="Date Seance" >
    <div class="text-danger">
      @error('dateSeance')
        {{$message}}
      @enderror
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Duree(minute)</label>
    <input type="text" class="form-control" id="validationCustom02" name='duree' placeholder="duree Livre" value="{{ old('duree',$seance->duree) }}">
    <div class="text-danger">
        @error('duree')
          {{$message}}
        @enderror
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">heureDebut(heure)</label>
    <div class="input-group">
        <input type="text" class="form-control" id="validationCustom02" name="heureDebut" placeholder="heureDebut de livre" value="{{ old('heureDebut',$seance->heureDebut) }}">
        <div class="text-danger">
            @error('heureDebut')
              {{$message}}
            @enderror
        </div>
    </div>
  </div>
  <div class="col-12 text-center">
    <a class='btn btn-outline-primary' href='/seances/{{ request("seance")}}?etat=admin'>To back</a>
    <button type="submit" class='btn btn-outline-warning'>modifier</button>
    </div>
    </div>
  <input type="hidden" name="livre_id" value={{ $seance->livre_id }}>
  <input type="hidden" name="date" value={{ $seance->dateSeance }}>
</form>
@endsection