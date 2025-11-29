<?php

use App\Http\Controllers\task\CreateTaskController;
use Illuminate\Support\Facades\Route;

 Route::group(["prefix"=>"task"], function(){
  Route::post("store", [CreateTaskController::class, "store"]);
});