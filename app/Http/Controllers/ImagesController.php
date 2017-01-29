<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller {


	public function index()
	{

	    $images = Image::all();
	    foreach ($images as $item){
	        $item->article;
        }

	    return view('admin.images.index')->with('images', $images);
	}


}
