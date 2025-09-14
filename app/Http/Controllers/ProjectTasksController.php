<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;

class ProjectTasksController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \App\Http\Requests\StoreTaskRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreTaskRequest $request, Project $project)
  {
    abort_if(auth()->user()->isNot($project->owner), 403);
    $project->tasks()->create($request->all());
    return to_route('projects.show', $project)->with(['message' => 'Task created successfully.']);
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function show(Task $task)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function edit(Task $task)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \App\Http\Requests\UpdateTaskRequest $request
   * @param \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateTaskRequest $request, Project $project, Task $task)
  {
    $request['complated'] = $request->boolean('complated');
    abort_if(auth()->user()->isNot($project->owner), 403);
    $task->update($request->only(['body', 'complated']));
    return to_route('projects.show', $project)->with(['message' => 'Task updated successfully.']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project, Task $task)
  {
    abort_if(auth()->user()->isNot($project->owner), 403);
    $task->deleteOrFail();
    return to_route('projects.show', $project)->with(['message' => 'Task deleted successfully.']);
  }
}
