<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Verification extends Component
{
    public $numInsc;
    public $err='';
    public function render()
    {
        return view('livewire.verification');
    }
    public function verification()
    {
        $result=DB::table('personnes')->select('id')->where('numInsc','=',$this->numInsc)->get();

        if(isset($result[0])){
            session()->put('numInsc',$result[0]->id);
            return redirect()->route('locations');
        }else{
            $this->err='num Inscription invalide';
        }
    }
}
