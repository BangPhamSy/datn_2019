@extends('layouts.master')
@section('title', 'Danh sách lớp được phân công')
@section('breadcrumb')
<li class="active">Danh sách lớp được phân công</li>
@endsection
@section('content')
  <div class=" content-class row">
      {{-- <input type="hidden" name="" value="{{Auth::User()->id}}" id="get_teacher_id"> --}}
      @if(Auth::check())
        <input type="hidden" id="get_teacher_id" 
      value="{{$teacher_id = DB::table('teachers')->join('users','users.id','=','teachers.user_id')
          ->where('user_id',Auth::User()->id)->value('teachers.id')}}" >
      @endif
      <input type="hidden" name="" value="" id="get_teacher_id2">
      <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
            <div  class="table-responsive " style="margin-top: 10px"> 
              <table id="list_class_of_teacher" class="table table-bordered table-striped">
                <thead>
                  <tr>
                     <th data-field="id">STT</th>
                     <th data-field="name">Tên Lớp </th>
                     <th data-field="class_code">Mã lớp</th>
                     <th data-field="class_size">Sỉ số</th>
                     <th data-field="start_date">Ngày bắt đầu</th>
                     <th data-field="room_name">Phòng học</th>
                     <th data-field="schedule">Lịch học</th>
                     <th data-field="time_start">Thời gian học</th>
                     <th data-field="status">Trạng thái</th>
                     <th data-field="action">Hành động</th>
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
<!--Form Danh sach hoc sinh cua lop-->
<!--Het Form Danh sach hoc sinh cua lop -->
@endsection
@section('footer')
<script type="text/javascript">
  var asset = "{{ asset('') }}"
</script>
@endsection