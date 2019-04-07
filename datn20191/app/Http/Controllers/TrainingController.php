<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getResultTrainingOfCourses(Request $request)
    {
        $list_result_courses = DB::table('courses')
        ->join('classes','classes.course_id','=','courses.id')
        ->join('exams','exams.class_id','=','classes.id')
        ->join('point_exams','point_exams.examination_id','=','exams.id')
        ->select(
            'courses.name as course_name',
            'courses.code as course_code',
            'courses.id as course_id',
            // 'examination_id',
            DB::raw('count(*) as point_pass')

        )
        ->where('point','>=',4)
        ->groupBy('course_id')
        ->get();
        
        $list_result_courses = json_decode(json_encode($list_result_courses),True);
        for($i=0;$i<count($list_result_courses);$i++){
            $course_id = $list_result_courses[$i]['course_id'];
            $count_total_student = DB::table('courses')
            ->join('classes','classes.course_id','=','courses.id')
            ->join('exams','exams.class_id','=','classes.id')
            ->join('point_exams','point_exams.examination_id','=','exams.id')
            ->select(
                DB::raw('count(*) as point_pass')
            )
            ->where('courses.id',$course_id)
            ->count();
            $list_result_courses[$i]['total_student']=$count_total_student;
        }
        return response()->json(['code'=>1,'data'=>$list_result_courses],200);
    }

    public function getResultTrainingOfClasses(Request $request){
        $course_id = $request->course_id;
        $list_result_class = DB::table('classes')
        ->join('exams','exams.class_id','=','classes.id')
        ->join('point_exams','point_exams.examination_id','=','exams.id')
        ->where('classes.course_id',$course_id)
        ->select(
            'classes.name as class_name',
            'classes.class_code',
            'examination_id',
            DB::raw('count(*) as point_pass')

        )
        ->where('point','>=',4)
        ->groupBy('point_exams.examination_id')
        ->get();

        $list_result_class = json_decode(json_encode($list_result_class),True);
        for($i=0;$i<count($list_result_class);$i++){
            $examination_id = $list_result_class[$i]['examination_id'];
            $count_total_student = DB::table('point_exams')
            ->where('examination_id',$examination_id)
            ->count();
            $list_result_class[$i]['total_student']=$count_total_student;
        }

        return response()->json(['code'=>1,'data'=>$list_result_class],200);
    }
}
