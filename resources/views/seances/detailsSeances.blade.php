@extends('layouts.app')

@section('content')
<h1 id='typewriter'>bievenu sur la page de location  Livre</h1>
@endsection

@section('main')
<div class="container mb-5">
    <h1 class="text-center text-decoration-underline mb-5">Le Livre de la seances c est
        {{$data->livres[0]->livres()->get()[0]->titre }}
    </h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Date de Seances</th>
                    <th>Duree de Seances</th>
                    <th>Heure Debut de Seances</th>
                    <th>Theme de livre</th>
                    <th>Nom de Stagiare</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($data->livres as $key => $item)
            @if ($key > 0 && $item->livre_id == $data->livres[$key-1]->livre_id)
                @continue
            @endif
            <tr>
                <td>{{ $item->dateSeance }}</td>
                <td>{{ $item->duree }}Min</td>
                <td>{{ $item->heureDebut }}h</td>
                <td>{{ $themes}}</td>
                <td>
                @foreach ($data->personnes as $i)
                    {{ $i->nom }}<br>
                @endforeach
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center " >
        <a class='btn btn-outline-primary' href='{{ route('consulterSeances') }}' aling='center'>To back</a>
        </div>
    </div>

</div>
@endsection
