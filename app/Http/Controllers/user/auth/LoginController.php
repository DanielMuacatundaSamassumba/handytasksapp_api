<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function  login(LoginRequest $request)
    {
        try {
            $data = $request->all();
            $user = User::where("email", $data["email"])->first();

            if (!$user) {
                return  response()->json(
                    ["message" => "user not founded!"]
                );
            }

          if(!password_verify($data["password"], $user->password)){  
             return response()->json(
                    [
                          "message"=>"Credencials Invalidates"
                    ]
            
             );
           } 
            return response()->json([
                 "message"=>"Login  made successfully!",
                 "data"=>new  UserResource($user)
            ]);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => "something Went Wrong",
                    " error" => $e->getMessage()
                ]
            );
        }
    }
}
