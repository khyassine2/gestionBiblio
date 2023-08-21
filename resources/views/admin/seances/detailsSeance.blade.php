@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur details des seances</h1>
@endsection

@section('main')
<div class="container mb-5">

    @if($op!='delete')
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
                    <th>Operation</th>
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
                <td>
                    <a class='btn btn-outline-danger' href={{ route('seances.show',['seance'=>$item->livre_id,'operation'=>'delete','etat'=>'admin']) }}> <i class="bi bi-x-lg"></i></a> <a class='btn btn-outline-warning' href={{ route('seances.edit',['seance'=>$item->livre_id,'date'=>$item->dateSeance]) }}><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center" >
            <a class='btn btn-outline-primary' href='{{ route('seances.index',['etat'=>'admin']) }}' aling='center'>To back</a>
        </div>
    @else
        <div class="col-12 d-flex justify-content-center mb-5 my-4">
            @if ($op=='delete')
            <input type="radio" style="accent-color:rgb(0, 85, 255)"
            onclick='a()' {{ request('aff')=='personne'?'checked':'' }} name='aff'>Supprimer  perssonne
            <input type="radio" style="accent-color:rgb(0, 85, 255)" class='ms-3'
            onclick='a1()' {{ request('aff')=='seances'?'checked':'' }} name='aff'>Supprimer  seances
            @endif

        </div>
        <div class='mb-5 my-4 d-flex'>
        @if(request('aff')=='personne')
        <div class="col-6">
            <span><b>selectionner s il vous plait le personne que vous avez supprimer:</b></span>
        </div>
        <div class="col-4 ">
            <form action={{ route('deleteper') }} method="post">
                @csrf
                <input type="text" name='livre_id' value={{request('seance')}} hidden>
            <select name="personne" id='per' class='form-select' onchange="remove()">
                @foreach ($data->personnes as $item)
                    <option value={{ $item->id }}>{{ $item->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class='btn btn-outline-danger'>delete</button>
            </form>
        </div>

        </div>
        @endif
        @if(request('aff')=='seances')
        <div class="col-10 ">
            <form action={{ route('deleteper',['seance'=>request('seance'),'op'=>'seance']) }} method="post">
                @csrf
            <span class='me-3-3'>Vous avez sur de supprimer la seance de livre <b>{{$data->livres[0]->livres()->get()[0]->titre }}</b></span><a class="btn btn-outline-primary ms-2" href='{{ request("seance")}}?etat=admin' >non</a><button class='btn btn-outline-danger ms-2' type="submit">oui</button>
            </form>
        </div>

        @endif
        </div>
    </div>
    <div class="text-center" >
        <a class='btn btn-outline-primary' href='{{ route('seances.index',['etat'=>'admin']) }}' aling='center'>To back</a>
    @endif
</div>
@endsection
<script>
    function a(){
        window.location.href='http://127.0.0.1:8000/seances/{{request('seance')}}?operation=delete&etat=admin&aff=personne';
    }
    function a1(){
        window.location.href='http://127.0.0.1:8000/seances/{{request('seance')}}?operation=delete&etat=admin&aff=seances';
    }
    {{--  function remove(){
        sessionStorage.setItem("id",document.getElementById('per').value )
        var x=document.getElementById('per').value
        document.getElementById('form').setAttribute('action',{{route('seances.destroy',$x ) }});
    }  --}}
</script>

{{--  <a class='btn btn-outline-primary' href='{{ route('seances.index',['etat'=>'admin']) }}'>To back</a>  --}}
