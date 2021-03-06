<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model{

    protected $fillable = [
        'nom',
        'description',
        'numeros'
   ];

   function consultations(){
    return $this->hasMany(FournisseursConsultation::class);
}
}
