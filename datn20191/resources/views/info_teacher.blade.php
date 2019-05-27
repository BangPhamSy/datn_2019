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
                        <div class=" created_time"><strong>Địa chỉ:</strong>{{$lt->address}}</div><br/>
                        <div class="content_noti"><strong>Kinh nghiệm :</strong> {{$lt->experience}} năm</div>
                        <br/>
                        <div class="content_noti"><strong>Tốt nghiệp:</strong> {{$lt->certificate}}</div>
                        <br/>
                        <div class="content_noti"><strong>Thông tin thêm:</strong> {{$lt->description}}</div>
                    </div>
                </div>
            </div>
        @endforeach
       
    </div>
    <div class="paginate" style="text-align:center">
                {{ $listTeacher->links() }}
    </div> 
@endsection