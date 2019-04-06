@extends('layouts.master')
@section('title', 'Kết quả học tập học viên')
@section('content')
    @if(Auth::check())
    <input type="hidden" id="get_id_student_123" 
    value="{{$student_id = DB::table('students')->join('users','users.id','=','students.user_id')
        ->where('user_id',Auth::User()->id)->value('students.id')}}" >
    @endif
    <div class="card-body table-reponsive">
        <table class="table table-bordered table-striped" id="table-show-achieve">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Số buổi vắng</th>
                    <th>Điểm thi</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection