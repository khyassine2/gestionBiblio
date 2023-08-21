@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur la gestion des livres</h1>
@endsection
@section('main')
<div class="container">
    @if (session('statusAdmin'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('statusAdmin') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="col-12 text-center mb-5">
    <a class='btn btn-outline-primary position-relative' href={{ route('gestionLivre',['operation'=>'request']) }}>Afficher les requests des livres
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $count }}
            <span class="visually-hidden">unread messages</span>
          </span>
    </a>
    <a class='btn btn-outline-primary ms-3' href={{ route('gestionLivre',['operation'=>'all']) }}>Afficher les Livres</a>
</div>
</div>
<div >
    @isset($livres)

    @if (request('operation')=='request')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="table-responsive">
                    <table class="table">
        <thead>
            <tr>
                <th>Code Livre</th>
                <th>Titre Livre</th>
                <th>Date d'ajoute</th>'
                <th>Prix</th>
                <th>Theme</th>
                <th>Image</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @if (count($livres)==0)
               <tr><th colspan="7"  class="text-success text-center">rien demande pour ajouter un livre</th></tr>
            @else
            @foreach($livres as $item)
                <tr>
                    <td >{{ $item->isbn }}</td>
                    <td>{{ $item->titre }}</td>
                    <td>{{ $item->date_ajout }}</td>
                    <td>{{ $item->prix }}</td>
                    <td>{{ $item->themes()->get()[0]->titre }}</td>
                    <td><img src="/storage/{{ $item->image }}" alt="eroure" width='100px' height='100px'></td>
                    <form action={{ route('refuserequestLivre',$item->isbn) }} method='post'>
                        @csrf
                        @method('delete')
                    <td><button class='btn btn-outline-danger' type='submit'><i class="bi bi-x-lg"></i></button> <a class='btn btn-outline-success' href="{{ route('acceptrequestLivre',['livre'=>$item]) }}"><i class="bi bi-check-lg"></i></a></td>
                </form>
                </tr>
            @endforeach
           @endif

        </tbody>
    </table>
</div>
</div>
</div>
</div>
    @else
    <div class="container  mb-5">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
            <div class="table-responsive">
            <table class="table">
        <thead>
            <tr>
                <th>Titre </th>
                <th>Date</th>
                <th>Prix</th>
                <th>Theme</th>
                <th>Image</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>

            @foreach($livres as $item)
                <tr>
                    <td>{{ $item->titre }}</td>
                    <td>{{ $item->date_ajout }}</td>
                    <td>{{ $item->prix }}</td>
                    <td>{{ $item->themes()->get()[0]->titre }}</td>
                    <td><img src="/storage/{{ $item->image }}" alt="eroure" width='100px' height='100px'></td>
                    <td><a class='btn btn-outline-danger' href='{{ route('showLivre',['id'=>$item->isbn,'op'=>'delete']) }}'> <i class="bi bi-x-lg"></i></a> <a class='btn btn-outline-warning' href={{ route('livre.edit',$item->isbn) }}><i class="bi bi-pencil-square"></i></a> <a class='btn btn-outline-primary' href={{route('livre.show',$item->isbn) }}><i class="bi bi-eye"></i></a> </td>
                {{--  </form>  --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
    @endif
    @endisset
</div>
@endsection



