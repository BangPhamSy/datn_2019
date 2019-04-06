<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FeedBack;

class FeedBackController extends Controller
{
    public function createFeedBack(Request $request)
    {
        $content = $request->content;
        $user_id = $request->user_id;
        $created_at = date('Y-m-d H:i:s');

        $feedback = new FeedBack();
        $feedback->user_id = $user_id;
        $feedback->created_at = $created_at;
        $feedback->save();
        $this->createComment($feedback->id,$user_id,$content,$created_at);
        
    }
    public function createComment($feedback_id,$user_id,$content,$created_at){
        $comment = DB::table('comments')
        ->insert([
            'feedback_id'=>$feedback_id,
            'user_id'=>$user_id,
            'content'=>$content,
            'created_at'=>$created_at
        ]);
    }
    public function answerFeedBack(Request $request)
    {
        $id_feedback =$request->id_feedback;
        $content = $request->content;
        $user_id = $request->user_id;
        $created_at = date('Y-m-d H:i:s');
        $role_id = DB::table('users')->where('id',$user_id)->value('role_id');
        $this->createComment($id_feedback,$user_id,$content,$created_at);
        $this->updateStatusFeedBack($role_id,$id_feedback);
    }
    public function updateStatusFeedBack($role_id,$id)
    {
        if($role_id==1){
            $update_status_feedback = DB::table('feedbacks')
            ->where('id',$id)->update(['status'=>1]);
        }else{
            $update_status_feedback = DB::table('feedbacks')
            ->where('id',$id)->update(['status'=>3]);
        }
       
    }

    public function listFeedBack(Request $request)
    {
        $user_id = $request->user_id;
        $role_id = DB::table('users')->where('users.id',$user_id)->value('role_id');
        if($role_id==3){
            $list_feedback = DB::table('feedbacks')
            ->join('users','users.id','=','feedbacks.user_id')
            ->where('feedbacks.user_id',$user_id)
            ->select(
                'users.name as sender',
                'users.email',
                'feedbacks.created_at as time_send',
                'feedbacks.id',
                'feedbacks.status'
            )
            ->get();
        }else{
            $list_feedback = DB::table('feedbacks')
            ->join('users','users.id','=','feedbacks.user_id')
            ->select(
                'users.name as sender',
                'users.email',
                'feedbacks.created_at as time_send',
                'feedbacks.id',
                'feedbacks.status'
            )
            ->get();
        }
        
        return response()->json(['code'=>1,'data'=>$list_feedback],200);
    }

    public function showDetailFeedBack(Request $request)
    {
        $feedback_id = $request->feedback_id;
        $detail_feedbacks = DB::table('comments')
        ->join('users','users.id','=','comments.user_id')
        ->where('feedback_id',$feedback_id)
        ->select('comments.*','users.name as sender1')
        ->orderBy('comments.created_at','asc')
        ->get();
        return response()->json(['code'=>1,'data'=>$detail_feedbacks],200);
    }

    public function showNewNotifications(Request $request)
    {
        $new_notifications = DB::table('feedbacks')
        ->join('users','users.id','=','feedbacks.user_id')
        ->where('status',0)
        ->get();
        return $new_notifications;
    }
}
