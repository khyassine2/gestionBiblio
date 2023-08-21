<?php

namespace App\Http\Controllers;

use App\Events\offrirevent;
use App\Models\Livre;
use App\Models\tempLivre;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempLivreController extends Controller
{
    public function index()
    {
        if(request('operation')=='request'){
            $op='request';
            $livre=tempLivre::all();
        }else if(request('operation')=='all'){
            $op='all';
            $livre=Livre::all();
        }
        return view('admin.livres.requestLivre',['livres'=>$livre??null,'count'=>tempLivre::all()->count(),'op'=>$op??null]);
    }
    public function create()
    {
        return view('livres.offrir',['themes'=>Theme::all()]);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'codeLivre'=>'required|min:3|max:30|unique:temp_livres,isbn',
                'titre'=>'required|string',

            ]
            );
        // on va tester si le admin est connecter on ajouter sur table livre sinon on ajouter dans templivre
        $val=isset(Auth::user()->role)=='admin'?'yes':null;
        $livre=$val!=null?new Livre():new tempLivre();
        $livre->isbn=$request->codeLivre;
        $livre->titre=$request->titre;
        $livre->prix=$request->prix;
        $livre->theme_id=$request->theme;
        $livre->image=$request->image->store('Images','public');
        $livre->offreby=isset(Auth::user()->nom)?Auth::user()->nom:$request->offreby;
        $livre->personne_id=isset(Auth::user()->id)?Auth::user()->id:null;
        $livre->date_ajout=now();
        $livre->save();
        $request->session()->flash('status',$val!=null?"livre ajouter avec succes":"votre demande d'ajouter le livre avec success");

        return redirect()->route('home');
    }
    public function delete($id)
    {
       tempLivre::find($id)->delete();
       return redirect()->route('gestionLivre')->with('status',"la demande d'ajoute est refusé avec success");
    }
}
