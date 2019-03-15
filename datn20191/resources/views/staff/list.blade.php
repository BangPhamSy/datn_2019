 {{-- ke thua file master --}}
 @extends('layouts.master')
 {{-- end --}}
 @section('header')
 {{-- <meta name="_token" content="{{ csrf_token() }}"> --}}
 {{-- <link rel="stylesheet" href="{{asset('css/staff.css')}}"> --}}
 @endsection
 @section('title')
 Danh sách nhân viên
 @endsection
 @section('content')
 <a href="{{asset('staff/add')}}" class="btn btn-primary _button">Thêm nhân viên </a>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
 	<thead>
 		<tr>
 			<th>Stt</th>
 			<th>Tên</th>
 			<th>Email</th>
 			<th>Giới tính</th>
 			<th>Ảnh đại diện</th>
 			<th>Ngày sinh</th>
 			<th>Địa chỉ</th>
 			<th>Điện thoại</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	{{-- <tbody>
 		<tr>
 			<td>1</td>
 			<td>Nguyen Dung</td>
 			<td>nvd.dung.1999gmail.com</td>
 			<td>nam</td>
 			<td><img src="" alt="" style="width: 200px"></td>
 			<td>12/12/1999</td>
 			<td>Vinh phuc</td>
 			<td>0969696969</td>
 			<td>
 				<a href="{{asset('staff/edit')}}" class="btn btn-warning _action fa fa-pencil-square-o" title="Chỉnh sửa"></a>
 				<a href="#" class="btn btn-danger _action fa fa-trash" title="Xoa" type="button" id="delete" ></a>
 				<a href="#" title="Đôi mật khẩu" class="btn btn-info _action fa fa-key" data-toggle="modal" data-target="#myModal" id="editPassword"></a>

 			</td>
 		</tr>
 	</tbody> --}}
 	<tfoot>
 		<tr>
 			<th>Stt</th>
 			<th>Tên</th>
 			<th>Email</th>
 			<th>Giới tính</th>
 			<th>Ảnh đại diện</th>
 			<th>Ngày sinh</th>
 			<th>Địa chỉ</th>
 			<th>Điện thoại</th>
 			<th>Action</th>
 		</tr>
 	</tfoot>
 </table>
 {{-- modal --}}
 <div id="myModal" class="modal fade" role="dialog">
 	<div class="modal-dialog">
 		<!-- Modal content-->
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal">&times;</button>
 				<h4 class="modal-title">Đổi mật khẩu</h4>
 			</div>
 			<div class="modal-body">
 				<form action="" method="post" id="formm">
 					<div class="form-group">
 						<label for="exampleInputEmail1">Mật khẩu cũ</label>
 						<input type="password" class="form-control"
 						id="currentPassword" placeholder="Mật khẩu cũ" name="olderPassword"/>
 						<span class="bell" id="errorPassword">Mật khẩu tối thiểu 8 kí tự</span>
 					</div>
 					<div class="form-group">
 						<label for="exampleInputPassword1">Mật khẩu mới</label>
 						<input type="password" class="form-control"
 						id="newPassword" placeholder="Mật khẩu mới"/>
 						<span class="bell" id="q1">Mật khẩu tối thiểu 8 kí tự</span>
 					</div>
 					<div class="form-group">
 						<label for="exampleInputPassword1">Nhập lại mật khẩu</label>
 						<input type="password" class="form-control"
 						id="newPassword1" placeholder="Nhập lại mật khẩu"/>
 						<span class="bell" id="errorPass_1">Mật khẩu không khớp !!</span>
 					</div>
 					<button type="button" class="btn btn-default changePassword" id="submit">Thay đổi</button>
 				</form>
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
 			</div>
 		</div>
 	</div>
 </div>
 {{-- end modal --}}
 @endsection
 @section('footer')
{{--  <script>
 	var asset = "{{asset('')}}";
 	var img = "{{ asset('storage') }}/files/";
 </script> --}}
 {{-- <script src="{{asset('js/staff.js')}}"> --}}
 </script>
  @endsection