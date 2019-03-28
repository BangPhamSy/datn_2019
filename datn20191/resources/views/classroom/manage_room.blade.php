@extends('layouts.master')
@section('title')
	Phòng học
@endsection
@section('breadcrumb')
	<li class="active">danh sách phòng học</li>
@endsection
@section('content')
	<div>
        <button class="btn btn-info list-room">Danh sách phòng học</button>
        <button class="btn btn-success search-room-by-day">
            <i class="fa fa-search-plus" aria-hidden="true"></i>
                Ngày
        </button>
        <button class="btn btn-danger search-room-by-room">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                Phòng học
        </button>

    </div>
    <br/>
    <div class="press-day-search hidden ">
            <div class="form-group">
                    <label for="exampleInputText">Nhập ngày</label>
                    <input type="date" class="form-control" name="
                    time_search" id="time_search">
            </div>
    </div>
    <div class="press-room-search hidden ">
            <div class="form-group">
                    <label for="exampleInputText">Chọn phòng học</label>
                    <select class="form-control form-control-sm" id="select_name_room">
                        
                    </select>
            </div>
    </div>
    <br>
	<div class="card-body table-reponsive table-list-class-room hidden">
            <h4 class="add-text-date">Các phòng học sử dụng trong ngày </h4>
		<table class="table table-bordered table-striped " id="list-class-room">
			<thead>
				<tr>
					<th>STT</th>
					<th data-field="holiday">Phòng học</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
				</tr>
			</thead>
		</table>
    </div></br>
    <div class="card-body table-reponsive table-list-class-room-by-room hidden">
            <h4 class="add-text-date">Các lớp sử dụng phòng học </h4>
		<table class="table table-bordered table-striped " id="list-class-room-by-room">
			<thead>
				<tr>
					<th>STT</th>
                    <th data-field="holiday">Tên lớp</th>
                    <th>Ngày sử dụng</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
				</tr>
			</thead>
		</table>
	</div></br>

	<div class="modal fade" id="list-room">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
					<h4 class="modal-title">Danh sách phòng học</h4>
				</div>
				<div class="modal-body">
                    <div>
                        <button class="btn btn-info add-list-room">Thêm phòng học</button><br/>
                    </div>
                    
                    <table class="table table-bordered table-striped" id="table-class-room">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên phòng</th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
    </div>
    
    <div class="modal fade" id="modal-add-room">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Thêm phòng học mới</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-add-classroom" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên phòng học</label>
                                <input type="text" class="form-control" id="name_room">
                            </div>
                            
                            <button id="add-room" type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

@endsection