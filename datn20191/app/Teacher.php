<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['name','birthdate','mobile','address','experience','certificate','description'];
    /**

 * Hiển thị danh sách các bản ghi.
 *
 * @param  string $keyword
 * @param  numeric $record
 * @param  numeric $page
 * @return void
 */
public static function search($keyword, $record,$page = 1){
    $start = ($page - 1) * $record;
    $search = Teacher::orderBy('id','desc')->where('name','like','%'.$keyword.'%')
    ->orwhere('birthdate','like','%'.$keyword.'%')
    ->orwhere('experience','like','%'.$keyword.'%')
    ->orwhere('address','like','%'.$keyword.'%')
    ->orwhere('mobile','like','%'.$keyword.'%')
    ->orwhere('certificate','like','%'.$keyword.'%')
    ->orwhere('description','like','%'.$keyword.'%')
    ->offset($start)->limit($record)->get();
    return $search;
}
/**
 * Xóa một bản ghi dựa vào id.
 *
 * @param  int  $id
 * @return void
 */
public static function deleteTeacher($teacher_id){
    return DB::table('teachers')->where('id',$teacher_id)->delete();
} 
/**
 * Xóa một bản ghi dựa vào id.
 *
 * @param  int  $id
 * @return void
 */
public static function checkStatusTeacher($teacher_id){
    $statusTeacher = DB::table('teachers')
                    ->join('classes','classes.teacher_id','=','teachers.id')
                    ->where('teacher_id','=',$teacher_id)
                    ->select('classes.status as status_class' )
                    ->get();
        return $statusTeacher;
    ;
} 
/**
 * Thêm mới một bản ghi.
 *
 * @param  array $data
 * @return void
 */
public static function store1($data,$idAccountTeacher){
    $teacher = DB::table('teachers')->insert(
        [
            'name'          => $data['name'],
            'email'         => $data['email'],
            'experience'    => $data['experience'],
            'description'   => $data['description'],
            'address'       => $data['address'],
            'mobile'        => $data['mobile'],
            'birthdate'     => $data['birthdate'],
            'user_id'       =>$idAccountTeacher,
            'certificate'   => $data['certificate'],
            'created_at'    => $data['created_at'],
            'gender'        => $data['gender'],
            // 'updated_at' => $data['updated_at'],
        ]
    );
    return $teacher;
}
/**
 * EDIT giáo viên.
 *
 * @param  int $id
 * @return void
 */
public static function edit1($id){
    $teacher = DB::table('teachers')->where('id',$id)->get();
    return $teacher;
}
/**
 * Update thông tin giáo viên.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return void
 */
public static function update1($data, $id){
    $teacher = DB::table('teachers')->where('id', $id)
    ->update([
        'name'          => $data['name'],
        'experience'    => $data['experience'],
        'description'   => $data['description'],
        'address'       => $data['address'],
        'mobile'        => $data['mobile'],
        'birthdate'     => $data['birthdate'],
        'certificate'   => $data['certificate'],
        'gender'        => $data['gender'],
        // 'created_at' => $data['created_at'],
        'updated_at'    => $data['updated_at'],
    ]);
    return $teacher;
}
}