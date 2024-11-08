<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function teste_criar_uma_nova_tarefa()
    {
        $response = $this->postJson('/api/tasks', [
            'titulo' => 'Nova Tarefa',
            'descricao' => 'Descrição da nova tarefa'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['titulo' => 'Nova Tarefa']);
    }

    public function teste_listar_todas_as_tarefas()
    {
        Task::factory()->create(['titulo' => 'Tarefa Existente']);

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200);
        $response->assertJsonFragment(['titulo' => 'Tarefa Existente']);
    }

    public function teste_atualizar_o_status_de_uma_tarefa()
    {
        $task = Task::factory()->create(['esta_completa' => false]);

        $response = $this->putJson("/api/tasks/{$task->id}", ['esta_completa' => true]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'esta_completa' => true]);
    }

    public function teste_deletar_uma_tarefa()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
