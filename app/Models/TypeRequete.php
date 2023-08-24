<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRequete extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Description'];

    public function operations(){
        return $this->hasMany(Operations::class,'operation_id');
    }

}
