@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur la page des seances</h1>
@endsection

@section('main')
<div class="container mb-5">
    <div class="table-responsive">
        <button type="button" class="btn btn-primary mb-2 float-end" data-bs-toggle="modal" data-bs-target="#add">
            Ajouter une seances
        </button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Date de Seances</th>
                    <th>Duree de Seances</th>
                    <th>Heure Debut de Seances</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seances as $key => $item)
                @if ($key > 0 && $item->livre_id == $seances[$key-1]->livre_id)
                    @continue
                @endif
                <tr>
                    <td>{{ $item->dateSeance }}</td>
                    <td>{{ $item->duree }}Min</td>
                    <td>{{ $item->heureDebut }}h</td>
                    <td><a class='btn btn-outline-primary' href="{{ route('seances.show',['seance'=>$item->livre_id,'etat'=>'admin'])}}">Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center" >
            <a class='btn btn-outline-primary' href='{{ route('home') }}' aling='center'>To back</a>
        </div>
      </div>
      </div>
</div>
@livewire('add-seance')
@endsection
