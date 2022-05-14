<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FournisseursConsultations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs_consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('montant', 12.2)->nullable();
            $table->double('comissions', 12.2)->nullable();
            $table->string('numero_demande')->nullable();
            $table->unsignedBigInteger('fournisseur_id');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->unsignedBigInteger('consultations_id');
            $table->foreign('consultations_id')->references('id')->on('consultations');
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
