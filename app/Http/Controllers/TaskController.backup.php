<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request){
        $new_task = [
            'title' => 'Task 1',
            'description' => 'Testing the creation of tasks.',
            'author' => 'Zubumafu'
        ];

        $task = new Task($new_task);
        $task->save();
    }

    public function read(Request $request){
        $task = new Task();
        $task = $task->find(1);

        return $task;
    }

    public function read_all(Request $request){
        $tasks = Task::all();
        return $tasks;
    }

    public function update(Request $request){
        $task = Task::find(1);
        $task->title = 'new title';
        $task->save();

        return $task;
    }

    public function delete(Request $request){
        $task = Task::find(1);
        if($task)
            return $task->delete();
    }
}
