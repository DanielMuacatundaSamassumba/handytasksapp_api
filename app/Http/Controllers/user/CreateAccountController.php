<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class CreateAccountController extends Controller
{
    public function store(CreateUserRequest $request)
    {
        try {
            $userCheck = User::where("email", $request->email)->first();
            if ($userCheck) {
                return  response()->json(
                    [
                        "message" => "user already registed"
                    ]
                );
            }
            $data = $request->all();
            $passwordHushed = bcrypt($data["password"]);
            $user = User::create(
                [
                    "name" => $data["name"],
                    "email" => $data["email"],
                    "password" => $passwordHushed
                ]
            );
            return  response()->json(
                [
                    "message" => "user created successfully",
                    "user" => new UserResource($user)
                ]
            );
        } catch (\Exception $e) {
            return  response()->json([
                "erro" => "something went wrong",
                "message" => $e->getMessage()
            ]);
        }
    }
}
