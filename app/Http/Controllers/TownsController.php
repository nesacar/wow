<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTownRequest;
use App\Town;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    public function index(){
        $towns = Town::select('id', 'name', 'publish', 'created_at')->orderBy('created_at', 'DESC')->paginate(50);
        return response()->json([
            'towns' => $towns,
        ]);
    }

    public function store(CreateTownRequest $request){
        $town = Town::create(request()->all());
        request('slug')? $town->slug = str_slug(request('slug')) : $town->slug = str_slug(request('title'));
        request('publish')? $town->publish = true : $town->publish = false;
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
}
