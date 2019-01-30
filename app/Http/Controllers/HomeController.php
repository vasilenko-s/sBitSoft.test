<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Route '/home'
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = strtolower(explode('\\', Auth::user()->userable_type)[1]);

        //dashboard view for releavant account
        $home = 'home.'. $profile;

        //if profile exists, go to relative view
        $id =  Auth::user()->userable_id;

        if ($id){
            return view($home);
        } else return redirect()->route('profile');

    }
}
