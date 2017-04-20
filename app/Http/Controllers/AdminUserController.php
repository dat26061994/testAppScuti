<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Hash;
use Auth;
class AdminUserController extends Controller {

	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function getList(){
		$admin = Admin::select('id','name','level','email','username')->get();
		return view('admin.list',compact('admin'));
	}

	public function getAdd(){
		return view('admin.add');
	}

	public function postAdd(AdminUserRequest $request){
		$user = new Admin();
		$user->username = $request->txtUser;
		$user->name = $request->txtName;
		$user->email = $request->txtEmail;
		$user->password = Hash::make($request->txtPass);
		$user->remember_token = $request->_token;
		$user->level = $request->rdoLevel;
		$user->save();
		return redirect()->route('admin.getList')->with(['flash_level'=>'success','flash_message'=>'Success!! Complete Add User']);
	}

	public function getDelete($id){
		$user_current_login = Auth::user()->id;
		$user = Admin::find($id);
		if (($id == 1) || ($user_current_login != 2) && ($user["level"] == 1)) {
			return redirect()->route('admin.getList')->with(['flash_level'=>'danger','flash_message'=>'Sorry!! You can not delete User']);
		}else{
			$user->delete($id);
			return redirect()->route('admin.getList')->with(['flash_level'=>'success','flash_message'=>'Success!! Complete Delete User']);
		}
	}

	public function getEdit($id){
		$admin = Admin::find($id);
		return view('admin.edit',compact('admin','id'));
	}

	public function postEdit($id,Request $request){
		$this->validate($request,
			[
				'txtName'	=>	'required',
				'txtRePass'	=>	'same:txtPass',
				'txtEmail'	=>	'required'
			],
			[
				'txtName.required'	=>	'Please enter your name',
				'txtRePass.same'	=>	'New Pass and RePass do not match',
				'txtEmail.required'	=>	'Email not null'
			]
			);

		$user = Admin::find($id);
		$user->name = $request->txtName;
		$user->password = Hash::make($request->txtPass);
		$user->email = $request->txtEmail;
		$user->level = $request->rdoLevel;
		$user ->save();
		return redirect()->route('admin.getList')->with(['flash_level'=>'success','flash_message'=>'Success!! Complete Update User']);
	}

}
