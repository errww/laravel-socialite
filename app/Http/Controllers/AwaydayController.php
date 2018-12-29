<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwaydayController extends Controller
{
	/**
	 * show index page
	 * @return view
	 */
    public function index()
    {
        //dd(Auth::id());
    	return view('contents.awaydays.awaydays');
    }

    /**
     * show detail of awayday
     * @param string $slug
     * @return view
     */
    public function show($slug)
    {
    	return view('contents.awaydays.DetailAwayday');
    }
}
