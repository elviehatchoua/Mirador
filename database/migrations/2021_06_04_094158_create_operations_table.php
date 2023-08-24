<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ArrivalOnSite')->nullable();
            $table->dateTime('DebutIntervention');
            $table->dateTime('FinIntervention');
            $table->dateTime('DateRequete')->nullable();
            $table->text('WorkDesc')->nullable();
            $table->text('Comment');
            $table->string('nomClient');
            $table->string('TelClient');
            $table->string('contactClient');
            $table->string('photoSurSite')->nullable();
            $table->foreignId('terminal_id')->constrained('terminals');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('type_requetes_id')->constrained('type_requetes');
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
        Schema::dropIfExists('operations');
    }
}
