<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoAppTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_todos(): void
    {
        $response = $this->get('/todos');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_create_todo(): void
    {
        $this->withoutMiddleware();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/todos', [
            'title' => 'Elso feladat',
        ]);

        $response->assertRedirect('/todos');
        $this->assertDatabaseHas('todos', [
            'user_id' => $user->id,
            'title' => 'Elso feladat',
            'is_completed' => false,
        ]);
    }
}
