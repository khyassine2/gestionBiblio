@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur la page d ajoute</h1>
@endsection

@section('main')
<form method='post' action={{route('membres.store')}} enctype="multipart/form-data">
    @csrf
<div class='container '>
    <div class="col-md-12 col-lg-12">
        <label for="validationCustom01" class="form-label">Code Membre</label>
        <input type="text" class="form-control" id="validationCustom01" value='{{old('id')}}' name="id" placeholder="entrez code de membre">
        <div class="text-danger">
            @error('id')
              {{$message}}
            @enderror
          </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">nom membre</label>
        <input type="text" class="form-control" id="validationCustom02" name='nom' placeholder="nom membre" value={{ old('nom')}} >
        <div class="text-danger">
            @error('nom')
              {{$message}}
            @enderror
          </div>
    </div>

    <div class="col-md-12">
        <label for="" class="form-label">Type</label>
        <select class="form-select" name="type" id='type' onchange="champ()">
            <option value='personne'>Personne</option>
            <option value='libraire'>libraire</option>
            <option value='stagiaire'>stagiaire</option>
            <option value='membre'>membre</option>
            <option value='directeur'>directeur</option>
        </select>
        <div class="text-danger">
            @error('type')
              {{$message}}
            @enderror
        </div>
    </div>

    <div class="col-md-12" id="numInsc" style="display: none">
        <label for="validationCustom02" class="form-label">num Inscription</label>
        <input type="text" class="form-control" value='{{ old('numInsc') }}' name='numInsc' placeholder="numInsc" >
        <div class="text-danger">
            @error('numInsc')
              {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-md-12" id="adresse" style="display: none">
        <label for="validationCustom02" class="form-label">Adresse</label>
        <input type="text" class="form-control" value='{{ old('adresse') }}' name='adresse' placeholder="adresse" >
        <div class="text-danger">
            @error('adresse')
              {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-md-12" id="email" style="display: none">
        <label for="validationCustomUsername" class="form-label">Email</label>
        <div class="input-group">
            <input type="text" class="form-control" name="email" placeholder="entrez votre email" >
            <div class="text-danger">
                @error('email')
                  {{$message}}
                @enderror
              </div>
        </div>
    </div>
    <div class="col-md-12" id="pw" style="display: none">
        <label for="validationCustom02" class="form-label">password</label>
        <input type="password" class="form-control"  name='password' placeholder="numInsc" >
        <div class="text-danger">
            @error('password')
              {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center mb-5 my-4">
            <a class='btn btn-outline-primary' href={{ route('membres.index') }}>To back</a>
            <button class='btn btn-outline-primary ms-3' type='submit'>Ajouter</button>
    </div>
    </div>

</form>


@endsection























<script>
    function champ(){
        var type=document.getElementById('type').value
        var email=document.getElementById('email')
        var adresse=document.getElementById('adresse')
        var numInsc=document.getElementById('numInsc')
        var pw=document.getElementById('pw')
        if(type=='directeur' || type=='membre'){
            email.style.display='block'
            numInsc.style.display='block'
            pw.style.display='block'
            adresse.style.display='none'
        }else if(type=='libraire'){
            adresse.style.display='block'
            email.style.display='none'
            numInsc.style.display='none'
            pw.style.display='none'
        }else if(type=='stagiaire'){
            numInsc.style.display='block'
            email.style.display='none'
            adresse.style.display='none'
            pw.style.display='none'
        }else if(type=='personne'){
            numInsc.style.display='none'
            email.style.display='none'
            adresse.style.display='none'
            pw.style.display='none'
        }

    }
</script>
