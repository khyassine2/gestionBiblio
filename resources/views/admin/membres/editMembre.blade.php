@extends('layouts.app')

@section('content')
<h1 id="typewriter">bienvenue sur modification des livres</h1>
@endsection
@section('main')
<form method='post' action={{route('membres.update',$membre->id)}} enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class='container '>
    <div class="col-md-12 col-lg-12">
        <label for="validationCustom01" class="form-label">Code Membre</label>
        <input type="text" class="form-control" id="validationCustom01" value={{ $membre->id}} name="id"  readonly>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Nom Membre</label>
        <input type="text" class="form-control" id="validationCustom02" name='nom' placeholder="nom membre" value={{ old('nom',$membre->nom)}} >
        <div class="text-danger">
            @error('nom')
              {{$message}}
            @enderror
          </div>
    </div>
    @if($membre->type=='libraire')
    <div class="col-md-12" id="adresse">
        <label for="validationCustom02" class="form-label">adresse</label>
        <input type="text" class="form-control"  name='adresse' placeholder="adresse" value={{ old('adresse',$membre->adresse)}} >
        <div class="text-danger">
            @error('adresse')
              {{$message}}
            @enderror
          </div>
    </div>
    @endif
    @if($membre->type!='libraire' && $membre->type!='personne')
    <div class="col-md-12" id='numInsc'>
        <label for="validationCustomUsername" class="form-label">Num Inscription</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationCustom02" name="numInsc" placeholder="numInsc" value={{ old('numInsc',$membre->numInsc) }} >
            <div class="text-danger">
                @error('numInsc')
                  {{$message}}
                @enderror
              </div>
        </div>
    </div>
    @endif

    @if ($membre->type=='membre' || $membre->type=='directeur')
    <div class="col-md-12" id='email'>
        <label for="validationCustomUsername" class="form-label">Email</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationCustom02" name="email" placeholder="email" value={{ old('email',$membre->email) }} >
            <div class="text-danger">
                @error('email')
                  {{$message}}
                @enderror
              </div>
        </div>
    </div>
    @endif

    <div class="col-md-12">
        <label for="" class="form-label">Type</label>
        <select class="form-select" name="type" id='type' onchange="champ()">
            <option value='personne' {{ 'personne'==$membre->type?'selected':'null' }} >Personne</option>
            <option value='libraire' {{ 'libraire'==$membre->type?'selected':'null' }} >libraire</option>
            <option value='stagiaire' {{ 'stagiaire'==$membre->type?'selected':'null' }} >stagiaire</option>
            <option value='membre' {{ 'membre'==$membre->type?'selected':'null' }} >membre</option>
            <option value='directeur' {{ 'membre'==$membre->type?'selected':'null' }} >directeur</option>
        </select>
    </div>

    <div class="col-md-12" id="numInsc" style="display: none">
        <label for="validationCustom02" class="form-label">num Inscription</label>
        <input type="text" class="form-control" value='{{ old('numInsc',$membre->numInsc) }}' name='numInsc' placeholder="numInsc" >
        <div class="text-danger">
            @error('numInsc')
              {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-md-12" id="adresse" style="display: none">
        <label for="validationCustom02" class="form-label">Adresse</label>
        <input type="text" class="form-control" value='{{ old('adresse',$membre->adresse) }}' name='adresse' placeholder="adresse" >
        <div class="text-danger">
            @error('adresse')
              {{$message}}
            @enderror
        </div>
    </div>
    <div class="col-md-12" id="email" style="display: none">
        <label for="validationCustomUsername" class="form-label">Email</label>
        <div class="input-group">
            <input type="text" class="form-control" value='{{ $membre->email }}'  name="email" placeholder="entrez votre email" >
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
            <button class='btn btn-outline-warning ms-3' type='submit'>update</button>
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
