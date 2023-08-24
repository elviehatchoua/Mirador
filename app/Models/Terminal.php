<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'OperateurCarte','NumeroSerie','SIMId','PartName','marchants_id','modeles_id','villes_id'];

    public function modele(){
        return $this->belongsTo(Modele::class,'modeles_id');
    }

    //le second param fait reference à l'id du marchand dans la table terminal
    public function marchant(){
        return $this->belongsTo(Marchant::class,'marchants_id');
    }

    public function operations(){
        return $this->hasMany(Operations::class,'operation_id');
    }

    public function ville(){
        return $this->belongsTo(Ville::class,'villes_id');
    }
}