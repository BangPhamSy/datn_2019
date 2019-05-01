@extends('home')
@section('title')
	Các lớp học đang tuyển sinh
@endsection
@section('content')
    <div class="container">
        @foreach($listClass as $lc)
            <div class="row col-md-11">
                <div class="panel panel-success">
                    <div class=" title panel-heading panel-orange">Tên lớp học:{{$lc->name}}</div>
                    <div class="panel-body">
                        <div class=" created_time">Mã lớp:{{$lc->class_code}}</div><br/>
                        <div class="content_noti">Giảng viên : {{$lc->teacher_name}}</div>
                        <br/>
                        <div class="content_noti">Thời gian bắt đầu: {{date("d-m-Y", strtotime($lc->start_date) )}}</div>
                        <br/>
                        <div class="content_noti">Địa điểm: {{$lc->room_name}}</div>
                        <br/>
                        <div class="content_noti">Học phí: {{number_format($lc->fee)}} VNĐ</div>
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
    <div class="paginate" style="text-align:center">
                {{ $listClass->links() }}
    </div> 
@endsection
