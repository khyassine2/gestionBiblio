<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey='isbn';
    protected $typeKey='string';
    public $incrementing=false;
    protected $fillable=['isbn','titre','offreby','date_ajout','prix','theme_id'];
    protected $dates=['deleted_at'];
    public function seances()
    {
       return $this->belongsTo(Seance::class);
    }
    public function themes()
{
    return $this->hasOne(Theme::class,'id','theme_id');
}
}
