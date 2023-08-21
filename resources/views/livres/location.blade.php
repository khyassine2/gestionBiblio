@extends('layouts.app')

@section('content')
<h1 id='typewriter'>bievenu sur la page de location  Livre</h1>
@endsection

@section('main')
@if (!isset($OneLivre))
<div class="container my-5 row ms-2 text-center">
    @foreach ($livres as $item)
        <div class="col-6 text-center my-2">
            <img src='/storage/{{$item->image}}' alt="eroure d'image" class="w-50 rounded" id='img1'>
            <h3>Code : <b>{{ $item->isbn }}</b></h3>
            <h3>Titre : <b>{{ $item->titre }}</b></h3>
            <h3>Prix : <b>{{ $item->prix }}DH </b></h3>
            <a class="btn btn-outline-primary" href="{{ route('createLocation',$item->isbn) }}">Location</a>
        </div>
    @endforeach


@else
<h1 class="text-center text-decoration-underline">Location de livre de {{ $OneLivre->titre }}</h1>
<table class="w-50 ms-5 my-4">
    <form action="{{ route('louer') }}" method="post">
        @csrf
    <tr>
        <th>Code Livre</th>
        <th><input type="text" name="isbn" value="{{ $OneLivre->isbn }}" class="form-control"></th>
    </tr>
    <tr>
        <th>Titre livre</th>
        <th><input type="text" name="titre" value="{{ $OneLivre->titre }}" class="form-control"></th>
    </tr>
    <tr>
        <th>Prix</th>
        <th><input type="text" name="prix" value="{{ $OneLivre->prix }}" class="form-control"></th>
    </tr>
    <tr>
        <th>image</th>
        <th><img src="/storage/{{$OneLivre->image  }}" alt="eroure de chargement d'image" width="200" height="150"></th>
    </tr>
    <tr>
        <th></th>
        <th><button class='ms-5 my-4 btn btn-outline-primary' type="submit">Louer</button></th>
    </tr>
</form>

</table>


@endif

@endsection
