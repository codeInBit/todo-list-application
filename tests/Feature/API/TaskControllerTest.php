<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected $user;

    public function testGetAllTasks()
    {
        $this->withExceptionHandling();
        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
        ->assertJsonStructure(
            [
                'success',
                'data' => [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'created_date',
                        ],
                    ]
                ],
                'message'
            ]
        );
    }

    public function testCreateTask()
    {
        $this->withExceptionHandling();
        $response = $this->postJson('/api/tasks', [
            "name" => 'This is a new task',
        ]);

        $response->assertStatus(201)
        ->assertJsonStructure(
            [
                'success',
                'data' => [
                    'id',
                    'name',
                    'created_date',
                ],
                'message'
            ]
        );
    }

    public function testCreateTaskWithoutName()
    {
        $this->withExceptionHandling();
        $response = $this->postJson('/api/tasks', [
            "amonameunt" => '',
        ]);

        $response->assertStatus(422)
        ->assertJsonStructure(
            [
                'message',
                'errors' => [
                    'name'
                ]
            ]
        );
    }

    public function testShowATask()
    {
        $this->withExceptionHandling();
        $task = Task::factory()->make();

        $response = $this->getJson('/api/tasks/$task->id');

        $response->assertStatus(200)
        ->assertJsonStructure(
            [
                'success',
                'data' => [
                    'id',
                    'name',
                    'created_date',
                    'items' => [
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

    public function testUpdateATask()
    {
        $this->withExceptionHandling();
        $task = Task::factory()->make();
        $response = $this->postJson("/api/tasks/$task->id", [
            "name" => "This is an updated task",
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(
            [
                'data',
                'success',
                'message',
            ]
        );
    }

    public function testDeleteATask()
    {
        $this->withExceptionHandling();
        $task = Task::factory()->make();
        $response = $this->deleteJson("/api/tasks/$task->id");

        $response->assertStatus(204);
    }
}
