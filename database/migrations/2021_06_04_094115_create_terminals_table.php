<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Lieu')->nullable();
            $table->string('OperateurCarte')->nullable();
            $table->string('NumeroSerie')->nullable();
            $table->string('SIMId')->nullable();
            $table->string('PartName')->nullable();
            $table->string('Location')->nullable();
            $table->foreignId('marchants_id')->constrained('marchants');
            $table->foreignId('modeles_id')->constrained('modeles');
            $table->foreignId('villes_id')->constrained('villes')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals');
    }
}
