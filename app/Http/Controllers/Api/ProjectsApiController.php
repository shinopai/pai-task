<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Project;
use App\Task;

class ProjectsApiController extends Controller
{
    public function getAllProjects(){
        $projects = Project::all();
        $projects->load('tasks');

        return $projects;
    }

    public function createNewProject(ProjectsRequest $request){
        Project::create([
            'project_name' => $request->project_name,
            'user_id' => $request->user_id,
        ]);
    }

    public function getProjectName(Project $project){
        return $project->project_name;
    }
}
