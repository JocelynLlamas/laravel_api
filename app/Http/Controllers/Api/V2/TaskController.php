<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Task::class);
    }


    public function index()
    {
        //Collection because is a Json 
        return TaskResource::collection(auth()->user()->tasks()->get());
    }

    public function show(Task $task){

        // $this->authorize('view', $task);
        return TaskResource::make($task);
        
    }

    public function store(StoreTaskRequest $request){

        $task = $request->user()->tasks()->create($request->validated());

        return TaskResource::make($task);
    }
    
    public function update(UpdateTaskRequest $request, Task $task){

        $task ->update($request->validated());

        return TaskResource::make($task);
    }

    public function destroy(Task $task){

        $task->delete();

        return response()->noContent();
    }

}
