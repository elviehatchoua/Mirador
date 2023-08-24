<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Description'];

    public function terminals(){
        return $this->hasMany(Terminal::class,'terminals_id');
    }

}
