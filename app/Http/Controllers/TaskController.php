<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Route;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Auth::User()->tasks;

        return view('task.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('task.create')->with('user_id', $id);
    }

    public function store(Request $request, $user_id)
    {
        //Auth::User()->id
        $expiration = Carbon::parse($request->expiration)->format('Y-m-d');

        $extra_data = ['user_id' => $user_id, 'completed' => 0, 'expiration' => $expiration];

        $fields = $request->validate(([
            'title' => 'required',
            'category' =>  'required',
            'priority' => 'required',
            'expiration' => 'required'
        ]));

        Task::Create(array_merge($fields, $extra_data));

        return redirect()->route('home');
    }


    public function show($id)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('task.edit-form', ['task' => $task]);
    }


    public function update(Task $task)
    {

        $task->update(
            [
                'title' => request('title'),
                'category' => request('category'),
                'priority' => request('priority')
            ]
        );
        return redirect()->route('home');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks-ended');
    }

    public function endTask(Task $task)
    {
        $task->update(
            [
                'completed' => 1
            ]
        );
        return redirect()->route('home');
    }


    public function allTasks()
    {
        $tasks = Task::with('user')->get();
        return view('user.tasks', ['tasks' => $tasks]);
    }
}
