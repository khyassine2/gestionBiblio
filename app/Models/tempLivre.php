<?php

namespace App\Models;

use App\Models\Theme as ModelsTheme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tempLivre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey='isbn';
    protected $typeKey='string';
    protected $dates=['deleted_at'];
    public $incrementing=false;
    public function themes(){
        return $this->hasOne(ModelsTheme::class,'id','theme_id');
    }
}
