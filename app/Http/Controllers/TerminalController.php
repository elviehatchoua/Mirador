<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terminal;
use App\Models\Marchant;
use App\Models\Modele;
use App\Models\Fabriquant;
use App\Models\Ville;


class TerminalController extends Controller
{
    public function index()
    {
        return Terminal::all();
    }
 
    public function show($id)
    {
        return Terminal::find($id);
    }

    public function store(Request $request)
    {
       $terminal =  Terminal::firstOrCreate(['Name' =>$request['Name']],$request->all());
       
        if($terminal->wasRecentlyCreated)
        {
            return view('terminal.listeTabulatorT',['dataMarchand'=>Marchant::all(),'dataFabriquant'=>Fabriquant::all(), 'data' => Terminal::with('marchant')->with('modele')->get(),'dataVilles'=>Ville::all(),'messageError'=>1]);
        }
        else
        {
        return view('terminal.listeTabulatorT',['dataMarchand'=>Marchant::all(),'dataFabriquant'=>Fabriquant::all(),'messageError'=>0 ,'data' => Terminal::with('marchant')->with('modele')->get(),'dataVilles'=>Ville::all()]);

      
        }
        //return var_dump($request->all());
      /*   Terminal::create($request->all());
        file_put_contents('result.txt', $request->all());
        return view('terminal.liste',['data' => Terminal::all()]); */

    }

    public function storeAPI(Request $request)
    {
        $terminal =  Terminal::firstOrCreate(['Name' =>$request['Name']],$request->all());
        if($terminal->wasRecentlyCreated)
        {
            return true;
        }
        else
        {
            return false;

        }
    }

    public function update(Request $request, $id)
    {
        $Terminal = Terminal::findOrFail($id);
        $Terminal->update($request->all());

        return $Terminal;
    }

    public function delete(Request $request, $id)
    {
        $Terminal = Terminal::findOrFail($id);
        $Terminal->delete();

        return 204;
    }

    public function terminalform(){
		
        return view('terminal.formulaire',['dataMarchand'=>Marchant::all(),'messageError'=>false ,'dataFabriquant'=>Fabriquant::all(),'dataVilles'=>Ville::all()]);
        
    }
    //cette action retourne la vue de la liste
    public function terminalListe(){
      return view('terminal.listeTabulatorT',['dataMarchand'=>Marchant::all(),'dataFabriquant'=>Fabriquant::all(), 'data' => Terminal::with('marchant')->with('modele')->get(),'dataVilles'=>Ville::all(),'messageError'=>2]);
        // return view('terminal.liste',['data' => Terminal::with('marchant')->with('modele')->get()]);
   // return Terminal::with('marchant')->with('modele')->get();
    }
        //cette action retourne les données de l'action
    public function showToTabulator(){
        $data= Terminal::orderByDesc('created_at')->get();

        //return collect(["last_page"=>1,"data"=>$data])->all();
        return $data;
        
        
    }
}
