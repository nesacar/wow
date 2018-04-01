<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTownRequest;
use App\Post;
use App\Town;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    public function index(){
        $towns = Town::select('id', 'name', 'publish', 'created_at')->orderBy('order', 'ASC')->paginate(50);
        return response()->json([
            'towns' => $towns,
        ]);
    }

    public function store(CreateTownRequest $request){
        $town = Town::create(request()->all());
        request('slug')? $town->slug = str_slug(request('slug')) : $town->slug = str_slug(request('name'));
        request('publish')? $town->publish = true : $town->publish = false;
        $town->map = request('map');
        $town->save();

        return response()->json([
            'town' => $town
        ]);
    }

    public function show($id){
        $town = Town::find($id);
        return response()->json([
            'town' => $town
        ]);
    }

    public function update(CreateTownRequest $request, $id){
        $town = Town::find($id);
        $oldSlug = $town->slug;
        $town->update(request()->all());
        request('slug')? $town->slug = str_slug(request('slug')) : $town->slug = str_slug(request('name'));
        request('publish')? $town->publish = true : $town->publish = false;
        $town->map = request('map');
        $town->update($request->except('slug'));

        if($oldSlug != request('slug')) Town::changeLinksByTown($town->id);

        return response()->json([
            'town' => $town
        ]);
    }

    public function destroy($id){
        $town = Town::find($id);
        $posts = Post::where('town_id', $town->id)->get();
        Town::destroy($town->id);

        if(count($posts)>0){
            foreach ($posts as $post){
                Post::fixLinks($post);
            }
        }

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function lists(){
        $towns = Town::where('publish', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Without town', 0);
        return response()->json([
            'towns' => $towns
        ]);
    }
}
