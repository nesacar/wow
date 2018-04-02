<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePositionRequest;
use App\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{

    public function index(){
        $horizontal = Position::where('group', 1)->get();

        return response()->json([
            'horizontal' => $horizontal
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
        if(count(request('positions'))>0){
            for ($i=0;$i<count(request('positions'));$i++){
                $old = Position::where('position', request('positions')[$i])->first();
                if(!empty($old)){
                    $old->publish = request('publish')[$i]? true : false;
                    $old->update();
                }else{
                    $new = new Position();
                    $new->position = request('positions')[$i];
                    $new->publish = request('publish')[$i];
                    $new->save();
                }
            }
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
