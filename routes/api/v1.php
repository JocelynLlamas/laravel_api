<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    // GET, PUT, DELETE
    Route::apiResource('/tasks', TaskController::class);
    // PATCH: Partially update a resource, which means that a portion of the resource 
    //will be changed, instead of the entire resource.
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});