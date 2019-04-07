@extends('layouts.master')
@section('page-title')
  Kết quả đào tạo của trung tâm
@endsection
@section('title')
Kết quả đào tạo của trung tâm<span></span>
@endsection
@section('content')

  {{-- button thêm mới khóa học --}}
  <div><button  class=" back-result-course btn btn-success hidden ">Quay lại</button></div>
  <br/>
  <div class="card-body table-reponsive table-list-result-training-course">
        {{-- bảng danh sách khóa học --}}
        <table class="table table-bordered table-striped" id="show-list-result-course">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã khóa học</th>
              <th>Tên khóa học</th>
              <th>Số học viên qua</th>
              <th>Tỉ lệ qua</th>
              <th>Chi tiết</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
  </div></br>

  <div class="card-body table-reponsive table-result-training-class hidden">
        {{-- bảng danh sách khóa học --}}
        <table class="table table-bordered table-striped" id="show-list-result-class">
          <thead>
            <tr>
              <th>Mã lớp</th>
              <th>Tên lớp</th>
              <th>Số học viên qua</th>
              <th>Tỉ lệ qua</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div></br>

@endsection