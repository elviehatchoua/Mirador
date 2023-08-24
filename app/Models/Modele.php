<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'Name','fabriquant_id'];

    public function fabriquant(){
        return $this->belongsTo(Fabriquant::class);
    }
    public function terminals(){
        
        return $this->hasMany(Terminal::class,'terminals_id');
    }

    

}
