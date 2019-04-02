@extends('layouts.master')
@section('title')
	Thống kê
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <i>Chúc mừng bạn <span>{{Auth::User()->name}}</span> đã đăng nhập</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection