<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model{

    protected $fillable = [
        'titre',
        'date_publication',
        'date_ouverture',
        'numero_demande_achat',
        'numero_comission'
   ];

   function fournisseurs(){
       return $this->hasMany(FournisseursConsultation::class , 'consultations_id');
   }

   function peiceJointes(){
    return $this->hasMany(PieceJointe::class);
}
}
