<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FournisseursConsultation extends Model{
    protected $table  = 'fournisseurs_consultations';
    protected $fillable = [
        'montant',
        'comissions',
        'numero_demande',
        'fournisseur_id',
        'consultation_id'
   ];

   function fournisseur () {
       return $this->belongsTo(Fournisseur::class , 'fournisseur_id');
   }
   function consultation(){
    return $this->belongsTo(Consultation::class , 'consultation_id');

   }
}
