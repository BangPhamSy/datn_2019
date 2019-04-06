@extends('layouts.master')
@section('title')
	Danh sách phản hồi
@endsection
@section('content')
    @if(Auth::check())
        <input type="hidden" name="" value="{{Auth::User()->role_id}}" id="get_role_id">
        <input type="hidden" id="get_user_id" value="{{Auth::User()->id}}" >
    @if(Auth::User()->role_id==3)
        <div class="box-header">
        <button type="button"  data-target="#modal-create-new-feedback" id="button-create-new-feedback" class="btn btn-primary">
                <i class="fa fa-comments-o" aria-hidden="true"></i> Gửi phản hồi mới
        </button>
        </div>
    @endif
    @endif
    <div class="box-body">
        <div class="card-body table-reponsive">
            <table class="table table-bordered table-striped" id="list-feedback">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người gửi</th>
                        <th>Email</th>
                        <th>Thời gian gửi</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
            </table>
        </div></br>
    </div>
    <div class="modal fade" id="modal-create-new-feedback">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Phản hồi mới</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Nhập nội dung:</label>    
                                <div class="col-sm-7">
                                <textarea class="form-control content-new-feedback" rows="3"></textarea>
                                </div> 
                        </div>
                    <button class="btn btn-primary submit-new-feedback"><i class="fa fa-paper-plane" aria-hidden="true"></i> Gửi</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
    </div>
	<div class="modal fade" id="modal-show-detail-feedback">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Các bình luận</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-striped" id="list-detail-feedback">
                        <thead>
                            <tr>
                                <th></th>
                                <th data-field="sender1"></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <br/>
                    <div class="form-group">
 
                            <label class="col-sm-3 control-label">Nhập nội dung:</label>
                             
                            <div class="col-sm-7">
                             
                            <textarea class="form-control content-feedback" rows="3"></textarea>
                             
                            </div>
                             
                    </div>
                <button class="btn btn-primary submit-feedback"><i class="fa fa-reply-all" aria-hidden="true"></i>Trả lời</button>
                </div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
    </div>
    
@endsection
{{-- @section('footer')
@endsection --}}