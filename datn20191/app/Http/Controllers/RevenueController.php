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
        $class_id = $request->class_id;
        $get_class_of_course = DB::table('courses')
        ->join('classes','classes.course_id','=','courses.id')
        ->where('classes.status',1)
        ->where('course_id',$course_id)
        ->select(
            'courses.*','classes.name as class_name','classes.class_size',
            'classes.start_date','classes.id as class_id'
        )
        ->get();
        $list_class = json_decode(json_encode($get_class_of_course),True);
        for($i=0;$i<count($list_class);$i++){
            $class_id = $list_class[$i]['class_id'];
            $quantity_students = DB::table('student_classes')
            ->where('class_id',$class_id)
            ->select('student_classes.student_id')
            ->count();
            $list_class[$i]['students'] = $quantity_students;
            $list_class[$i]['total_revenue_class']= $quantity_students*$list_class[$i]['fee'];
        }
        // return $list_class;
        return response()->json(['code'=>1,'data'=>$list_class],200);
        // return response()->json(['code'=>1,'data'=>$get_class_of_course],200);
    }

    public function getTotalRevenue(Request $request)
    {
        
        $list = DB::table('courses')->get();
        $list_course = json_decode(json_encode($list), True);
        for($i=0;$i<count($list_course);$i++){
            $course_id = $list_course[$i]['id'];
            $quantity_students = DB::table('student_classes')
            ->join('classes','classes.id','=','student_classes.class_id')
            ->join('courses','courses.id','=','classes.course_id')
            ->where('course_id',$course_id)
            ->where('classes.status',1)
            ->select('student_classes.student_id as student_id','classes.name')
            ->count();
            $list_course[$i]['students'] = $quantity_students;
            $list_course[$i]['total_revenue']= $quantity_students*$list_course[$i]['fee'];
        }
        return response()->json(['code'=>1,'data'=>$list_course],200);
    }
}
