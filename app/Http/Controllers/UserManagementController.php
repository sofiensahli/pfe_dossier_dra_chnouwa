<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function signUp ( Request $request){

        $user = User::create([
       'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'role' => $request->role ,
        'password' => encrypt( $request->password),
        'mobile_number' => $request->phone,
        'email'=> $request->email
        ]);
        return response()->json($user);
    }

    public function signIn (Request $request ){
            $user  = User::where('email' , '=' , $request->email)->first();
            if(isset($user)){
                    $db_password = decrypt($user->password);
                    if($db_password == $request->password)
                        return response()->json(['user'=> $user , 'token' => $user->createToken('tokens')->plainTextToken]);
                    else
                        return response()->json(['error' => 'invalid password']);
                }else
                return response()->json(['error' => 'user not found']);
    }

    public function updateUserInfo(Request $request){
        $user = User::find($request->id);
        if(isset($user)){
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user-> mobile_number = $request->mobile_number;
            $user->save();
            return response()->json($user);        }else
        return response()->json(['error'=> "User not found "]);

    }

   public function updateUserPassword(Request $request){
    $user = User::find($request->id);
    if(isset($user)){
        $user->password = encrypt( $request->password);
        $user->save();
        return response()->json($user);
        }
        else
    return response()->json(['error'=> "User not found "]);
   }

}
