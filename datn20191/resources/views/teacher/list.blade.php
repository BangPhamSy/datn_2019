	@extends('layouts.master')
	@section('page-title')
	Danh sách giáo viên
	@endsection
	@section('title')
	Danh sách giáo viên<span></span>
	@endsection
	@section('breadcrumb')
	<li class="active">Danh sách giáo viên</li>
	@endsection
	@section('content')
	<button  class="btn btn-info" type="button" id="button-create-teacher">Thêm mới</button><br><br>

	<div class="card-body table-reponsive">
		<table class="table table-bordered table-striped" id="list-teacher">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên giáo viên</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>Kinh nghiệm (năm)</th>
					<th>Chứng chỉ</th>
					<th>Thông tin thêm</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>STT</th>
					<th>Tên giáo viên</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>Kinh nghiệm(năm)</th>
					<th>Chứng chỉ</th>
					<th>Thông tin thêm</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>
 <!-- Form editTeacher-->
 <div class="modal fade" id="modal-edit-teacher">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  <h4 class="modal-title">Sửa thông tin giáo viên</h4>
		</div>  
		<div class="modal-body">
			<div class="contain-form">
					<form  role="form" id="form-edit-teacher">
							<input type="hidden" name="" value="" id="get_edit_teacher_id">
							<div class="form-group">
								<label for="">Tên giáo viên</label>
								<input name="name" type="text" class="form-control" id="edit_teacher_name">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input name="email" type="text" class="form-control" id="edit_teacher_email">
							</div>
						  <div class="form-group">
							<label for="">Địa chỉ</label>
							<input name="address" type="text" class="form-control" id="edit_teacher_address">
						  </div>
						  <div class="form-group">
							<label for="">Mobile</label>
							<input name="mobile" type="text" class="form-control" id="edit_teacher_mobile">
						</div>
						<div class="form-group">
							<label for="">Ngày sinh</label>
							<input name="birthdate" type="text" readonly class="form-control" id="edit_teacher_birthdate">
						</div>
						<div class="form-group">
								<label for="">Kinh nghiệm làm việc</label>
								<select class="form-control" name="experience" id="edit_teacher_experience">
									<option value="1">1-3 năm</option>
									<option value="2">3-5 năm</option>
									<option value="2"> Trên 5 năm</option>
								</select>
						</div>
					  <div class="form-group">
						<label for="">Chứng chỉ</label>
						<input name="certificate" type="text" class="form-control" id="edit_teacher_certificate">
					  </div>
					  <div class="form-group">
						<label for="">Mô tả</label>
						<input name="description" type="text" class="form-control" id="edit_teacher_description">
					  </div>
					 <div class="form-group">
							<label for="">Giới tính</label>
							<select class="form-control" name="gender" id="edit_teacher_gender">
								<option value="0">Nam</option>
								<option value="1">Nữ</option>
							</select>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="button-edit-teacher btn btn-primary" data-id="" >Update
		  </button>
		</div>
	  </div>
	</div>
</div>
<!-- Form CreateTeacher-->
<div class="modal fade" id="modal-create-teacher">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  <h4 class="modal-title">Thêm mới giáo viên</h4>
		</div>  
		<div class="modal-body">
			<div class="contain-form">
				<form role="form"  id="form-create-teacher">
						
						<div class="form-group">
							<label for="">Tên giáo viên</label>
							<input name="name" type="text" class="form-control" id="teacher_name">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input name="email" type="text" class="form-control" id="teacher_email">
						</div>
				  	<div class="form-group">
						<label for="">Địa chỉ</label>
						<input name="address" type="text" class="form-control" id="teacher_address">
				  	</div>
				  	<div class="form-group">
						<label for="">Mobile</label>
						<input name="mobile" type="text" class="form-control" id="teacher_mobile">
					</div>
					<div class="form-group">
						<label for="">Ngày sinh</label>
						<input name="birthdate" type="text" readonly class="form-control" id="teacher_birthdate">
					</div>
					<div class="form-group">
							<label for="">Kinh nghiệm làm việc</label>
							<select class="form-control" name="experience" id="teacher_experience">
								<option value="1">1-3 năm</option>
								<option value="2">3-5 năm</option>
								<option value="3"> Trên 5 năm</option>
							</select>
					</div>
				  <div class="form-group">
					<label for="">Chứng chỉ</label>
					<input name="certificate" type="text" class="form-control" id="teacher_certificate">
				  </div>
				  <div class="form-group">
					<label for="">Mô tả</label>
					<input name="description" type="text" class="form-control" id="teacher_description">
				  </div>
				 <div class="form-group">
						<label for="">Giới tính</label>
						<select class="form-control" name="gender" id="teacher_gender">
							<option value="0">Nam</option>
							<option value="1">Nữ</option>
						</select>
				</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary" id="create-teacher">Save</button>
		</div>
	  </div>
	</div>
</div>
@endsection
	