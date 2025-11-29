<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateTaskController extends Controller
{
    public function store(CreateTaskRequest $request)
    {
        try {
             $user = Auth::user();
            $data = $request->all();
            $task = Task::create([
                "user_id"=> "01k9z3gthbvv25g3crwv1cvgz8",
                "title"=> $data["title"],
                "description"=> $data["description"],
                "status"=> $data["status"],
                "end_at"=> $data["end_at"],
            ]);
            return response()->json(
                [
                    "message" => "user created successfully",
                    "error" => $task
                ]
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => "user created successfully",
                    "error" => $e->getMessage()
                ]
            );
        }
    }
}
