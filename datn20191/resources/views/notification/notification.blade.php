@extends('layouts.master')
@section('page-title')
  Danh sách các thông báo
@endsection
@section('title')
  Danh sách các thông báo<span></span>
@endsection
@section('content')
    <div class="box-header">
        <button type="button"  data-target="#modal-create-new-notification" id="button-create-new-notification" class="btn btn-primary">
                <i class="fa fa-comments-o" aria-hidden="true"></i> Gửi thông báo mới
        </button>
        </div>
    <div class="box-body">
        <div class="card-body table-reponsive">
            <table class="table table-bordered table-striped" id="list-notification">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Thời gian tạo</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div></br>
    </div>
    <div class="modal fade" id="modal-create-new-notification">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Thông báo mới</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Tiêu đề:</label>    
                                <div class="col-sm-7">
                                <input name="title_noti" type="text" class="form-control" id="title_noti">
                                </div> 
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Nhập nội dung:</label>    
                                <div class="col-sm-7">
                                <textarea class="form-control content-new-noti" rows="3"></textarea>
                                </div> 
                        </div>
                    <button class="btn btn-primary submit-new-notification"><i class="fa fa-paper-plane" aria-hidden="true"></i> Tạo</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modal-edit-notification">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Chỉnh sửa thông báo</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="" value="" id="get_id_noti">
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Tiêu đề:</label>    
                                <div class="col-sm-7">
                                <input name="title_noti" type="text" class="form-control" id="title_noti_edit">
                                </div> 
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Nhập nội dung:</label>    
                                <div class="col-sm-7">
                                <textarea class="form-control content-edit-noti" rows="3"></textarea>
                                </div> 
                        </div>
                    <button class="btn btn-primary submit-edit-notification"><i class="fa fa-paper-plane" aria-hidden="true"></i> Save</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
    </div>
@endsection