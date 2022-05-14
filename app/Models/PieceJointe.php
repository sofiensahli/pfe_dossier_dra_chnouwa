<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model{
    protected $table  = 'piece_jointes';
    protected $fillable = [

        'consultations_id',
        'path',

   ];


   function consultation(){
    return $this->belongsTo(Fournisseur::class , 'consultations_id');

   }
}
