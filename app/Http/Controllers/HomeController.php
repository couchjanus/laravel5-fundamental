<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Creativeorange\Gravatar\Facades\Gravatar;

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
        // $gravatar = Gravatar::get('couchjanus@gmai.com');
        $gravatar = Gravatar::fallback('https://www.gravatar.com/avatar/00000000000000000000000000000000')->get('email@example.com');

        return view('profiles.home')->withGravatar($gravatar);
    }
}
