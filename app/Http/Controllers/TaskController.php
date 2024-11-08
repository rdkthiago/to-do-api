<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Criar Tarefa
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $task = Task::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'esta_completa' => $request->esta_completa == 1 ? true : false,
        ]);

        return response()->json($task, 201);
    }

    // Listar Tarefas (com filtro por status)
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('esta_completa')) {
            $query->where('esta_completa', $request->esta_completa);
        }

        $tasks = $query->get();

        return response()->json($tasks);
    }

    // Atualizar Status da Tarefa
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'esta_completa' => $request->esta_completa,
        ]);

        return response()->json($task);
    }

    // Deletar Tarefa
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tarefa deletada com sucesso.']);
    }
}
