<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user):bool{
        
        return true;
    }
    // Determine wheter the user can create the model
    public function create(User $user):bool{

        return true;
    }
    public function view(User $user, Task $task):bool{

        return $user->id === $task->user_id;
    }
    public function update(User $user, Task $task):bool{

        return $user->id === $task->user_id;
    }
    public function delete(User $user, Task $task):bool{

        return $user->id === $task->user_id;
    }
}
