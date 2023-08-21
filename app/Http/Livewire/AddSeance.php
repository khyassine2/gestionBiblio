<?php

namespace App\Http\Livewire;

use App\Models\Livre;
use App\Models\Personne;
use App\Models\Seance;
use Livewire\Component;

class AddSeance extends Component
{
    public $dateSeance;
    public $duree;
    public $heureDebut;
    public $livre_id;
    public $personne_id;
    public $livre=[];
    public $personne=[];
    public $showModal = false;
    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function mount(){
        $this->livre=Livre::all();
        $this->personne = Personne::whereNotNull('email')->get();
    }
    public function render()
    {
        return view('livewire.add-seance');
    }
    public function store()
    {
        $seance=new Seance();
        $seance->dateSeance=$this->dateSeance;
        $seance->heureDebut=$this->heureDebut;
        $seance->duree=$this->duree;
        $seance->livre_id=$this->livre_id;
        $seance->personne_id=$this->personne_id;
        $seance->save();
        session()->flash('status','seances ajouter avec suceess');
        return redirect()->route('seances.index',['etat'=>'admin']);
    }

}
