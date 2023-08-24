<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marchant;
use App\Models\Ville;
use App\Models\Terminal;

class MarchandController extends Controller
{
    public function index()
    {
        return Marchant::all();
    }
 
    public function show($id)
    {
        return Marchant::find($id);
    }

    public function store(Request $request)
    {
        //Marchant::create($request->all());
        $marchand = Marchant::firstOrCreate(['Name'=>$request['Name']],$request->all());
        if($marchand->wasRecentlyCreated)
        {
            return view('marchand.listeTabulatorMar',['messageError'=>1]);
        }
        else
        {
            return view('marchand.listeTabulatorMar',['messageError'=>0]);
        }
    }

    public function update(Request $request, $id)
    {
        $Marchand = Marchant::findOrFail($id);
        $Marchand->update($request->all());

        return $Marchand;
    }

    public function delete(Request $request, $id)
    {
        $Marchand = Marchant::findOrFail($id);
        $Marchand->delete();

        return 204; 
        //return var_dump($id);
    }

    public function marchandform(){
		
        return view('marchand.formulaire',['donVille'=>Ville::all()]);
        
    }

    public function marchandListe(){
        //return view('marchand.listeTabulatorMar');
       // return view('marchand.listeTabulatorMar',['dataMarchand'=>Marchant::with('ville')->get()]);
       return view('marchand.listeTabulatorMar',['messageError'=>2]);
       //return Marchant::with('ville')->get();
    }

    public function termByMarchand_id($id){
            return Marchant::find($id)->terminals;
    }

    public function getMarchandByVilleId($id){
        return Ville::find($id)->marchands;
    }

    public function showToTabulator(){
        $data= Marchant::orderByDesc('created_at')->get();

        //return collect(["last_page"=>1,"data"=>$data])->all();
        return $data;
        
        
    }
}
    