@extends('layouts.master')
@section('title', 'Danh sách lớp')
@section('breadcrumb')
<li class="active">Danh sách lớp</li>
@endsection
@section('content')
  <div class=" content-class row">
    @if(Auth::check())
      <input type="hidden" name="" value="{{Auth::User()->role_id}}" id="get_role">
      <input type="hidden" id="get_teacher_id" 
      value="{{$teacher_id = DB::table('teachers')->join('users','users.id','=','teachers.user_id')
          ->where('user_id',Auth::User()->id)->value('teachers.id')}}" >
      <div class="col-xs-12">
        @if(Auth::User()->role_id==1)
            <div class="box-header">
            <button type="button" id="button-create-class" class="btn btn-success">
                Thêm lớp
            </button>
            </div>
        @endif
    @endif
            <!-- /.box-header -->
            <div class="box-body">

            <div  class="table-responsive table-class " style="margin-top: 10px"> 
              <table id="list_class" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên Lớp </th>
                      <th>Mã lớp</th>
                      <th>Tên giảng viên</th>
                      <th>Sỉ số</th>
                      <th>Thời điểm</th>
                      {{-- <th>Ngày bắt đầu</th>
                      <th>Ngày kết thúc</th> --}}
                      <th>Lịch học</th>
                      <th>Thời gian học</th>
                      {{-- <th>Bắt đầu</th>
                      <th>Kết thúc</th> --}}
                      <th>Phòng học</th>
                      <th>Trạng thái</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>     
                </tbody>
              </table>
             </div>
            </div>
          <!-- /.box -->
      </div>
    </div>
<!--Form them moi lop hoc -->
 <div class="modal fade" id="modal-create-class">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Thêm mới lớp học</h4>
          </div>  
          <div class="modal-body">
          <form id="form-create-class">
              <div class="form-group">
                <label for="exampleInputText">Mã lớp</label>
                <input type="text" class="form-control" name="class_code" id="class_code"  placeholder="Nhập mã lớp">
              </div>
              <div class="form-group">
                <label for="exampleInputText">Tên lớp</label>
                <input type="text" class="form-control" name="name" id="name"   placeholder="Nhập tên lớp">
              </div>
              <div class="form-group">
                <label for="exampleInputText">Tên giảng viên</label>
                <select class="form-control form-control-sm" id="name_teacher">
                </select>
              </div>
              <div class="form-group">
              <label for="exampleInputText">Ngày bắt đầu</label>
                <input type="text" readonly class="form-control" name="start_date" id="start_date"   placeholder="Nhập ngày bắt đầu">
              </div>
                <div class="form-group">
                <label for="exampleInputText">Lịch học</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="schedule" id="schedule" value="1">
                      <label class="form-check-label" name="schedule" id="schedule" >Thứ 2</label>
                      <input class="form-check-input" value="2" type="checkbox" id="schedule" >
                      <label class="form-check-label" for="inlineCheckbox2">Thứ 3</label>
                      <input class="form-check-input" value="3" type="checkbox" name="schedule" id="schedule"  >
                      <label class="form-check-label" for="inlineCheckbox2">Thứ 4</label>
                      <input class="form-check-input" value="4" type="checkbox" name="schedule" id="schedule"  >
                      <label class="form-check-label" for="inlineCheckbox2">Thứ 5</label>
                      <input class="form-check-input" value="5" type="checkbox" name="schedule" id="schedule"  >
                      <label class="form-check-label" for="inlineCheckbox2">Thứ 6</label>
                      <input class="form-check-input" value="6" type="checkbox" name="schedule" id="schedule"  >
                      <label class="form-check-label" for="inlineCheckbox2">Thứ 7</label>
                      <input class="form-check-input" value="0" type="checkbox" name="schedule" id="schedule" >
                      <label class="form-check-label" for="inlineCheckbox2">Chủ nhật</label>
                    </div> 

                </div>
              <div class="form-group">
                  <label for="exampleInputText">Thời gian bắt đầu</label>
                  <input type="time" class="form-control" name="time_start" id="time_start">
                </div>
              <div class="form-group">
                <label for="exampleInputText">Thời lượng(h)</label>
                <input type="text" class="form-control" name="duration" id="duration" placeholder="Nhập thời lượng">
              </div>
              <div class="form-group">
                <label for="exampleInputText">Sĩ số</label>
                <input type="text" class="form-control" id="class_size" name="class_size"  placeholder="Nhập sĩ số">
              </div>
              <div class="form-group">
                <label for="exampleInputText">Phòng học</label>
                <select class="form-control form-control-sm" id="name_room">
                    
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputText">Tên khóa học</label>
                <select class="form-control form-control-sm" id="name_course">
                    
                </select>
              </div>
      </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="create-class">Save</button>
          </div>
        </div>
      </div>
  </div>
<!--Het form them moi khoa hoc -->
<!--Form Sua lop hoc -->
 <div class="modal fade" id="modal-edit-class">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Sửa lớp học</h4>
          </div>  
          <div class="modal-body">
          <form id="form-edit-class">
              <div class="form-group">
                <label for="exampleInputText">Mã lớp</label>
                <input type="text" class="form-control" name="class_code_edit" id="class_code_edit"  placeholder="Nhập mã lớp">
              </div>
              <div class="form-group">
                <label for="exampleInputText">Tên lớp</label>
                <input type="text" class="form-control" name="name_edit" id="name_edit"   placeholder="Nhập tên lớp">
              </div>
              <div class="form-group">
              <label for="exampleInputText">Ngày bắt đầu</label>
                <input type="date" class="form-control" name="start_date_edit" id="start_date_edit"   placeholder="Nhập ngày bắt đầu" disabled>
              </div>
                
              <div class="form-group">
                  <label for="exampleInputText">Thời gian bắt đầu</label>
                  <input type="time" class="form-control" name="time_start_edit" id="time_start_edit" disabled>
                </div>
              <div class="form-group">
                <label for="exampleInputText">Thời lượng(h)</label>
                <input type="text" class="form-control" name="duration_edit" id="duration_edit" placeholder="Nhập thời lượng" disabled>
              </div>
              <div class="form-group">
                  <label for="exampleInputText">Giảng viên</label>
                  <input type="text" class="form-control" name="name_teacher_edit" id="name_teacher_edit" disabled>
              </div>
              <div class="form-group">
                  <label for="exampleInputText">Phòng học</label>
                  <input type="text" class="form-control" name="name_room_edit" id="name_room_edit" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputText">Sĩ số</label>
                <input type="text" class="form-control" id="class_size_edit" name="class_size_edit"  placeholder="Nhập sĩ số">
              </div>
      </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" data-id="" class="button-edit-class btn btn-primary">Save</button>
          </div>
        </div>
      </div>
  </div>
<!--Het form sua lop hoc -->
<!--Form Them moi hoc sinh vao lop-->
    <div class="modal fade" id="modal-add-student-class">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class=" close close-modal-add-student-class" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Danh sách học sinh</h4>
                </div>
                <div class="modal-body">
                   <input type="hidden" name="" value="" id="get_class_id12">
                    <table class="table table-bordered table-striped" id="table-student-class">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên học sinh</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-modal-add-student-class btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!--Het Them moi hoc sinh vao lop -->
<!--Form Danh sach hoc sinh cua lop-->
    <div class="modal fade" id="modal-list-student-class">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close-modal-list-student-class" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Danh sách học sinh của lớp</h4>
                </div>
                <div class="modal-body">
                   <input type="hidden" name="" value="" id="get_class_id2">
                    <table class="table table-bordered table-striped" id="table-student-of-class1">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên học sinh</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class=" close-modal-list-student-class btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!--Het Form Danh sach hoc sinh cua lop -->
<!--Thoi khoa bieu-->
{{-- <div class="card-body table-reponsive table-timetable hidden">
  <h4>Thời khóa biểu của lớp</h4>
  <table class="table table-bordered table-striped" id="timeTableClass">
      <thead>
          <tr>
              <th>STT</th>
              <th>Ngày</th>
              <th>Thời gian từ</th>
              <th>Đến</th>
              <th>Điểm danh</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>STT</th>
              <th>Ngày</th>
              <th>Thời gian từ</th>
              <th>Đến</th>
              <th>Điểm danh</th>
          </tr>
      </tfoot>
  </table>
</div> --}}

	{{-- bảng danh sách kì thi --}}
	{{-- <div class="card-body table-reponsive table-exam hidden">
      <table class="table table-bordered table-striped" id="list-exam">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên kì thi</th>
            <th>Tên lớp</th>
            <th>Thời gian thi</th>
            <th>Thời lượng(phút)</th>
            <th>Ghi chú</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tfoot>
          <tr>
            <th>STT</th>
            <th>Tên kì thi</th>
            <th>Tên lớp</th>
            <th>Thời gian thi</th>
            <th>Thời lượng(phút)</th>
            <th>Ghi chú</th>
            <th>Action</th>
          </tr>
          </tfoot>
      </table>
    </div></br> --}}
  @include('examination.list')
  @include('class.timetable')
  {{-- @include('class.rollcall') --}}
@endsection
@section('footer')
<script type="text/javascript">
  var asset = "{{ asset('') }}"
</script>
@endsection