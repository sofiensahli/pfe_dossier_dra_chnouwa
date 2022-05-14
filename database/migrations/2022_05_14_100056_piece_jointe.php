<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PieceJointe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path')->nullable();
            $table->unsignedBigInteger('consultation_id');
            $table->foreign('consultation_id')->references('id')->on('consultations');
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
