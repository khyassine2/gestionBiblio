<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $primaryKey='livre_id';
    public function livres()
{
    return $this->hasMany(Livre::class,'isbn');
}

public function personnes()
{
    return $this->hasMany(personne::class,'id');
}
}
