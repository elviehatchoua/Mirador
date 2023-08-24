<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;


class Marchant extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    protected $fillable = ['id','Name','Location'];

    public function terminals(){
        return $this->hasMany(Terminal::class,'marchants_id');
    }


} 