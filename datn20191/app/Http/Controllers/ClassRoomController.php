<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
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
    public function getClassRoomByDate(Request $request)
    {
        $date =$request->date;
        $room = $request->classroom_id;
        if($date){
            $result = DB::table('timetables')
            ->join('classes','classes.id','=','timetables.class_id')
            ->join('classrooms','classrooms.id','=','classes.classroom_id')
            ->where('date',$date)
            ->select(
                'timetables.class_id',
                'classrooms.name',
                'timetables.time',
                'classes.duration'
            )
            ->orderByRaw('timetables.time ASC')
            ->get();
            return response()->json(['code'=>1,'data'=>$result],200);
        }else if($room){
            $result = DB::table('timetables')
            ->join('classes','classes.id','=','timetables.class_id')
            ->join('classrooms','classrooms.id','=','classes.classroom_id')
            ->where('classes.classroom_id',$room)
            ->select(
                'timetables.class_id',
                'classrooms.name',
                'classes.name as class_name',
                'timetables.time',
                'timetables.date',
                'classes.duration'
            )
            ->orderByRaw('timetables.date ASC')
            ->get();
            return response()->json(['code'=>1,'data'=>$result],200);
        }
        
        
        // return $where_room;
        
    }

    public function addRoom(Request $request)
    {
        $name_room = $request->name;
        $errors = Validator::make($request->all(),
            [
                'name' =>'required|unique:classrooms',
            ],
            [   
                'name.unique'=>'Phòng học đã tồn tại!',
                'name.required'=>'Phòng học không được bỏ trống!'
            ]
        );
        if($errors->fails()){
            $arrayErrors = $errors->errors()->all();
            $message = [ "code"=>0,"message" => $arrayErrors];
            return response()->json($message,200);
        }else{
            DB::table('classrooms')->insert(
                ['name'=>$name_room]
            );
            return response()->json(['code'=>1,'message'=>'Thêm phòng học thành công!']);
        }
    }
}
