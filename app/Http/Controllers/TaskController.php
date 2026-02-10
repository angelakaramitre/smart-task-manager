<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = request()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

}
