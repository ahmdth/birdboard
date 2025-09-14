<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
  use RefreshDatabase;

  protected $project;

  protected function setUp(): void
  {
    parent::setUp();
    $this->login();
    $this->project = Project::factory()->create(['user_id' => auth()->id()]);
  }

  public function test_creating_project_record_activity()
  {
//    dd($this->project->activity);
    $this->assertCount(1, $this->project->activity);
    $this->assertEquals('created_project', $this->project->activity[0]->description);
  }

  public function test_updating_project_record_avtivity()
  {
    $this->patch(route('projects.update', $this->project), ['title' => 'changed.']);
    $this->assertCount(2, $this->project->activity);
    $this->assertEquals('updated_project', $this->project->activity->last()->description);
  }

  public function test_creating_new_task_record_activity()
  {
    $task = Task::factory()->create(['project_id' => $this->project->id]);
    $this->assertCount(2, $this->project->activity);
    tap($this->project->activity->last(), function ($activity) {
      $this->assertEquals('created_task', $activity->description);
      $this->assertInstanceOf(Task::class, $activity->subject);
    });
  }

  public function test_updating_task_record_activity()
  {
    $task = Task::factory()->create(['project_id' => $this->project->id]);
    $this->patch(route('projects.tasks.update', [$this->project, $task]), ['body' => 'changed']);
    $this->assertCount(3, $this->project->activity);
    $this->assertEquals('updated_task', $this->project->activity->last()->description);
  }
}
