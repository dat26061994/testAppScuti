<?php namespace App\Http\Controllers;
use DB;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$product = DB::table('products')->select('id','name','price','image','description','status')->orderBy('id','DESC')->paginate(9);
		$product_latest = DB::table('products')->select('id','name','image','price')->orderBy('id','DESC')->skip(0)->take(3)->get();
		$product_seller = DB::table('products')->select('id','name','price','image')->orderBy('orders','DESC')->skip(0)->take(3)->get();
		return view('user.pages.home',compact('product','product_latest','product_seller'));
	}
	public function thisProduct($id){
		$product_detail = DB::table('products')->where('id',$id)->first();
		return view('user.pages.product',compact('product_detail'));
	}

}
