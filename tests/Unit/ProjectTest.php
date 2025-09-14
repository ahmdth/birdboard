<?php


use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
  use RefreshDatabase;

  public function test_user_can_create_a_project()
  {
    $this->login();
    $project = Project::factory()->raw(['user_id' => auth()->id()]);

    $response = $this->post(route('projects.store'), $project);

    $this->assertDatabaseHas('projects', $project);

//    $response->assertRedirect(route('projects.show', $project));

    $this->get(route('projects.show', Project::where($project)->first()))
      ->assertSee($project['title'])
      ->assertSee($project['description'])
      ->assertSee($project['notes']);
  }

  public function test_user_can_update_project()
  {
    $this->login();
    $project = Project::factory()->create(['user_id' => auth()->id()]);
    $this->patch(route('projects.update', $project), $attributes = ['title' => 'changed', 'description' => 'changed', 'notes' => 'Changed']);
    $this->assertDatabaseHas('projects', $attributes);
  }

  public function test_user_can_view_project()
  {
    $this->login();
    $project = Project::factory()->create(['user_id' => auth()->id()]);
    $this->get(route('projects.show', $project))
      ->assertSee($project->title)
      ->assertSee($project->description);
  }

  public function test_project_has_owner()
  {
    $project = Project::factory()->raw();
    $this->post(route('projects.store'), $project)
      ->assertRedirect('/login');
  }

  public function test_guest_cannot_view_projects()
  {
    $this->get(route('projects.index'))
      ->assertRedirect('/login');
  }

  public function test_user_can_only_view_and_edit_his_projects()
  {
    $this->login();
    $guest = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $guest->id]);
    $this->get(route('projects.show', $project))
      ->assertStatus(403);

    $this->get(route('projects.edit', $project))
      ->assertStatus(403);
  }


  public function test_project_has_a_tasks()
  {
    $this->login();
    $project = Project::factory()->create(['user_id' => auth()->id()]);
    $task = Task::factory()->raw();
    $this->post(route('projects.tasks.store', $project), $task);
    $this->assertCount(1, $project->tasks);
  }

  public function test_project_title_validation()
  {
    $this->login();
    $project = Project::factory()->raw(['user_id' => auth()->id(), 'title' => '']);
    $this->post(route('projects.store'), $project)
      ->assertSessionHasErrors('title');
  }

  public function test_project_description_validation()
  {
    $this->login();
    $project = Project::factory()->raw(['user_id' => auth()->id(), 'description' => '']);
    $this->post(route('projects.store'), $project)
      ->assertSessionHasErrors('description');
  }
}
