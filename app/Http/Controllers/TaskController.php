<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index( Request $request){
        $user = auth()->id();
        $tasks = Task::where('category_id', $user);

        $tasks = $tasks->get();
        // dd($tasks);

        return view('mytasks', compact('tasks'));
    }

    public function edit( Request $request){
        
        return view('mytasks');
    }
}
