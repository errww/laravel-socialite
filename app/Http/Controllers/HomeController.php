<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskEvent;
use Auth;
<<<<<<< HEAD
=======
use App\User;
use App\Http\Resources\User as UserResource;

>>>>>>> cd5701b09a6ac42aee0c5dc03f8c65a3fceb5551

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

<<<<<<< HEAD
=======
    public function totalUser()
    {
        return UserResource::collection(User::all());
    }

>>>>>>> cd5701b09a6ac42aee0c5dc03f8c65a3fceb5551
    public function event()
    {
        $message  = 'pesan..';
        event(new TaskEvent(Auth::user(),$message));
        //echo 'bisa kok';
    }
}
