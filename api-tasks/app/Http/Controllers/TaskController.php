<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use http\Env\Response;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }


    public function cadastro(Request $request)
    {
        $task = new Task();
        $task->titulo = $request->input('titulo');
        $task->descricao = $request->input('descricao');
        $task->status = $request->input('status');

        if ($task->save()){
            return response()->json($task, 201);
        }
        return response()->json('', 400);
    }

    public function delete($id)
    {
        $task = new Task();
        $task = Task::findOrFail($id);

        $task->delete();
        return response()->json('', 204);

    }

    public function atualiza(Request $request, $id)
    {
        $task = Task::find($id);
        $task->titulo = $request->input('titulo');
        $task->descricao = $request->input('descricao');
        $task->status = $request->input('status');

        if ($task->save()){
            return response()->json($task, 201);
        }
        return response()->json(['Error'=>'Erro ao atualizar task'], 404);
    }
}


