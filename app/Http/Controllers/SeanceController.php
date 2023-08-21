<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Seance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use stdClass;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('admin') && !Gate::allows('user')){
            abort(404);
        }
        //j'ai utiliser etat pour destinct l'affichage de view
        return view(request('etat')=='admin'?'admin.seances.allSeance':'seances.afficherSeances',['seances' => Seance::all()]);
    }
 public function show($id)
    {
        if(!Gate::allows('admin') && !Gate::allows('user')){
            abort(404);
        }
        $livres=Seance::where('livre_id',$id)->get();
        $personnes=DB::table('seances')
        ->join('personnes', 'seances.personne_id', '=', 'personnes.id')
        ->select(['personnes.nom','personnes.id'])
        ->where('seances.livre_id', '=', $id)
        ->get();
        $x=new stdClass();
        $x->livres=$livres;
        $x->personnes=$personnes;
        $valOp=request('operation');
        return view(request('etat')=='admin'?'admin.seances.detailsSeance':'seances.detailsSeances',['data'=>$x,'themes'=>Livre::find($id)->themes()->first()->titre,'op'=>isset($valOp)?$valOp:'']);
    }

    public function edit(Request $request)
    {
        if(!Gate::allows('admin') && !Gate::allows('user')){
            abort(404);
        }
        return view('admin.seances.editSeance',['seance'=>Seance::where('livre_id',$request->seance)->where('dateSeance',$request->date)->first()]);
    }

    public function update(Request $request, Seance $seance)
    {
        if(!Gate::allows('admin') && !Gate::allows('user')){
            abort(404);
        }
        Seance::where('livre_id',$request->livre_id)->where('dateSeance',$request->date)->update([
            'dateSeance'=>$request->dateSeance,
            'duree'=>$request->duree,
            'heureDebut'=>$request->heureDebut
        ]);
        return redirect()->route('seances.index',['etat'=>'admin'])->with('status','seances modifier avec success');
    }

    public function destroy(Request $request)
    {
        if(!Gate::allows('admin') && !Gate::allows('user')){
            abort(404);
        }
        // on fait un teste selon l'op pour definir si on va supprimer la seances ou supprimer un membre depuis un seance
        $msg='';
        if(request('op')=='seance'){
            $msg='la seances est  supprimer avec succes';
            $seance=Seance::where('livre_id','=',$request->seance)->delete();
        }else{
            $seance=Seance::find($request->livre_id)->where('personne_id','=',$request->personne);
            $seance->delete();
            $msg='le membre de seances supprimer avec succes';
        }
        return redirect()->route('seances.index',['etat'=>'admin'])->with('status',$msg);
    }
}
