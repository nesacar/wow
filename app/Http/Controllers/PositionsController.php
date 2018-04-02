<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePositionRequest;
use App\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{

    public function index(){
        $horizontal = Position::where('group', 1)->get();
        $right = Position::where('group', 2)->get();
        $branding = Position::where('group', 3)->get();
        $active = Position::where('publish', 1)->pluck('id');

        return response()->json([
            'horizontal' => $horizontal,
            'right' => $right,
            'branding' => $branding,
            'active' => $active,
        ]);
    }

    public function store(CreatePositionRequest $request){
        $position = new Position();
        $position->group = request('group');
        $position->title = request('title');
        $position->desc = request('desc');
        $position->publish = request('publish')? true : false;
        $position->save();

        return response()->json([
            'position' => $position
        ]);
    }

    public function show($id){
        $position = Position::find($id);

        return response()->json([
            'position' => $position
        ]);
    }

    public function update(CreatePositionRequest $request, $id){
        $position = Position::find($id);
        $position->group = request('group');
        $position->title = request('title');
        $position->desc = request('desc');
        $position->publish = request('publish')? true : false;
        $position->update();

        return response()->json([
            'position' => $position
        ]);
    }

    public function updateAll(Request $request){
        $ids = request('ids');
        $positions = Position::all();
        foreach ($positions as $position){
            if(in_array($position->id, $ids)){
                $position->publish = 1;
            }else{
                $position->publish = 0;
            }
            $position->update();
        }

        return response()->json([
            'message' => 'done'
        ]);
    }

    public function destroy($id){
        Position::destroy($id);

        return response()->json([
            'message' => 'done'
        ]);
    }
}
