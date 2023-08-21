@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur la pages des membres</h1>
@endsection

@section('main')
<div class="container mb-5 ">

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 ">
        <div class="table-responsive">
            <a href={{route('membres.create')}} class="btn btn-outline-primary  mb-2 float-end">Ajouter un membre
            </a>
    <table class="table">
    <thead>
        <tr>
            <th>nom </th>
            <th>adresse</th>
            <th>num</th>
            <th>email</th>
            <th>type</th>
            <th>Role</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($membres as $item)
            <tr>
                <td >{{ $item->nom }}</td>
                <td>{!! $item->adresse==''?'<b class="text-danger">not</b>':$item->adresse !!}</td>
                <td>{!! $item->numInsc==''?'<b class="text-danger">not</b>':$item->numInsc !!}</td>
                <td>{!! $item->email==''?'<b class="text-danger">not</b>':$item->email !!}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->role }}</td>
                <form action={{ route('membres.destroy',$item->id) }} method='post'>
                    @csrf
                    @method('delete')
                    <td><button  type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" class='btn btn-outline-danger'> <i class="bi bi-x-lg"></i></button> <a class='btn btn-outline-warning' href={{ route('membres.edit',$item->id) }}><i class="bi bi-pencil-square"></i></td>
            </form>
            </tr>
        @endforeach

    </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection



{{--  modal  --}}
{{--  <div class="modal fade" id="drop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
            <h1 id='msg'>nn</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  --}}


