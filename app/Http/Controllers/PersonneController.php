<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonneController extends Controller
{
    //pour la verification de num inscription pour faire une location
    public function verification(Request $request)
    {
        $result=DB::table('personnes')->select('id')->where('numInsc','=',$request->numinsc)->get();

        if(isset($result[0])){
            session()->put('numInsc',$result[0]->id);
            return redirect()->route('locations');
        }else{
            return redirect()->route('home')->with('status',"numero d'inscription est incorrect");
        }
    }
    public function index()
    {
        return view('admin.membres.indexMembre',['membres'=>Personne::all()]);
    }


    public function create()
    {
        return view('admin.membres.createMembre');
    }


    public function store(Request $request)
    {
        // on a fait des test pour controller l'ajoute de membre selon le type
        $role0='';
        //definer le role selon  le type
        if($request->type=='libraire' || $request->type=='personne' || $request->type=='stagiaire'){
            $role0='gest';
        }else if ($request->type=='membre'){
            $role0='user';
        }else if($request->type=='directeur'){
            $role0='admin';
        }
        $personne=new Personne();
        //nom
        $personne->nom=$request->nom;
        // adresse
        $personne->adresse=$request->type=='libraire'?$request->adresse:null;
        //num inscription
        $numInsc=$request->type=='libraire'||$request->type=='personne'?null:$request->numInsc;
        $personne->numInsc=$numInsc;
        // email
        $email=$role0=='gest'?null:$request->email;
        $personne->email=$email;
        // password
        $password=$role0=='gest'?null:Hash::make($request->password);
        $personne->password=$password;
        //type
        $personne->type=$request->type;
        //role
        $personne->role=$role0;
        // save
        $personne->save();
        return redirect()->route('membres.index')->with('status','membre ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personne=Personne::find($id);
        dd($personne);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        return view('admin.membres.editMembre',['membre'=>Personne::find($id),'type'=>Personne::all(['type'])]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        // on a fait des test pour controller l'ajoute de membre selon le type
        $role0='';
        //definer le role est modifier depuis le type
        if($request->type=='libraire' || $request->type=='personne' || $request->type=='stagiaire'){
            $role0='gest';
        }else if ($request->type=='membre'){
            $role0='user';
        }else if($request->type=='directeur'){
            $role0='admin';
        }
        $personne=Personne::find($request->id);
        //nom
        $personne->nom=$request->nom;
        // adresse
        $personne->adresse=$request->type=='libraire'?$request->adresse:null;
        //num inscription
        $numInsc=$request->type=='libraire'||$request->type=='personne'?null:$request->numInsc;
        $personne->numInsc=$numInsc;
        // email
        $email=$role0=='gest'?null:$request->email;
        $personne->email=$email;
        // password
        $password=$role0=='gest'?null:Hash::make($request->password);
        $personne->password=$password;
        //type
        $personne->type=$request->type;
        //role
        $personne->role=$role0;
        // save
        $personne->save();
        return redirect()->route('membres.index')->with('status','membre modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Personne::find($id)->delete();
        return redirect()->back()->with('status','membres a supprimer avec success');
    }
}
