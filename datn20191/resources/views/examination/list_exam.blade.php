@extends('layouts.master')
@section('page-title')
	Danh sách kì thi
@endsection
@section('title')
	Danh sách kì thi
@endsection
@section('breadcrumb')
	<li class="active">danh sách kì thi</li>
@endsection
@section('content')
	@if(Auth::User()->role_id==2)
		<input type="hidden" id="teacher_id_after_log_in" value="{{$teacher_id = DB::table('teachers')->join('users','users.id','=','teachers.user_id')
						->where('user_id',Auth::User()->id)->value('teachers.id')}}" >
		
	@elseif(Auth::User()->role_id==1)
		<div><button class="button-add btn btn-info add-exam">Thêm kì thi</button></div><br>
	
	@endif
	@include('examination.list')
@endsection