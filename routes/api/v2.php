<?php

use App\Http\Controllers\Api\V2\CompleteTaskController;
use App\Http\Controllers\Api\V2\TaskController;
use App\Http\Controllers\Api\V2\SummaryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v2')->group(function(){
    // GET, PUT, DELETE
    Route::apiResource('/tasks', TaskController::class);
    Route::get('/summaries', SummaryController::class);
    // PATCH: Partially update a resource, which means that a portion of the resource 
    //will be changed, instead of the entire resource.
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});