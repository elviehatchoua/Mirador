<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRequete;

class TypeRequeteController extends Controller
{
    public function index(){
        return TypeRequete::all();
    }

    public function show($id){
        return TypeRequete::find($id);
    }

    public function store(Request $request){
        $typerequete = TypeRequete::firstOrCreate(['Name'=>$request['Name']],$request->all());
        if($typerequete->wasRecentlyCreated)
        {
            return view('typerequete.listeTabulatorTR',['messageError'=>1]);
        }
        else
        {
            return view('typerequete.listeTabulatorTR',['messageError'=>0]);
        }
        //TypeRequete::create($request->all());
        return view('typerequete.listeTabulatorTR');
    }

    public function update(Request $request, $id)
    {
        $TypeRequete = TypeRequete::findOrFail($id);
        $TypeRequete->update($request->all());

        return $TypeRequete;
    }

    public function delete(Request $request, $id)
    {
        $TypeRequete = TypeRequete::findOrFail($id);
        $TypeRequete->delete();

        return 204;
    }

    public function typeRequeteform(){
		
        return view('typerequete.formulaire');
        
    }

    public function typeRequeteListe(){
        return view('typerequete.listeTabulatorTR',['messageError'=>2]);
        //  return view('typerequete.liste',['data' => TypeRequete::all()]);
    }

    public function showToTabulator(){
        $data= TypeRequete::all();

        return collect(["last_page"=>1,"data"=>$data])->all();
        
        
    }
}
