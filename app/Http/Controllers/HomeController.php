<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::check()){
			if(Auth::user()->hasRole('admin')){

				return view('users.index', [
					'active_menu' => 'users',
				]);
			}
			if(Auth::user()->hasRole('user')){

				return redirect('post');
			}
			
		}else{
            
			return view('auth.login') ;
		}
    }
}
