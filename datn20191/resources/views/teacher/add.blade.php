@extends('layouts.master')
@section('header')
{{-- <link rel="stylesheet" href="{{ asset('css/teacher.css') }}"> --}}
@endsection
@section('title')
<h4 class="box-title">Thêm mới giáo viên</h4>
@endsection
@section('breadcrumb')
<li>
	<a href="{{asset('ahihi')}}"><i class="fa fa-dashboard"></i> Trang chủ</a>
</li>
<li>
	<a href="{{asset('teacher/list')}}"><i class="fa fa-list" aria-hidden="true"></i></i> 
		Danh sách giáo viên
	</a>
</li>
@endsection
@section('content')
<form class="add-teacher" id="myForm">
	<div class="form-group">
		<label for="name">Tên:</label>
		<input type="text" class="form-control" id="name" placeholder="Tên">
		<span class="text-danger" id="err-name">Tên không được để trống!</span>
	</div>
	<div class="form-group">
		<label for="name">Email:</label>
		<input type="email" class="form-control" id="email" placeholder="Email">
		<span class="text-danger" id="err-email">Email không được để trống!</span>
	</div>
	<div class="form-group">
		<label for="address">Địa chỉ:</label>
		<input type="text" class="form-control" id="address" placeholder="Địa chỉ">
		<span class="text-danger" id="err-address">Địa chỉ không được để trống!</span>
	</div>
	<div class="form-group">
		<label for="mobile">Số điện thoại:</label>
		<input type="text" class="form-control" id="mobile" placeholder="Số điện thoại">
		<span class="text-danger" id="err-mobile">Số điện thoại không được để trống!</span>
	</div>
	<div class="form-group">
		<label for="name">Ngày sinh:</label>
		<input type="date" class="form-control" id="birthday" placeholder="Ngày sinh">
		<span class="text-danger" id="err-birthday">Ngày sinh không được để trống!</span>
	</div>
	<div class="form-group">
		<label for="name">Giới tính:</label>
		<select class="form-control" id="gender">
			<option value="1" >Nam</option>
			<option value="0">Nữ</option>
			<option value="2">Khác</option>
		</select>
	</div>
	<div class="form-group">
		<label for="name">Kinh nghiem</label>
		<input type="text" class="form-control" id="exp_1" placeholder="Kinh nghiệm tính theo năm">
		<span class="text-danger" id="err-exp">kinh nghiệm không được để trống !</span>
	</div>
	<div class="form-group">
		<label for="name">Bằng cấp</label>

		<input type="text" class="form-control" id="certificate" placeholder="Bằng cấp">

		<span class="text-danger" id="cerr-ertuficate">Bằng cấp không được để trống !</span>
	</div>
	<div class="form-group">
		<label for="name">Thông tin thêm</label>
		{{-- <input type="text" id="description"> --}}

		<input type="text" class="form-control description-1" id="err-description" placeholder="Thông tin thêm" >

		<span class="text-danger" id="err-description_1" >Bằng cấp không được để trống !</span>
	</div>
	<div class="center-block">
		<a href="#" class="btn btn-success" id="addTeacher">Thêm</a>
		<a href="{{asset('teacher/list')}}" class="btn btn-danger">Hủy</a>
	</div>

</form>

@endsection 
@section('footer')
{{-- <script src="{{ asset('js/teacher.js') }}"></script> --}}
@endsection