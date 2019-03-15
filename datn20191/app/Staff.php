<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Staff extends Model
{
    protected $table = 'staffs';
    /**

 * Create a function addStaff
 *
 * @return void
 */
public static function addStaff($data){
    $staff = DB::table('staffs')->insert([
        ['name' => $data['name'],
        'email' => $data['email'],
        'gender' => $data['gender'],
        'address' => $data['address'],
        'phone_number' => $data['phone_number'],
        'birthDate' => $data['birthDate'],
        'images' => $data['images'],    
        'created_at' => $data['created_at'],
        'password' => $data['password'],
    ],
]);
    return $staff;
}
public static function search($keyword, $record_per_page,$page = 1){
    $start = ($page - 1) * $record_per_page;
    $search = Staff::orderBy('id','desc')->where('name','like','%'.$keyword.'%')
    ->orwhere('email','like','%'.$keyword.'%')
    ->orwhere('address','like','%'.$keyword.'%')
    ->orwhere('phone_number','like','%'.$keyword.'%')
    ->offset($start)->limit($record_per_page)->get();
    return $search;
}
public static function deleteStaff($staff_id){
    return DB::table('staffs')->where('id',$staff_id)->delete();
} 
public static function editPasswordStaff($id, $currentPassword, $newPassword){
    $Staff = DB::table('staffs')
    ->where('id', $id)
    ->Where('password', $currentPassword)
    ->update([
        'password'=> $newPassword,
    ]);
    return $Staff;
}
public static function editStaff( $data, $id){
    $staff  = DB::table('staffs')
    ->where('id', $id)
    ->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'gender' => $data['gender'],
        'images' => $data['images'],
        'password' => $data['password'],
        'birthDate' => $data['birthDate'],
        'address' => $data['address'],
        'phone_number' => $data['phone_number'],
        'updated_at' => $data['updated_at'],
    ]);
    return $staff;
}
}