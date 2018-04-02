<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function update(Request $request){
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
}
