<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = auth()->id();

        // Obter as tarefas com os detalhes e o nome da categoria
        $tasksWithCategoryName = Task::join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tasks.user_id', $user)
            ->select('tasks.id', 'tasks.name', 'tasks.detals', 'categories.name as category_name')
            ->get();

        // dd($tasksWithCategoryName);

        return view('tasks.mytasks', compact('tasksWithCategoryName'));
    }

    public function new(Request $request)
    {
        $user = auth()->id();

        // dd($tasks);

        return view('tasks.task', compact('user'));
    }



    public function create(Request $request)
    {
        if ($request->input('_token') != '') {
            $request->validate(
                [
                    'name' => 'required|string|between:3,30',
                    'detals' => 'required|max:300',
                    'category' => 'required',
                    'user_id' => 'required',
                ],
                [
                    'name.required' => 'O campo nome é obrigatório.',
                    'name.string' => 'O campo nome deve ser uma string.',
                    'name.between' => 'O campo nome deve ter entre :min e :max caracteres.',

                    'detals.required' => 'O campo detalhes é obrigatório.',
                    'detals.max' => 'O campo detalhes não pode ter mais de :max caracteres.',

                    'category.required' => 'O campo categoria é obrigatório.',

                    'user_id.required' => 'O campo ID do usuário é obrigatório.',
                ]
            );

            $categoryName = $request->input('category');

            // Verificar se a categoria já existe
            $existingCategory = Category::where('name', $categoryName)->first();

            $category_id = null;

            if (!$existingCategory && $categoryName) {
                // Se não existir, então inserir
                $category = new Category();
                $category->name = $categoryName;
                $category->save();

                $category_id = $category->id;

                // Restante do seu código para criar a tarefa
            } else {
                $category = new Category();

                $category_id = $existingCategory->id;
            }


            $task = [
                'name' => $request->input('name'),
                'detals' => $request->input('detals'),
                'category_id' => $category_id,
                'user_id' => $request->input('user_id'),
            ];

            // dd($task);

            Task::create($task);
        }
        // dd($tasks);

        return redirect()->route('mytasks');
    }

    public function edit(Request $request, $id)
    {
        $decryptedId = decrypt($id);

        $user = auth()->id();

        // Obter as tarefas com os detalhes e o nome da categoria
        $tasksWithCategoryName = Task::join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tasks.user_id', $user)->where('tasks.id', $decryptedId)
            ->select('tasks.id', 'tasks.name', 'tasks.detals', 'categories.name as category_name')
            ->first();

        // dd($tasksWithCategoryName);

        return view('tasks.edit', compact('tasksWithCategoryName'));
    }

    public function update(Request $request)
    {

        if ($request->input('_token') != '') {
            $request->validate(
                [
                    'name' => 'required|string|between:3,30',
                    'detals' => 'required|max:300',
                    'category' => 'required',
                    'user_id' => 'required',
                ],
                [
                    'name.required' => 'O campo nome é obrigatório.',
                    'name.string' => 'O campo nome deve ser uma string.',
                    'name.between' => 'O campo nome deve ter entre :min e :max caracteres.',

                    'detals.required' => 'O campo detalhes é obrigatório.',
                    'detals.max' => 'O campo detalhes não pode ter mais de :max caracteres.',

                    'category.required' => 'O campo categoria é obrigatório.',

                    'user_id.required' => 'O campo ID do usuário é obrigatório.',
                ]
            );
            // Descriptografar o ID
            $task_id = $request->input('task_id');

            // dd($task_id);

            $categoryName = $request->input('category');

            // Verificar se a categoria já existe
            $existingCategory = Category::where('name', $categoryName)->first();

            $category_id = null;

            if (!$existingCategory && $categoryName) {
                // Se não existir, então inserir
                $category = new Category();
                $category->name = $categoryName;
                $category->save();

                $category_id = $category->id;

                // Restante do seu código para criar a tarefa
            } else {
                $category = new Category();

                $category_id = $existingCategory->id;
            }



            $task = [
                'name' => $request->input('name'),
                'detals' => $request->input('detals'),
                'category_id' => $category_id,
                'user_id' => $request->input('user_id'),
            ];

            Task::where('id', $task_id)->update($task);

            // dd($task);
        }


        return redirect()->route('mytasks');
    }

    public function delete(Request $request)
    {
        if ($request->input('_token') != '') {
            $id = decrypt($request->input('task_id'));

            $task = Task::find($id);
            //    dd($task);
            $task->delete();
        }

        return redirect()->route('mytasks');
    }
}
