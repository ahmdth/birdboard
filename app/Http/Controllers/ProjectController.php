<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('projects.index', [
      'projects' => auth()->user()->projects
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('projects.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \App\Http\Requests\ProjectRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProjectRequest $request)
  {
    $project = auth()->user()->projects()->create($request->toArray());
    return redirect() ->to(route('projects.show', $project))->with(['message' => 'Project created successfully.']);
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Project $project
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    $this->authorize('view', $project);
    return view('projects.show', compact('project'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Project $project
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project)
  {
    $this->authorize('update', $project);
    return view('projects.edit', compact('project'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \App\Http\Requests\ProjectRequest $request
   * @param \App\Models\Project $project
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Project $project)
  {
    $this->authorize('update', $project, $request->notes);
    $project->updateOrFail(request(['title', 'description', 'notes']));
    return to_route('projects.show', $project)->with(['message' => 'Project updated successfully.']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Project $project
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project)
  {
    //
  }
}
