<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ClassRoomController extends Controller
{
    public function getNameRoom(Request $request)
    {
        // $class_id = $request->class_id;
        $name_room  = DB::table('classrooms')
        ->select('*')
        ->get();
        return response()->json(['code'=>1,'data'=>$name_room],200);
    }
}
