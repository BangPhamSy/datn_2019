@extends('layouts.master')
@section('title', 'Thời khóa biểu của sinh viên')
@section('breadcrumb')
    <li class="active">Thời khóa biểu</li>
@endsection
@section('content')
    @if(Auth::check())
    <input type="hidden" id="get_id_student_123" 
    value="{{$student_id = DB::table('students')->join('users','users.id','=','students.user_id')
        ->where('user_id',Auth::User()->id)->value('students.id')}}" >
    @endif
    <div class="card-body table-reponsive">
        <table class="table table-bordered table-striped" id="timeTableStudent">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Giáo viên dạy</th>
                    <th>Ngày bắt đầu</th>
                    <th>Lịch học</th>
                    <th>Phòng học</th>
                    <th>Bắt đầu từ</th>
                    <th>Kết thúc lúc</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
