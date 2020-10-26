<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::User()->rol === 'Estudiante') {
            $tasks = Auth::User()->tasks;
            return view('home')->with('tasks', $tasks);
        }

        $users = User::All();
        return view('user.index')->with('users', $users);
    }
}
