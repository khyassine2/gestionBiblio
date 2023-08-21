@extends('layouts.app')

@section('content')
<h1 id='typewriter'>bievenue Monsieur {{ Auth::user()->nom }} :</h1>
@endsection

@section('main')
<div class="container mb-5">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
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
                    <td><a class='btn btn-outline-primary' href="{{ route('detailsSeances',$item->livre_id) }}">Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center" >
            <a class='btn btn-outline-primary' href='{{ route('home') }}' aling='center'>To back</a>
        </div>
      </div>
</div>
@endsection
