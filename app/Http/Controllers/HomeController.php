<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $drafts = DB::table('tests')
        ->where('status', 'draft')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $registereds = DB::table('tests')
        ->where('status', 'registered')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        return view('includes.dashboard')
        ->with(['drafts' => $drafts])
        ->with(['registereds' => $registereds]);
    }
}
