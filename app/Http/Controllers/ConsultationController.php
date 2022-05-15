<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\PieceJointe as ModelsPieceJointe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
{
/*
       'titre',
        'date_publication',
        'date_ouverture',
        'numero_demande_achat',
        'numero_comission'
*/
    public function insertConsultation ( Request $request){
        if(isset($request->id))
            $consultation =  Consultation::find($request->id);
        else
            $consultation = new Consultation() ;
        $consultation->titre = $request->titre ;
        $consultation->date_publication = $request->date_publication;
        $consultation->date_ouverture = $request->date_ouverture;

;
        $consultation->numero_demande_achat = $request->numero_demande_achat;
        $consultation->numero_comission = $request->numero_comission;
        $consultation->save();
        if ($request->hasFile('document')){
            $file = new ModelsPieceJointe();
            $filename = $request->file('document');
            $path = $filename->store('public/images');
            $file->path = Storage::url($path);
            $file->consultation_id = $consultation->id;
            $file->save();
        }
        return response()->json( Consultation::with(['peiceJointes' , 'fournisseurs'] ) ->find($consultation->id));
    }

    public function getConsultations ( ){
        return response()->json( Consultation::with(['peiceJointes' , 'fournisseurs'] ) ->get());
    }

}
