<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasksForUser = $request->user()->tasks()
            ->orderBy('created_at', 'asc')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasksForUser,
        ]);
    }

    public function destroy(Request $request, Task $task)
    {
        //$this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

    public function getTask()
    {
        return view('tasks.index');
    }

    public function postTask(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
}
