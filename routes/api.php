<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get("/", function() {
 return response()->json([
    "message" => "Welcome to HandyTasksApp API",
    "date"=> Carbon::now()->format("Y-m-d"),
]);
});


require __DIR__."/auth_routes/auth_routes.php";
 require __DIR__."/task_routes/task_routes.php";