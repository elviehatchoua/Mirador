<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
   public function index(){
       return Ville::all();
   }

   public function show($id){
       return Ville::find($id);
   }

   public function store(Request $request){
       //ces lignes de code font appels au ORM eloquent
     //Ville::create($request->all());
     $ville = Ville::firstOrCreate(['Name'=>$request['Name']],$request->all());
     if($ville->wasRecentlyCreated)
     {
         return view('ville.listeTabulatorV',['messageError'=>1]);
     }
     else
     {
         return view('ville.listeTabulatorV',['messageError'=>0]);
     }
     //TypeRequete::create($request->all());
     //return view('ville.listeTabulatorV');
      //return $request->all();
     // return view('ville.listeTabulatorV');

   }

   public function villeFormulaire(){
       return view('ville.villeForm') ;
   }

   public function villeListe(){
         return view('ville.listeTabulatorV',['messageError'=>2]);  
    // return view('ville.listeV',['dataVille' =>Ville::all()]);
   }

   public function showToTabulator(){
    $data= Ville::orderByDesc('created_at')->get();

    return collect(["last_page"=>1,"data"=>$data])->all();
    
    
}
}
