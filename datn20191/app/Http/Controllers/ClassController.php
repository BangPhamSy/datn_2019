<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\StudentClass;
use App\TimeTable;
use Validator;
use App\Holiday;
use App\Course;
use DB;
use DateTime;

class ClassController extends Controller
{
    /**
     * hiển thị danh sách lớp đang tuyển sinh.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function getListClass(Request $request)
    {
       
        $listClass = DB::table('classes')
                    ->join('courses','courses.id','=','classes.course_id')
                    ->join('teachers','teachers.id','=','classes.teacher_id')
                    ->join('classrooms','classrooms.id','=','classes.classroom_id')
                    ->select(
                        'classes.*',
                        'classrooms.name as room_name',
                        'teachers.name as teacher_name',
                        'courses.name as course_name'
                    )
                    ->get();
        $listClass = json_decode(json_encode($listClass),True);
        
        for($i=0;$i<count($listClass);$i++){
             $end_date = DB::table('timetables')
            ->join('classes','classes.id','=','timetables.class_id')
            ->where('classes.id',$listClass[$i]['id'])
            ->value(DB::raw('max(timetables.date) as end_date')); 
            $start_date = date("d-m-Y", strtotime($listClass[$i]['start_date']));

            $end_date = date("d-m-Y", strtotime($end_date));

            $time_end = date(' H:i:s',strtotime('+'.$listClass[$i]['duration'].'hour',strtotime($listClass[$i]['time_start'])));
            $listClass[$i]['time_end']=$time_end;
            $listClass[$i]['end_date']=$end_date;
            $listClass[$i]['start_date']=$start_date;
        }
        return response()->json(['code'=>1,'data'=>$listClass],200);
        // $classesOfList= Classes::getListClass();

        // if($classesOfList->count()==0){
        //     return response()->json(['code'=>0,'message'=>'Không tìm thấy lớp!'],200);
        // }
        // else{
        //     return response()->json(['code'=>1,'data'=>$classesOfList],200);
        // }

    }
    public function getListRegistrationClass(Request $request)
    {
        $student_id = $request->student_id;
        $listRegistrationClass = DB::table('classes')
                                ->join('teachers','teachers.id','=','classes.teacher_id')
                                ->join('classrooms','classrooms.id','=','classes.classroom_id')
                                ->where('status',0)
                                ->whereNotIn('classes.id',DB::table('student_classes')->select('class_id')
                                ->from('student_classes')
                                ->where('student_classes.student_id',$student_id)
                                )
                                ->select(
                                    'classes.*',
                                    'teachers.name as teacher_name',
                                    'classrooms.name as room_name'
                                )
                                ->get();
        // $quatityStudentInClass = DB::table('student_classes')
        //                         ->select(array('student_classes.class_id',DB::raw('COUNT(student_classes.student_id)')))
        //                         ->groupBy('class_id')
        //                         ->get();
                                // return $quatityStudentInClass;
        // return count($quatityStudentInClass);
        return response()->json(['code'=>1,'data'=>$listRegistrationClass],200);
    }

    public function getListClassOfStudent(Request $request)
    {
        $listClassOfStudent = DB::table('classes')
                                ->join('student_classes','student_classes.class_id','=','classes.id')
                                ->where('status',0)
                                ->where('student_id',$request->student_id)
                                ->select('classes.*')
                                ->get();
        return response()->json(['code'=>1,'data'=>$listClassOfStudent],200);
    }

    public function getTimeTableOfStudent(Request $request)
    {
        $student_id =$request->student_id;
        $tkb_student = DB::table('student_classes')
        ->join('classes','classes.id','=','student_classes.class_id')
        ->join('classrooms','classrooms.id','=','classes.classroom_id')
        ->join('teachers','teachers.id','=','classes.teacher_id')
        ->where('student_classes.student_id',$student_id)
        ->select(
            'classes.schedule as class_schedule',
            'classes.time_start as class_time_start',
            'classes.start_date as class_start_date',
            'classes.name as class_name',
            'classes.class_code as class_code',
            'teachers.name as teacher_name',
            'classes.duration as class_duration',
            'classrooms.name as room_name'
        )
        ->orderByRaw('classes.start_date ASC')
        ->get();   
        return response()->json(['code'=>1,'data'=>$tkb_student],200);
    }
    /**
     * Xóa lớp học.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteClass(Request $request){
        $idClass = $request->input('id');
        $findIdClass = Classes::getInfoClass($idClass);
        $checkClass = Classes::checkQtyStudentsOfClass($idClass);
        
        if($findIdClass==""){
            $message = [ "code"=>0,"message"=>"Không tìm thấy khóa học cần xóa!"];
            return response()->json($message,200);
        }else if($checkClass==0){
            Classes::deleteClass($idClass);
            Classes::deleteTimeTableOfClass($idClass);
            return response()->json(['code'=>1,'message'=>'Xóa lớp thành công!']);
        }
        else{
            $message = [ "code"=>0,"message"=>"Lớp này đang hoạt động không thể xóa! "];
            return response()->json($message,200);
        }
            
    }
    /**
     * Tạo mới lớp học.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createClass(Request $request)
    {
        $errors = Validator::make($request->all(),
            [
                        'class_code'=>'required|unique:classes',
                        'name'      =>'required',
                        'teacher_id'=>'required|numeric',
                        // 'time_start'=>'required',
                        'duration'  =>'required|numeric',
                        'class_size'=>'required|numeric',
                        'course_id' =>'required|numeric'
            ],
            [
                        'class_code.required'  =>"Mã lớp học không được trống!",
                        'class_code.unique'    =>"Mã lớp học đã tồn tại!",
                        'name.required'        =>"Tên lớp học không được trống! ",
                        'teacher_id.required'  =>"Bạn chưa chọn giảng viên!",
                        // 'time_start.required'  =>"Thời gian bắt đầu không được trống!",
                        // 'time_start.date'      =>"Thời gian bắt đầu không đúng định dạng!",
                        'duration.required'    =>"Thời lượng không được trống!",
                        'duration.numeric'     =>"Thời lượng phải là kiểu số ",
                        'class_size.required'  =>"Sĩ số không được trống!",
                        'class_size.numeric'   =>"Sĩ số phải là kiểu số!",
                        'course_id.required'   =>"Bạn chưa chọn khóa học!"
            ]
        );
        $classroom_id = $request->classroom_id;
        $result = DB::table('timetables')
                ->join('classes','classes.id','=','timetables.class_id')
                ->join('classrooms','classrooms.id','=','classes.classroom_id')
                ->where('classroom_id',$classroom_id)
                ->select('classes.start_date',DB::raw('max(timetables.date) as end_date'))
                ->groupBy('classes.id')
                ->get();
        $end_date = json_decode(json_encode( $result), True);
        // return $end_date;
        $get_gio_hoc = DB::table('timetables')
            ->join('classes', 'classes.id', '=', 'timetables.class_id')
            ->join('classrooms','classrooms.id','=','classes.classroom_id')
            ->where('classroom_id',$classroom_id)
            ->select('timetables.time', 'timetables.week_days','classes.duration')
            ->distinct('timetables.time', 'timetables.week_days','classes.duration')
            ->get();

        $gio_hoc = json_decode(json_encode($get_gio_hoc),True);
        // return $gio_hoc;
        if($errors->fails() || $request->start_date<date('Y-m-d H:i:s')){
            $arrayErrors = $errors->errors()->all();
            $message = [ "code"=>0,"message" =>$arrayErrors];
            return response()->json($message,200);
        }else{
            $start_date_new = $request->start_date;
            $start_date_class_new = $request->start_date;
            $time_start = $request->start_date;
            $duration = $request->duration;
            $time_start_class_new = $request->time_start;
            $holiday = [];
            $items = Holiday::getListHoliday();
            foreach ($items as $holi) {
                $holiday[] = $holi->holiday;
            };
            $qtyLesson=round((Classes::getDurationOfCourse($request->course_id))
                        /($request->duration));
            $schedule = explode(',',$request->schedule);
            $start=1;
            for($j=0;$j<count($holiday);$j++){
                if($start_date_class_new == $holiday[$j]){
                    $start_date_class_new = date('Y-m-d', strtotime('+1 day', strtotime($start_date_class_new)));
                        return response()->json(['code'=>0,'message'=>"Ngày bắt đầu trùng ngày lễ"]);

                }
            };
            while($start<=$qtyLesson)
            {
                for($i=0;$i<count($schedule);$i++)
                {
                    if(date('w', strtotime($start_date_class_new)) == $schedule[$i]){
                        $date[$start]=$start_date_class_new;
                          $start ++;
                    }
                }
                $nextdate=date('Y-m-d', strtotime('+1 day', strtotime($start_date_class_new)));
                for($j=0;$j<count($holiday);$j++){
                    if($nextdate == $holiday[$j]){
                        $nextdate=date('Y-m-d', strtotime('+2 day', strtotime($start_date_class_new)));
                    }
                    $start_date_class_new = $nextdate;
                }
            }
            $end_date_class_new = end($date);
            // return $end_date_class_new;
            // return $start_date_new;
            // return $end_date;
            // return $end_date_class_new ;
            // return $schedule;
            $fail = 0;
        for($i=0;$i<count($end_date);$i++)
        {
            if( $start_date_new>$end_date[$i]['end_date']||$end_date[$i]['start_date']> $end_date_class_new){
                
            }else{
                for($i=0;$i<count($gio_hoc);$i++){
                    for($j=0;$j<count($schedule);$j++){
                        if($gio_hoc[$i]['week_days']!=$schedule[$j]){
                        }else{
                            $time_end1 = date(' H:i:s',strtotime('+'.$gio_hoc[$i]['duration'].'hour',strtotime($gio_hoc[$i]['time'])));
                            $time_end2 = date('H:i:s',strtotime('+'.$duration.'hour',strtotime($time_start_class_new)));
                            $time_start1 = $gio_hoc[$i]['time'];
                            $time_start2 = $time_start_class_new ;
                            if(strtotime($time_end2)<strtotime($time_start1) || strtotime($time_start2) >strtotime($time_end1)){    
                            }
                            else{
                                $class_duplicate = DB::table('timetables')
                                ->join('classes','classes.id','=','timetables.class_id')
                                ->join('classrooms','classrooms.id','=','classes.classroom_id')
                                ->where('classroom_id',$classroom_id)
                                ->where('time_start',$time_start1)
                                ->value('classes.name as class_name');
                                $fail++;
                            }
                        }
                    }
                }
            }
        }
        if($fail!=0){
            return response()->json(['code' => 0, 'message' => 'Phòng học đã có lớp "'.$class_duplicate.'" vào khoảng thời gian đó']);
        }
        else{
            // return response()->json(['code'=>1,'message'=>"Tao lop di"],200);
            Classes::createClass($request);
            $dataTimeTable=array();
            for($i=1;$i<=$qtyLesson;$i++){
               $dataTimeTable['week_days'] = date('w', strtotime($date[$i]));
               $dataTimeTable['date'] = $date[$i];
               $dataTimeTable['time'] = $request->time_start;
               Classes::createTimeTable($dataTimeTable,$request->class_code);
              $dataTimeTable=array();
            }
            return response()->json(['code'=>1,'message'=>TimeTable::all()]);
        }
            

        }
    }
    /**
     * Chỉnh sửa lớp học.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editClass(Request $request)
    {
        $idClass= $request->id;
        $errors = Validator::make($request->all(),
           [
                        'class_code'=>'required|unique:classes,class_code,'.$idClass,
                        'name'      =>'required',
                        'class_size'=>'required|numeric',
            ],
            [
                        'class_code.required'  =>"Mã lớp học không được trống!",
                        'class_code.unique'    =>"Mã lớp học đã tồn tại!",
                        'name.required'        =>"Tên lớp học không được trống! ",
                        'class_size.required'  =>"Sĩ số không được trống!",
                        'class_size.numeric'   =>"Sĩ số phải là kiểu số!",
            ]
        );
        if($errors->fails()){
            $arrayErrors = $errors->errors()->all();
            return response()->json([ "code"=>0,"message" =>$arrayErrors],200);
        }else{
            Classes::editClass($request,$idClass);
            return response()->json(['code'=>1,'message'=>'Chỉnh lớp học thành công!']);
        }
    }
    /**
     * Lấy thông tin lớp học cần sửa
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getEditClass(Request $request){
        $idClass = $request->input('id');
        $infoClassNeedEdit = Classes::getEditClass($idClass);
        return $infoClassNeedEdit;

    }
    /**
     * Lấy danh sách học sinh của lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListStudentOfClass(Request $request)
    {
        $class_id = $request->input('class_id');
        $studentsOfClass= Classes::getStudentOfClass($class_id);

        if($studentsOfClass->count()==0){
            return response()->json(['code'=>0,'message'=>'Lớp không có học sinh nào!'],200);
        }
        else{
            return response()->json(['code'=>1,'data'=>$studentsOfClass],200);
        }
    }
    /**
     * Xóa học sinh của lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteStudentOfClass(Request $request)
    {
        $idStudent = $request->input('id');
        $findIdStudentInClass = Classes::findStudentOfClass($idStudent);

        if($findIdStudentInClass!=0){
            Classes::deleteStudentOfClass($idStudent);
            $message = [ "code"=>1,"message"=>"Xóa học sinh trong lớp thành công! "];
            return response()->json($message,200);
        }else{
            $message = [ "code"=>0,"message"=>"Không tìm thấy học sinh cần xóa!"];
            return response()->json($message,200);
        }
    }
     /**
     * Xóa học sinh của lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteClassRegisted(Request $request)
    {
        $class_id = $request->class_id;
        $student_id = $request->student_id;
        $result = Classes::deleteClassRegisted($student_id,$class_id);
        $message = [ "code"=>1,"message"=>"Xóa lớp thành công! "];
        return response()->json($message,200);
    }
    /**
     * Lấy tên của giáo viên.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNameTeacher(Request $request){
        if($request->teacher_id){
            $name_teacher = Classes::getNameTeacher($request->teacher_id);
        }
        else{
            $name_teacher =Classes::getNameTeacher(null);
            
        }
        return response()->json(['code'=>1,'data'=> $name_teacher],200);
    }
    /**
     * Lấy tên các khóa học.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNameCourse(){
        $nameCourse =Classes::getNameCourse();
        return response()->json(['code'=>1,'data'=> $nameCourse],200);
    }

    /**
     * Danh sách lớp đang tuyển sinh.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListClassByStatus(Request $request){
        $class = Classes::classByStatus();
        return response()->json(['code' => 1, 'message' => 'ket qua','data' => $class]);
    }
    public function getListClassByClassRoom(Request $request)
    {
        $classroom_id = $request->classroom_id;
        $result = DB::table('timetables')
                ->join('classes','classes.id','=','timetables.class_id')
                ->join('classrooms','classrooms.id','=','classes.classroom_id')
                ->where('classroom_id',$classroom_id)
                ->select('classes.start_date',DB::raw('max(timetables.date) as end_date'))
                ->groupBy('classes.start_date')->get();
                // ->select('timetables.*','classrooms.name as room_name')
                // ->get();
        $end_date = json_decode(json_encode( $result), True);
        $get_gio_hoc = DB::table('timetables')
            ->join('classes', 'classes.id', '=', 'timetables.class_id')
            ->join('classrooms','classrooms.id','=','classes.classroom_id')
            ->where('classroom_id',$classroom_id)
            ->select('timetables.time', 'timetables.week_days','classes.duration')
            ->distinct('timetables.time', 'timetables.week_days','classes.duration')
            ->get();
        $gio_hoc = json_decode(json_encode($get_gio_hoc),True);
        // return $gio_hoc[0]['week_days'];
        $items = Holiday::getListHoliday();
        foreach ($items as $holi) {
            $holiday[] = $holi->holiday;
        };
        // $qtyLesson=round((Classes::getDurationOfCourse($request->class_code))
        //             /($request->duration));
        $qtyLesson =3;
        // $schedule = explode(',',$request->schedule);
        $schedule = [1,2,];
        $timestart = '2019-01-29';
        $start=1;
        while($start<=$qtyLesson)
        {
            for($i=0;$i<count($schedule);$i++)
            {
                if(date('w', strtotime($timestart)) == $schedule[$i]){
                    $date[$start]=$timestart;
                      $start ++;
                }
               
                
            }
            $nextdate=date('Y-m-d', strtotime('+1 day', strtotime($timestart)));
            for($j=0;$j<count($holiday);$j++){
                if($nextdate == $holiday[$j]){
                    $nextdate=date('Y-m-d', strtotime('+2 day', strtotime($timestart)));
                }
                $timestart = $nextdate;
            }
        }
        $end_date_class_new = end($date);
        //Check room
        $start_date_class_new = $timestart;
        $time_start_class_new = '12:00:00';
        $schedule = [1,];
        $fail = 0;
        // $true = 0;
        for($i=0;$i<count($end_date);$i++)
        {
            if( $start_date_class_new>$end_date[$i]['end_date']||$end_date[$i]['start_date']> $end_date_class_new){
                // $true++;
            }else{
                for($i=0;$i<count($gio_hoc);$i++){
                    for($j=0;$j<count($schedule);$j++){
                        if($gio_hoc[$i]['week_days']!=$schedule[$j]){
                        }else{
                            $time_end1 = date(' H:i:s',strtotime('+'.$gio_hoc[$i]['duration'].'hour',strtotime($gio_hoc[$i]['time'])));
                            $time_end2 = date('H:i:s',strtotime('+'.$schedule[$j].'hour',strtotime($time_start_class_new)));
                            $time_start1 = $gio_hoc[$i]['time'];
                            $time_start2 = $time_start_class_new ;
                            if(strtotime($time_end2)<strtotime($time_start1) || strtotime($time_start2) >strtotime($time_end1)){    
                            }
                            else{
                                
                                $fail++;
                            }
                        }
                    }
                }
            }
        }
        if($fail!=0){
            return response()->json(['code' => 0, 'message' => 'Phòng học đã có lớp vào khoảng thời gian đó,vui lòng chọn phòng khác!']);
        }
        else{
            return "Them lop di";
        }
        // return $fail;
        // return $end_date;
    }
    /**
     * Thêm học sinh vào lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStudentToClass(Request $request){
        $student_id = request('student_id');
        $class_id = request('class_id');
        $data = array(
            'student_id' => $student_id,
            'class_id' => $class_id,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        );

        $tkb_student = DB::table('students')->join('student_classes','student_classes.student_id','=','students.id')
            ->join('classes','classes.id','=','student_classes.class_id')
            ->join('timetables','timetables.class_id','=','classes.id')
            ->select('classes.start_date',DB::raw('max(timetables.date) as end_date'))
            ->where('students.id',$student_id)
            ->groupBy('classes.start_date')->get();

        $end_date = json_decode(json_encode($tkb_student), True);

        $lop_moi = DB::table('timetables')->join('classes','classes.id','=','timetables.class_id')
            ->select('classes.start_date',DB::raw('max(timetables.date) as end_date'))
            ->where('classes.id',$class_id)->groupBy('classes.start_date')->get();

        $end_date_lop_moi = json_decode(json_encode($lop_moi), True);

        $get = DB::table('students')
            ->join("student_classes", 'students.id', '=' , 'student_classes.student_id')
            ->join('classes', 'classes.id', '=', 'student_classes.class_id')
            ->join('timetables', 'timetables.class_id', '=', 'classes.id')
            ->where('students.id',$student_id)
            ->select('timetables.time', 'timetables.week_days','classes.duration')
            ->distinct('timetables.time', 'timetables.week_days','classes.duration')
            ->get();

        $gio_hoc = json_decode(json_encode($get), True);

        $themvao = DB::table('timetables')->join('classes','classes.id','=','timetables.class_id')
            ->select('timetables.time','timetables.week_days','classes.duration')
            ->where('class_id',$class_id)
            ->distinct('timetables.time', 'timetables.week_days','classes.duration')
            ->get();
        $time_lop_moi = json_decode(json_encode($themvao), True);
        $course_id = DB::table('classes')
                    ->where('classes.id',$class_id)
                    ->value('course_id');
        // return $course_id;
        //Check trùng khóa học
        $check_course = DB::table('classes')
        ->join('courses','courses.id','=','classes.course_id')
        ->join('student_classes','student_classes.class_id','=','classes.id')
        ->where('student_id',$student_id)
        ->select('course_id','courses.name','classes.name as class_name')
        ->get();
        $check_course = json_decode(json_encode($check_course), True);
        for($i=0;$i<count($check_course);$i++){
            if($check_course[$i]['course_id']==$course_id){
                return response()->json(['code' => 0, 
                'message' => 'Học viên đã tham gia lớp "'.$check_course[$i]['class_name']. ' "của khóa học " '.$check_course[$i]['name'].'" rồi!']);
            }
        }
        // Hết check trùng khóa học
        $fail =0;
        for($i=0;$i<count($end_date);$i++){
            if($end_date_lop_moi[0]['start_date']>$end_date[$i]['end_date']||$end_date[$i]['start_date']>$end_date_lop_moi[0]['end_date']){
            }else{
                for($i=0;$i<count($gio_hoc);$i++){
                    for($j=0;$j<count($time_lop_moi);$j++){
                        if($gio_hoc[$i]['week_days']==$time_lop_moi[$j]['week_days']){
                          $time_end1 = date(' H:i:s',strtotime('+'.$gio_hoc[$i]['duration'].'hour',strtotime($gio_hoc[$i]['time'])));
                          $time_end2 = date(' H:i:s',strtotime('+'.$time_lop_moi[$j]['duration'].'hour',strtotime($time_lop_moi[$j]['time'])));
                          $time_start1 = $gio_hoc[$i]['time'];
                          $time_start2 = $time_lop_moi[$j]['time'];
                          if(strtotime($time_end2)<strtotime($time_start1) || strtotime($time_start2) >strtotime($time_end1)){
                          }else{
                            $class_duplicate = DB::table('timetables')
                            ->join('classes','classes.id','=','timetables.class_id')
                            ->join('classrooms','classrooms.id','=','classes.classroom_id')
                            ->where('time_start',$time_start1)
                            ->value('classes.name as class_name');
                              $fail++;
                          }
                        }
                    }
                }
            }
        }

        if ($fail != 0) {
            return response()->json(['code' => 0, 'message' => 'Lịch học bị trùng với lớp " '.$class_duplicate.'" sinh viên đã đăng kí']);
        }else{
            // $add_student = Classes::addStudentToClass1($data);
            return response()->json(['code' => 1, 'message' => 'Thêm thành công!']);
        }
    }

    /**
     * Cập nhật trạng thái lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateClassStatus(Request $request){
        $id = request('id');
        $data = array(
            'status' =>request('status'),
        );
        $class = Classes::updateClassStatus1($data,$id);
        return response()->json(['code' => 1, 'message' => 'cap nhat thanh cong']);
    }

    /**
     * Danh sách học sinh không có trong lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListStudentNotInClass(Request $request)
    {
        $class_id= $request->input('class_id');
        $studentsNotInClass = DB::table('students')->whereNotIn('id', DB::table('student_classes')->select('student_id')->from('student_classes')->where('class_id',$class_id)
           ) ->get();
        return response()->json(['code' => 1, 'data' => $studentsNotInClass]);
    }

    /**
     * Danh sách học sinh không có trong lớp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autoUpdateStatus(Request $request)
    {
        $date = date('Y-m-d');
        $end = DB::table('timetables')->join('classes','classes.id','=','timetables.class_id')
        ->selectRaw("MAX(timetables.date) AS end_date, MIN(timetables.date) AS start_date, timetables.class_id")
        ->groupBy('class_id')->get();
        $a = json_decode(json_encode($end), True);
        // return $a;
        for ($i=0; $i < count($a); $i++) 
            {
        //     if ($a[$i]['status'] != 3) {
                if (strtotime($date) > strtotime($a[$i]['end_date'])) {
                    $status = 2;
                }elseif(strtotime($date) < strtotime($a[$i]['start_date'])){
                    $status = 0;
                }else{
                    $status = 1;
                }
                // echo $status .'--';
                $s = DB::table('classes')->where('id',$a[$i]['class_id'])->update(['status' =>$status]);
            // }
        }

        return response()->json(['code' => 1, 'message' => 'update thanh cong']);
    }
    /**
     * Danh sách lớp đang giảng dạy của giáo viên.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getClassListOfTeacher(Request $request)
    {
        $teacher_id =  $request->input('teacher_id');
        // return $teacher_id;
        $result = DB::table('classes')
                    ->join('classrooms','classrooms.id','=','classes.classroom_id')
                    ->join('teachers','teachers.id','=','classes.teacher_id')
                    ->where('teacher_id','=',$teacher_id)
                    // ->where('status','=',1)
                    ->select('classes.*','classrooms.name as room_name','teachers.name as teacher_name')
                    ->get();
        return response()->json(['code' => 1, 'data' => $result]);
    }
    /**
     * Lay ten giao vien sau khi dang nhap.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTeacherNameByUser(Request $request)
    {
        $user_id = $request->user_id;
        $teacher_id = DB::table('teachers')
                    ->join('users','users.id','=','teachers.user_id')
                    ->where('user_id','=',$user_id)
                    ->select('teachers.id as teacher_id')
                    ->first();
        return response()->json(['code' => 1, 'data' => $teacher_id]);
    }
}
