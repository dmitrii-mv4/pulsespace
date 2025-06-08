<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wishes = Wish::with('user')
            ->latest() 
            ->take(12) 
            ->get();

        return view('home', compact('wishes'));
    }
}
