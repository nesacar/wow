<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::select('id', 'title', 'publish', 'created_at')->orderBy('title', 'ASC')->paginate(50);

        return response()->json([
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->title = request('title');
        $tag->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $tag->publish = request('publish')? true : false;
        $tag->save();

        return response()->json([
            'tag' => $tag
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);

        return response()->json([
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update(request()->all());
        $tag->slug = request('slug')? str_slug(request('slug')) : str_slug(request('title'));
        $tag->publish = request('publish')? true : false;
        $tag->update($request->except('slug'));

        return response()->json([
            'tag' => $tag
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        return response()->json([
            'message' => 'deleted'
        ]);
    }
}
