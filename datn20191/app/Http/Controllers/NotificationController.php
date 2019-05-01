<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NotificationController extends Controller
{

    public function createNotification(Request $request){
    	DB::table('notification')->insert(
            [
                'title'         =>  $request->title,
                'content'         =>  $request->content,
                'created_time'     =>  date('Y-m-d H:i:s')
            ]
        );
    }

    public function getListNotification(Request $request){
        $listNoti = DB::table('notification')->select('*')->get();
        return response()->json(['code'=>1,'data'=>$listNoti],200);
    }

    public function getListNoti(){
        $listNoti = DB::table('notification')->select('*')->paginate(2);
        return view('master', ['listNoti'=>$listNoti]);
    }

    public function getEditNotification(Request $request){
        $id_noti = $request->input('id_noti');
        $infoNoti = DB::table('notification')->select('*')->get();
        return $infoNoti;
    }



    public function editNotification(Request $request){
        $editNoti = DB::table('notification')->where('id',$request->id_noti)
                    ->update(
                            [
                                'content'=>$request->content,
                                'title'=>$request->title
                            ]
                    );
    }

    public function deleteNotication(Request $request){
        DB::table('notification')->delete($request->id_noti);
    }
    
}
