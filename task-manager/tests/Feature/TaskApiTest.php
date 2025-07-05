<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_get_their_tasks_via_api()
    {
        // Arrange: создаём пользователя и задачи
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $task1 = Task::factory()->create(['user_id' => $user->id, 'title' => 'My Task']);
        $task2 = Task::factory()->create(['user_id' => $otherUser->id, 'title' => 'Not My Task']);

        // Аутентифицируем пользователя через Sanctum
        Sanctum::actingAs($user);

        // Act: делаем GET-запрос к API
        $response = $this->getJson('/api/tasks');

        // Assert: видим только свою задачу
        $response->assertStatus(200);
        $response->assertJsonFragment(['title' => 'My Task']);
        $response->assertJsonMissing(['title' => 'Not My Task']);
    }
}