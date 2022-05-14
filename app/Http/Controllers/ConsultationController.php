<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\PieceJointe as ModelsPieceJointe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PieceJointe;

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


}
