<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;
    protected $fillable = ['ArrivalOnSite', 'DebutIntervention','FinIntervention','DateRequete','WorkDesc','Comment','nomClient','TelClient','contactClient','terminal_id','user_id','type_requetes_id'];


    public function terminal(){
        return $this->belongsTo(Terminal::class);
    }

    public function typeRequete(){
        return $this->belongsTo(TypeRequete::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
