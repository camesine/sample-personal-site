<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller {

	public function index($id){

		$user = User::find($id);
		

		return view('test.index', ['model' => $user]);
		
	}

}
