<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabriquant extends Model
{
    
    use HasFactory;
    protected $fillable = ['id','Name'];


    public function modeles(){
        
        return $this->hasMany(Modele::class,'fabriquant_id');
    }

}
