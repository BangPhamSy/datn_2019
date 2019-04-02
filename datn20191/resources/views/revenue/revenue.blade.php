@extends('layouts.master')
@section('page-title')
  Doanh thu của trung tâm
@endsection
@section('title')
  Doanh thu các khóa học<span></span>
@endsection
@section('breadcrumb')
  <li class="active">Danh thu trung tâm</li>
@endsection
@section('content')

  {{-- button thêm mới khóa học --}}
  <div><button  class=" back btn btn-success hidden ">Quay lại</button></div>
  <br/>
  <div class="card-body table-reponsive table-list-course">
        {{-- bảng danh sách khóa học --}}
        <table class="table table-bordered table-striped" id="show-list-course">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã khóa học</th>
              <th>Tên khóa học</th>
              <th>Trình độ</th>
              <th>Giáo trình</th>
              <th>Thời lượng(h)</th>
              <th>Số học sinh tham gia</th>
              <th>Học phí đã thu</th>
              <th>Chi tiết</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
  </div></br>

  <div class="card-body table-reponsive table-revenue-class hidden">
        {{-- bảng danh sách khóa học --}}
        <table class="table table-bordered table-striped" id="show-revenue-class">
          <thead>
            <tr>
              {{-- <th>STT</th> --}}
              <th>Tên lớp</th>
              <th>Sĩ số</th>
              <th>Ngày bắt đầu</th>
              <th>Học phí đã thu</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div></br>

@endsection