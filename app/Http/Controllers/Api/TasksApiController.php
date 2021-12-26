<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TasksRequest;
use App\Task;
use App\Project;

class TasksApiController extends Controller
{
    public function getAllTasksDo(){
        $tasks = Task::where('state', 'do')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function getAllTasksDoing(){
        $tasks = Task::where('state', 'doing')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function getAllTasksDone(){
        $tasks = Task::where('state', 'done')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function createNewTask(TasksRequest $request){
      $task = Task::create([
          'subject' => $request->input('subject'),
          'state' => $request->input('state'),
          'user_id' => $request->input('user_id'),
          'project_id' => $request->input('project_id')
      ]);
    }

    public function getAllProjectTasksDo(Project $project){
        $tasks = Task::where('project_id', $project->id)->where('state', 'do')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function getAllProjectTasksDoing(Project $project){
        $tasks = Task::where('project_id', $project->id)->where('state', 'doing')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function getAllProjectTasksDone(Project $project){
        $tasks = Task::where('project_id', $project->id)->where('state', 'done')->orderBy('created_at', 'desc')->get();
        $tasks->load('project');

        return $tasks;
    }

    public function deleteTask(Task $task){
        $task->delete();
    }

    public function getEditTask(Task $task){
        $task->load('project');

        return $task;
    }

    public function updateTask(TasksRequest $request, Task $task){
        $task->subject = $request->subject;
        $task->state = $request->state;
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->save();
    }
}
