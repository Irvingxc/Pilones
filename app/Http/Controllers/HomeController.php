<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Home.inicio');
    }
    public function indexes()
    { 
        return view('Home.inicio');
    }

    public function index_pilones()
    { 
        return view('Home.inicio');
    }

    public function menu()
    { 
        return view('Home.PilonesHome');
    }
}
