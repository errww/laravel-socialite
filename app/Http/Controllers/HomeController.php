<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskEvent;
use Auth;
use App\User;
use App\Http\Resources\User as UserResource;


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

    public function totalUser()
    {
        return UserResource::collection(User::all());
    }

    public function event()
    {
        $message  = 'pesan..';
        event(new TaskEvent(Auth::user(),$message));
        //echo 'bisa kok';
    }
}
