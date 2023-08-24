<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabriquant;

class FabriquantController extends Controller
{
    public function index(){
        return Fabriquant::all();
    }

    public function show($id){
        return Fabriquant::find($id);
    }

    public function store(Request $request)
    {

        $fabriquant =  Fabriquant::firstOrCreate(['Name' =>$request['Name']],$request->all());
        if($fabriquant->wasRecentlyCreated)
        {
            return view('fabriquant.listeTabulatorF',['messageError'=>1 , 'dataF'=>Fabriquant::all()]);
        }
        else
        {
            return view('fabriquant.listeTabulatorF',['messageError'=>0 ,'dataF'=>Fabriquant::all()]);

        }
    }

    public function fabriquantform(){
		
        return view('fabriquant.formulaire',['messageError'=>false]);
        
    }

    public function fabriquantListe(){
        
        return view('fabriquant.listeTabulatorF',['dataF'=>Fabriquant::all(),'messageError'=>2  ]);

    }

    public function showToTabulator(){
        $data= Fabriquant::all();

        return collect(["last_page"=>1,"data"=>$data])->all();
        
        
    }

    public function termByFabriquant_id($id){
        return Fabriquant::find($id)->terminals;
    }

    public function modeleByFabriquant_id($id){}
}

