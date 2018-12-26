<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwaydayController extends Controller
{
	/**
	 * show index page
	 * @return view
	 */
    public function index()
    {
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
