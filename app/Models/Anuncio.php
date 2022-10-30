<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncio extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable=['precio','titulo','descripicion','imagen','user_id'];
    
    
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }
    
    public function ofertas(){
        return  $this->hasMany('App\Models\Oferta');
    }
    
    public function ofertaAcceptada():bool{
        $ofertas = $this->ofertas()->get();
        foreach($ofertas as $oferta){
            
            if($oferta->acceptada != null){
                return true;
            }
        }
        return  false;
    }
    
}
