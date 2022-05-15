<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->group( function () {
    Route::post('update-user-info' , [UserManagementController::class , 'updateUserInfo']);
    Route::post('update-user-password' , [UserManagementController::class , 'updateUserPassword'] );
});

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('insert_consultation' , [ConsultationController::class , 'insertConsultation'] );
    Route::get('get-consultations', [ConsultationController::class , 'getConsultations']);
});

Route::post('sign-up' , [UserManagementController::class , 'signUp']);
Route::post('sign-in', [UserManagementController::class , 'signIn']);
