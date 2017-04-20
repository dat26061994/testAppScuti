<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest:admin');
	}

    public function showLoginForm(){
    	return view('admin.login');
    }

    public function login(Request $request){
    	// Validate Form
    	$this->validate($request,[
    			'username'	=>	'required|max:100',
    			'password'	=>	'required|min:6'
    		]);
    	// Attempt to log the user
    	if (Auth::guard('admin')->attempt(['username'	=>	$request->username,'password'	=>	$request->password])) {
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('username'));
    	
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
    
}
