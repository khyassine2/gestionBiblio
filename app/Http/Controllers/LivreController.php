<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\tempLivre;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('home',['livres'=>Livre::all(),'count'=>Livre::count()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id=null)
    {
        //pour accepter request d'ajoute livre dans admin est ajouter dans table livre
        $livreTemp=tempLivre::find(request('livre'));
        $livre=new Livre();
        $livre->isbn=$livreTemp->isbn;
        $livre->titre=$livreTemp->titre;
        $livre->offreby=$livreTemp->offreby;
        $livre->date_ajout=$livreTemp->date_ajout;
        $livre->prix=$livreTemp->prix;
        $livre->theme_id=$livreTemp->theme_id;
        $livre->personne_id=$livreTemp->personne_id;
        $livre->image=$livreTemp->image;
        $livre->save();
        session()->flash('statusAdmin','demande a accepter est le livre a ajouter avec success');
        //on supprimer le livre dans la table tempolivre
        $livreTemp->delete();
        return redirect()->route('gestionLivre');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //pour afficher un seul ou confirmer la suppression
        $valOp=request('op');
        return view('admin.livres.showLivre',['livres'=>Livre::find($id),'op'=>isset($valOp)?$valOp:'']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin\livres\editLivre',['livres'=>Livre::find($id),'themes'=>Theme::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate(
            [
                'titre'=>'required|string',
                'prix'=>'required|integer',
                'image'=>'|image|'

            ]
            );

        $livre=Livre::find($request->codeLivre);
        $livre->isbn=$request->codeLivre;
        $livre->titre=$request->titre;
        $livre->prix=$request->prix;
        $livre->theme_id=$request->theme;
        $valImage=$request->image==null?$request->image0:$request->image;
        $livre->image=$valImage->store('Images','public');
        $livre->save();
        return redirect()->route('gestionLivre',['operation'=>'all'])->with('status',"livre modifier avec success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Livre::find($id)->delete();
        return redirect()->route('gestionLivre',['operation'=>'all'])->with('status','livre supprimer avec succes');
    }
}
