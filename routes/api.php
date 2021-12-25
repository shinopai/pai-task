<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// get all projects
Route::get('/projects/all', 'Api\ProjectsApiController@getAllProjects');

// get current user id
Route::get('/user', 'Api\UsersApiController@getCurrentUserId');

// create new project
Route::post('/projects', 'Api\ProjectsApiController@createNewProject');

// create new task
Route::post('/tasks', 'Api\TasksApiController@createNewTask');

// get all tasks that state is do
Route::get('/tasks/do', 'Api\TasksApiController@getAllTasksDo');

// get all tasks that state is doing
Route::get('/tasks/doing', 'Api\TasksApiController@getAllTasksDoing');

// get all tasks that state is done
Route::get('/tasks/done', 'Api\TasksApiController@getAllTasksDone');

// get project name
Route::get('/project_name/{project}', 'Api\ProjectsApiController@getProjectName');

// get all tasks that state is do
Route::get('/projects/{project}/tasks/do', 'Api\TasksApiController@getAllProjectTasksDo');

// get all tasks that state is do
Route::get('/projects/{project}/tasks/doing', 'Api\TasksApiController@getAllProjectTasksDoing');

// get all tasks that state is do
Route::get('/projects/{project}/tasks/done', 'Api\TasksApiController@getAllProjectTasksDone');
