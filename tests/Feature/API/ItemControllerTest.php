<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Item;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected $user;

    public function testCreateItemsInATodoTasks()
    {
        $this->withExceptionHandling();
        $task = Task::factory()->make();
        $response = $this->postJson('/api/tasks/$task->id/items');

        $response->assertStatus(201)
            ->assertJsonStructure(
                [
                    'success',
                    'data' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'is_complete',
                                'created_date',
                            ],
                        ]
                    ],
                    'message'
                ]
            );
    }

    public function testDeleteAnItemInATodoTask()
    {
        $this->withExceptionHandling();
        $task = Task::factory()->make();
        $item = Item::factory()->make();
        $response = $this->deleteJson("/api/tasks/$task->id/items/$item->id");

        $response->assertStatus(204);
    }
}
