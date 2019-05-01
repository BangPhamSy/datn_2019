@extends('home')
@section('title')
	Các giảng viên của trung tâm
@endsection
@section('content')
    <div class="container">
        @foreach($listTeacher as $lt)
            <div class="row col-md-11">
                <div class="panel panel-success">
                    <div class=" title panel-heading panel-orange">Tên giảng viên:{{$lt->name}}</div>
                    <div class="panel-body">
                        <div class=" created_time">Địa chỉ:{{$lt->address}}</div><br/>
                        <div class="content_noti">Kinh nghiệm : {{$lt->experience}} năm</div>
                        <br/>
                        <div class="content_noti">Tốt nghiệp: {{$lt->certificate}}</div>
                        <br/>
                        <div class="content_noti">Thông tin thêm: {{$lt->description}}</div>
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
    <div class="paginate" style="text-align:center">
                {{ $listTeacher->links() }}
    </div> 
@endsection