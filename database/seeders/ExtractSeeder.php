<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExtractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen(__DIR__.'/SG_CAMEROUN.csv', 'r');

        while(($dataInsert = fgetcsv($handle, 1000 , ";")) !== FALSE) 
        {
            print($dataInsert[1]);

           $idMarchand = \App\Models\Marchant::firstOrCreate(['Name' =>$dataInsert[1]],['Name'=>$dataInsert[1]]) ;
           $idVille = \App\Models\Ville::firstOrCreate(['Name' =>$dataInsert[3]],['Name'=>$dataInsert[3]]);
           $idFabriquant = \App\Models\Fabriquant::firstOrCreate(['Name' =>'ingenico'],['Name' =>'ingenico']);
           $idModele = \App\Models\Modele::firstOrCreate(['Name' =>$dataInsert[8]],['Name'=>$dataInsert[8],'fabriquant_id'=>$idFabriquant->id]);
           $idTerminal = \App\Models\Terminal::firstOrCreate(['Name' =>$dataInsert[7]],['Name'=>$dataInsert[7],'OperateurCarte'=>$dataInsert[12],'NumeroSerie'=>$dataInsert[10],'PartName'=>$dataInsert[9],'SIMId'=>$dataInsert[13],'Lieu'=>$dataInsert[2],'villes_id'=>$idVille->id, 'marchants_id'=>$idMarchand->id, 'modeles_id'=>$idModele->id]);
        }

    }
}
