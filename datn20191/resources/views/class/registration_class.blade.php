@extends('layouts.master')
@section('title')
	Danh sách các lớp mở đăng kí
@endsection
@section('content')
<div class=" content-class row">
        {{-- <input type="hidden" value="{{Auth::User()->id}}" id="get_r"/>
   --}}
    @if(Auth::check())
        <input type="hidden" id="get_id_student_lll" 
        value="{{$student_id = DB::table('students')->join('users','users.id','=','students.user_id')
            ->where('user_id',Auth::User()->id)->value('students.id')}}" >
    @endif
        <div class="col-xs-12">
              <!-- /.box-header -->
              <div class="box-body">
                <div><button class=" btn btn-success show-list-class-registed">Danh sách các lớp đã đăng kí</button></div><br>
              <div  class="table-responsive " style="margin-top: 10px"> 
                <table id="list_registration_class" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th data-field="id">STT</th>
                       <th data-field="name">Tên Lớp </th>
                       <th data-field="class_code">Mã lớp</th>
                       <th data-field="teacher_id">Tên giảng viên</th>
                       <th data-field="class_size">Sỉ số</th>
                       <th data-field="start_date">Ngày bắt đầu</th>
                       <th data-field="schedule">Lịch học</th>
                        <th data-field="time_start">Băt đầu</th>
                        <th data-field="time_end">Kết thúc</th>
                        <th data-field="status">Trạng thái</th>
                        <th data-field="action">Đăng kí</th>
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
    <!--Danh sách lớp đã đăng kí-->
    <div class="modal fade" id="list_class_registed">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class=" close close-modal-add-student-class" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Danh sách các lớp đã đăng kí</h4>
              </div>
              <div class="modal-body">
                 {{-- <input type="hidden" name="" value="" id="get_class_id12"> --}}
                 <table id="table_list_registration_class" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th data-field="id">STT</th>
                        <th data-field="name">Tên lớp </th>
                        <th data-field="class_code">Mã lớp</th>
                        <th data-field="class_size">Sỉ số</th>
                        <th data-field="start_date">Ngày bắt đầu</th>
                        <th data-field="schedule">Lịch học</th>
                        <th data-field="time_start">Bắt đầu</th>
                        <th data-field="time_end">Kết thúc</th>
                        <th data-field="action">Hủy lớp</th>
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
@endsection
@section('footer')
<script type="text/javascript">
  var asset = "{{ asset('') }}"
</script>
@endsection