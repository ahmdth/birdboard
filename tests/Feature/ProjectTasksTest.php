<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
  use RefreshDatabase;

  protected $project;

  protected function setUp(): void
  {
    parent::setUp();
    $this->login();
    $this->project = Project::factory()->create(['user_id' => auth()->id()]);
  }

  public function test_project_has_many_tasks()
  {
    $task = Task::factory()->raw(['project_id' => $this->project->id]);
    $this->post(route('projects.tasks.store', $this->project), $task);
    $this->assertDatabaseHas('tasks', $task);
    $this->get(route('projects.show', $this->project))
      ->assertSee($task['body']);
  }

  public function test_only_the_owner_of_the_project_can_add_task()
  {
    $this->project = Project::factory()->create();
    $task = Task::factory()->raw();
    $this->post(route('projects.tasks.store', $this->project), $task)
      ->assertStatus(403);
    $this->assertDatabaseMissing('tasks', $task);
  }

  public function test_task_can_be_updated()
  {
    $task = Task::factory()->create(['project_id' => $this->project->id]);
    $updateTask = Task::factory()->raw(['project_id' => $this->project->id]);
    $this->patch(route('projects.tasks.update', [$this->project, $task]), $updateTask);
    $this->assertDatabaseHas('tasks', $updateTask);
  }
}
