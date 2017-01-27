<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.articles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	    $tags = Tag::orderBy('name','ASC')->lists('name', 'id');
	    $categories = Category::orderBy('name','ASC')->lists('name', 'id');
	    
		return view('admin.articles.create')->with("categories", $categories)-> with('tags',$tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{

		//Manipulacion de imagenes

       if($request->file('image')){

            $file = $request->file('image');
            $name = 'blog_' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/articles/';
            $file->move($path,$name);

        }

        $article = new Article($request->all());
        $article->user_id = Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);

        $image->save();

        Flash::success('Se ha creado el articulo'  . $article->title . ' de forma satisfactoria!');
        return redirect()->route('admin.articles.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
