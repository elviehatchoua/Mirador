<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Operations;
use App\Models\Fabriquant;
use App\Models\Marchant;
use App\Models\Modele;
use App\Models\Terminal;
use App\Models\User;


class OperationController extends Controller
{
    public function index()
    {
        $data = Operations::leftJoin('users','operations.user_id','=','users.id')
        ->leftJoin('terminals','operations.terminal_id','=','terminals.id')
        ->join('marchants','terminals.marchants_id','=','marchants.id')
        ->join('modeles','terminals.modeles_id','=','modeles.id')
        ->join('fabriquants','modeles.fabriquant_id','=','fabriquants.id')
        ->select('modeles.Name as modele','fabriquants.Name as fabriquant','users.Name as Technicien','marchants.Name as marchand','terminals.Name as terminal','operations.ArrivalOnSite as date','operations.created_at as created_at')->get();
            //$data = collect(["last_page"=>1,"data"=>$data])->all();
        return $data;
    }

    public function show($id)
    {
        return Operations::find($id);
    }

    public function storeAPI(Request $request)
    {
        $operation = Operations::firstOrCreate(['terminal_id'=>$request['terminal_id'],'ArrivalOnSite'=>$request['ArrivalOnSite']],$request->all());
        if($operation->wasRecentlyCreated)
        {
            return true;
        }
        else
        {
            return false;

        }
  // $operation = Operations::create($request->all());
        //return  $operation;
    }

    public function store(Request $request)
    {
        Operations::create($request->all());
        return view('operation.liste',['data'=>Operations::all()]);
    }

    public function update(Request $request, $id)
    {
        $operation = Operations::findOrFail($id);
        $operation->update($request->all());

        return $operation;
    }

    public function delete(Request $request, $id)
    {
        $operation = Operations::findOrFail($id);
        $operation->delete();

        return 204;
    }

    public function getOperationBydate($dateFrom, $dateTo)
    {
        $operation = Operations::whereBetween('created_at',array($dateFrom,$dateTo))->get();
        return $operation;
    }

   /*  public function operationform(){
		
        return view('operation.formulaire');
        
    } */

    public function operationListe(){
        $data = Operations::leftJoin('users','operations.user_id','=','users.id')
        ->leftJoin('terminals','operations.terminal_id','=','terminals.id')
        ->join('marchants','terminals.marchants_id','=','marchants.id')
        ->join('modeles','terminals.modeles_id','=','modeles.id')
        ->join('fabriquants','modeles.fabriquant_id','=','fabriquants.id')
        ->select('modeles.Name as modele','fabriquants.Name as fabriquant','users.Name as Technicien','marchants.Name as marchand','terminals.Name as terminal','operations.ArrivalOnSite as date','operations.created_at as created_at')->get();
           // return $data;
      // return view('operation.liste',['dataoperation'=>$data]);
      return view ('operation.listeTabulator',['dataF'=>Fabriquant::all(),'dataMar'=>Marchant::all(),'dataM'=>Modele::all(),'dataTer'=>Terminal::all(),'dataTech'=>User::all()]);  
      //return Operations::with('terminal')->with('typeRequete')->with('user')->get();
    }
    /* SELECT
  `modeles`.`Name` AS `modele`,
  `fabriquants`.`Name` AS `fabriquant`,
  `users`.`Name` AS `technicien`,
  `marchants`.`Name` AS `marchand`,
  `terminals`.`Name` AS `terminal`,
  `operations`.`ArrivalOnSite` AS `date d'arrivée`
FROM
  `operations`
  LEFT JOIN `users` ON `operations`.`user_id` = `users`.`id`
  LEFT JOIN `terminals` ON `operations`.`terminal_id` = `terminals`.`id`
  INNER JOIN `marchants` ON `terminals`.`marchants_id` = `marchants`.`id`
  INNER JOIN `modeles` ON `terminals`.`modeles_id` = `modeles`.`id`
  INNER JOIN `fabriquants` ON `modeles`.`fabriquant_id` = `fabriquants`.`id`
     */
    public function circledata(){
         $data = Operations::join('terminals','operations.terminal_id','=','terminals.id')
          ->rightJoin('villes','terminals.villes_id','=','villes.id')
          ->groupBy('villes.Name')
          ->select(DB::raw('count(operations.id) as Nombre,villes.Name'))->get();

          //return $result= ' labels:'.$data->pluck('Name').',series:'.$data->pluck('Nombre').'';
         //return  collect([['Bananas', 'Apples', 'Grapes'],[20, 15, 40]])->toJson() ;
         return  collect([$data->pluck('Name'),$data->pluck('Nombre')])->toJson() ;
    }

    public function rapportOperations(){
        return view('operation.rapport');
    }

    public function showToTabulator(){
        $data = Operations::leftJoin('users','operations.user_id','=','users.id')
        ->leftJoin('terminals','operations.terminal_id','=','terminals.id')
        ->join('marchants','terminals.marchants_id','=','marchants.id')
        ->join('modeles','terminals.modeles_id','=','modeles.id')
        ->join('fabriquants','modeles.fabriquant_id','=','fabriquants.id')
        ->select('modeles.Name as modele','fabriquants.Name as fabriquant','users.Name as Technicien','marchants.Name as marchand','terminals.Name as terminal','operations.ArrivalOnSite as date','operations.created_at as created_at')->get();


        return collect(["last_page"=>1,"data"=>$data])->all();
        
        
    }

}
