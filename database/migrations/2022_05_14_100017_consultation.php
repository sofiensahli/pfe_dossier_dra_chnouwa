<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consultation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->nullable();
            $table->date('date_publication')->nullable();
            $table->date('date_ouverture')->nullable();
            $table->string('numero_demande_achat')->nullable();
            $table->string('numero_comission')->nullable();
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
        //
    }
}
