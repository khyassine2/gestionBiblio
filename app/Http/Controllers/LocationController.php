<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livres.location',['livres'=>Livre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        
        return view('livres.location',['OneLivre'=>DB::table('livres')->where('isbn','=',$id)->get()->first()]);
    }
    public function louer(Request $request)
    {
        $location=new Location();
        $location->livres_id=$request->isbn;
        if(isset(Auth::user()->numInsc)){
            $location->personne_id=Auth::user()->id;
        }else{
        $location->personne_id=session('numInsc');
        }
        $location->dateLocation=now();
        $location->save();
        session()->forget('numInsc');
        session()->flash('status','locations avec success');
        return redirect()->route('home');
    }

}
