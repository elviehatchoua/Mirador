<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Fabriquant;

class ModeleController extends Controller
{
    public function index()
    {
        return Modele::all();
    }

    public function show($id)
    {
        return Modele::find($id);
    }

    public function store(Request $request)
    {
        $modele = Modele::firstOrCreate(['Name'=>$request['Name']],$request->all());
        if($modele->wasRecentlyCreated)
        {
            return view('modele.listeTabulatorM',['dataF'=>Fabriquant::all(),'messageError'=>1]);
        }
        else
        {
            return view('modele.listeTabulatorM',['dataF'=>Fabriquant::all(),'messageError'=>0]);
        }
    }

    public function modeleForm(){
        return view('modele.formulaire',['dataF'=>Fabriquant::all(),'messageError'=>false]);
    }
    
    public function modeleListe(){
       // return view('modele.listeTabulatorM');
        //return view('modele.listeTabulatorM',['dataM'=>Modele::with('fabriquant')->get()]);
        //$mod = Fabriquant::get() ;
        //return Modele::with('fabriquant')->get();
        return view('modele.listeTabulatorM',['dataF'=>Fabriquant::all(),'messageError'=>2]);

    }
    
    public function modeleByFabriquantId($id){
        return Fabriquant::find($id)->modeles;
        
    }

    public function showToTabulator(){
        $data= Modele::with('fabriquant')->get();

        return collect(["last_page"=>1,"data"=>$data])->all();
        
        
    }
}
