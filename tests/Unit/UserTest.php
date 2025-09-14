<?php


use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_a_projects()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $project = Project::factory()->create(['user_id' => auth()->id()]);
        $this->assertInstanceOf(Collection::class, $user->projects);
        $this->get(route('projects.create'))
            ->assertStatus(200);
    }

    public function test_guests_cannot_manage_project()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);
        $this->get(route('projects.index'))
            ->assertRedirect('/login');

        $this->get(route('projects.show', $project))
            ->assertRedirect('/login');

        $this->get(route('projects.create', $project))
            ->assertRedirect('/login');

        $this->post(route('projects.store'), $project->toArray())
            ->assertRedirect('/login');

    }
}
