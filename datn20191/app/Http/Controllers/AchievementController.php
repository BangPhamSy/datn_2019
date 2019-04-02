<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AchievementController extends Controller
{
    public function getAchievementStudent(Request $request)
    {
        $student_id = $request->student_id;
        $class_student = DB::table('classes')
        ->join('student_classes','student_classes.class_id','=','classes.id')
        ->where('student_classes.student_id',$student_id)
        ->select(
            'classes.name as class_name',
            'classes.class_code',
            'classes.status as class_status',
            'classes.id as class_id'
        )
        ->get();
        $class_student= json_decode(json_encode($class_student),True);
        // $class_id = $request->class_id;
        // return $point_class;
        for($i=0;$i<count($class_student);$i++){
            $class_id = $class_student[$i]['class_id'];
            $count_days_absent = DB::table('roll_calls')
            ->join('timetables','timetables.id','=','roll_calls.timetable_id')
            ->join('classes','classes.id','=','timetables.class_id')
            ->where('roll_calls.status',3)
            ->where('student_id',$student_id)
            ->where('timetables.class_id',$class_id)
            ->count();
            $point_class = DB::table('point_exams')
            ->join('exams','exams.id','=','point_exams.examination_id')
            ->join('classes','classes.id','=','exams.class_id')
            ->where('student_id',$student_id)
            ->where('exams.class_id',$class_id)
            ->value('point');
            $class_student[$i]['days_absent']=$count_days_absent;
            $class_student[$i]['point_class']=$point_class;
            if($point_class==null){
                $class_student[$i]['achieve']=2;
            }
            else if($point_class<4||$count_days_absent>4){
                $class_student[$i]['achieve']=0;
            }else{
                $class_student[$i]['achieve']=1;
            }
            
        };
        return response()->json(['code'=>1,'data'=>$class_student],200);
    }
}
