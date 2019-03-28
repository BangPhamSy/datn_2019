<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function getRevenueByCourse(Request $request)
    {
        $course_id = $request->course_id;
        // $get_list_course = DB::table('courses')
        $get_class_of_course = DB::table('courses')
        ->join('classes','classes.course_id','=','courses.id')
        ->where('classes.status',1)
        ->where('course_id',$course_id)
        ->select(
            'courses.*','classes.name as class_name','classes.class_size',
            'classes.start_date'
        )
        ->get();
        // return $get_class_of_course;
        $arr= json_decode(json_encode($get_class_of_course), True);
        $total_revenue=0;
        for($i=0;$i<count($arr);$i++)
        {
            $total_revenue+= $arr[$i]['fee']*$arr[$i]['class_size'];
        }
        return $total_revenue;
    }

    public function getRevenueByClass(Request $request)
    {
        $course_id = $request->course_id;
        $get_class_of_course = DB::table('courses')
        ->join('classes','classes.course_id','=','courses.id')
        ->where('classes.status',1)
        ->where('course_id',$course_id)
        ->select(
            'courses.*','classes.name as class_name','classes.class_size',
            'classes.start_date'
        )
        ->get();
        return response()->json(['code'=>1,'data'=>$get_class_of_course],200);
    }

    public function getTotalRevenue(Request $request)
    {
        $get_class_of_course = DB::table('courses')
        ->join('classes','classes.course_id','=','courses.id')
        ->where('classes.status',1)
        ->select(
            'courses.*','classes.name as class_name','classes.class_size',
            'classes.start_date'
        )
        ->get();
        $arr= json_decode(json_encode($get_class_of_course), True);
        $total_revenue=0;
        for($i=0;$i<count($arr);$i++)
        {
            $total_revenue+= $arr[$i]['fee']*$arr[$i]['class_size'];
        }
        return $total_revenue;
    }
}
