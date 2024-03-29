<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Laracasts\Flash\Flash;

class TagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $tags = Tag::search($request->name)->orderBy('id','DESC')->paginate(5);

		return view('admin.tags.index')->with('tags', $tags);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
        $tag = new Tag($request->all());
        $tag->save();

        Flash::success("El tag ". $tag->name . "ha sido creado con exito!");
        return redirect()->route('admin.tags.index');
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
		$tag = Tag::find($id);
		return view('admin.tags.edit')->with('tag',$tag);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$tag = Tag::find($id);
		$tag->fill($request->all());
		$tag->save();
		Flash::warning("El tag ". $tag->name . " ha sido editado");

		return redirect()->route('admin.tags.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = Tag::find($id);
		$tag->delete();

		Flash::error("El tag" . $tag->name . " se ha eliminado con exito!");
		return redirect()->route('admin.tags.index');
	}

}
