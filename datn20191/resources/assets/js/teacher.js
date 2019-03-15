$(function(){
    var tableTeacher = $('#list-teacher').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "ajax":"api/get-list-teacher",
      
        "columns": [
            {"data":  "id"},
            { "data": "name" },
            { "data": "address" },
            { "data": "mobile"},
            { "data": "birthdate" },
            { data: 'gender', name: 'gender',
            	render : function(data) {
			        return data == '0' ? 'Nam' : 'Nữ';
			    }
            },
            { "data": "experience",name : 'experience',
                render : function(data){
                    if(data==1) return '1-3 ';
                    else if(data==2) return '3-5';
                    return '>5 ';
                }
             },
            { "data": "certificate" },
            {"data":  "description"},
            {
                'data': null,
                'render': function (data, type, row) {
                    return ' <button teacherID=\"'+row.id+'\" title=\"sửa giáo viên\"'+
                    'class=\"editTeacher btn btn-warning\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button>'+
                    ' <button teacherID=\"'+row.id+'\" title=\"xóa giáo viên\" '+
                    'class=\"deleteTeacher btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button>'
                }
            },
        ]
    });
    tableTeacher.on( 'order.dt search.dt', function () {
            tableTeacher.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
    } ).draw();

    $('#button-create-teacher').click(function(){
        $('#modal-create-teacher').modal('show');

    });
    jQuery.datetimepicker.setLocale('vi');
    $('#teacher_birthdate').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
    });
    var formAddTeacher = $('#form-create-teacher');
    formAddTeacher.validate({
        rules: {
			"name": {
				required: true,
			},
			"address": {
				required: true,
			},
			"mobile": {
				required: true,
				number: true
			},
			"birthdate": {
				required: true,
				date: true
            },
            "experience": {
				required: true,
            },
            "certificate": {
				required: true,
				
            },
            "description": {
                required: true,
                	
			},
		},
		messages: {
			"name": {
				required: "Bắt buộc nhập tên",
			},
			"address": {
				required: "Bắt buộc nhập địa chỉ",
				
			},
			"mobile": {
				required: "Bắt buộc nhập số điện thoại",
				number: "Hãy nhập số"
			},
			"birthdate": {
				required: "Bắt buộc nhập ngày sinh",
				date: "Hãy nhập đúng định dạng ngày"
            },
            "experience" : {
                required : "Bạn cần nhập kinh nghiệm làm việc"
            },
            "certificate": {
				required: "Bạn cần nhập chứng chỉ",
				
            },
            "description": {
				required: "Bạn cần nhập mô tả",
				
            },

		},
		highlight: function(element, errorClass) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element, errorClass) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		errorPlacement: function (error, element) {
			error.appendTo(element.parent().next());
		},
		errorPlacement: function (error, element) {
			if(element.attr("type") == "checkbox") {
				element.closest(".form-group").children(0).prepend(error);
			}
			else
				error.insertAfter(element);
		}
    });
    var formEditTeacher = $('#form-edit-teacher');
    formEditTeacher.validate({
        rules: {
			"name": {
				required: true,
			},
			"address": {
				required: true,
			},
			"mobile": {
				required: true,
				number: true
			},
			"birthdate": {
				required: true,
				date: true
            },
            "experience": {
				required: true,
            },
            "certificate": {
				required: true,
				
            },
            "description": {
                required: true,
                	
			},
		},
		messages: {
			"name": {
				required: "Bắt buộc nhập tên",
			},
			"address": {
				required: "Bắt buộc nhập địa chỉ",
				
			},
			"mobile": {
				required: "Bắt buộc nhập số điện thoại",
				number: "Hãy nhập số"
			},
			"birthdate": {
				required: "Bắt buộc nhập ngày sinh",
				date: "Hãy nhập đúng định dạng ngày"
            },
            "experience" : {
                required : "Bạn cần nhập kinh nghiệm làm việc"
            },
            "certificate": {
				required: "Bạn cần nhập chứng chỉ",
				
            },
            "description": {
				required: "Bạn cần nhập mô tả",
				
            },

		},
		highlight: function(element, errorClass) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element, errorClass) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		errorPlacement: function (error, element) {
			error.appendTo(element.parent().next());
		},
		errorPlacement: function (error, element) {
			if(element.attr("type") == "checkbox") {
				element.closest(".form-group").children(0).prepend(error);
			}
			else
				error.insertAfter(element);
		}
    });
    $('#create-teacher').click(function(e){
        e.preventDefault();
        var name = $('#teacher_name').val();
        var address = $('#teacher_address').val();
        var mobile = $('#teacher_mobile').val();
        var birthdate = $('#teacher_birthdate').val();
        var experience = $('#teacher_experience').val();
        var certificate = $('#teacher_certificate').val();
        var description = $('#teacher_description').val();
        var gender =       $('#teacher_gender').val();
        if(formAddTeacher.valid()){
            $.ajax({
                type : "post",
                url : "api/create-teacher",
                data : {
                    name        : name,
                    address     : address,
                    mobile      : mobile,
                    birthdate    : birthdate,
                    experience  : experience,
                    certificate : certificate,
                    description : description,
                    gender      : gender

                },
                success : function(response){
                    $('#modal-create-teacher').modal('hide');
                    $('#modal-create-teacher').on('hidden.bs.modal', function(){
					    $(this).find('form')[0].reset();
					});
                    tableTeacher.ajax.reload();
                    toastr.success('Thêm giáo viên thành công!');
                },
                error : function(error){
                    console.log(error);
                }
            });
        }
    });
   
    $(document).on('click','.editTeacher',function(){
        var id = $(this).attr('teacherID');
        $('#get_edit_teacher_id').val(id);
        $.ajax({
            method : "get",
            url : "api/edit-teacher",
            data : {id : id},
            success : function(response){
                $('#modal-edit-teacher').modal('show');
                $('#edit_teacher_name').val(response['data'][0].name);
                $('#edit_teacher_address').val(response['data'][0].address);
                $('#edit_teacher_mobile').val(response['data'][0].mobile);
                $('#edit_teacher_birthdate').val(response['data'][0].birthdate);
                $('#edit_teacher_experience').val(response['data'][0].experience);
                $('#edit_teacher_certificate').val(response['data'][0].certificate);
                $('#edit_teacher_description').val(response['data'][0].description);
                $('#edit_teacher_gender').val(response['data'][0].gender);
            },
            error : function(error){
                toast.error('Có lỗi xảy ra');
            }

            
        });

    });
    $('.button-edit-teacher').click(function(e){
        e.preventDefault();
        var name = $('#edit_teacher_name').val();
        var address = $('#edit_teacher_address').val();
        var mobile = $('#edit_teacher_mobile').val();
        var birthdate = $('#edit_teacher_birthdate').val();
        var experience = $('#edit_teacher_experience').val();
        var certificate = $('#edit_teacher_certificate').val();
        var description = $('#edit_teacher_description').val();
        var gender =       $('#edit_teacher_gender').val();
        var teacher_id = $('#get_edit_teacher_id').val();
        
        if(formEditTeacher.valid()){
            $.ajax({
                method : "post",
                url : "api/update-teacher",
                data : {
                    id : teacher_id,
                    name: name,
                    address : address,
                    mobile : mobile,
                    birthdate : birthdate,
                    experience :experience,
                    certificate :certificate,
                    description : description,
                    gender : gender
                },
                success : function(response){
                    $('#modal-edit-teacher').modal('hide');
                    tableTeacher.ajax.reload();
                    toastr.success('Sửa thông tin giáo viên thành công !');
                },
                error : function(error){
                    toastr.error('Có lỗi xảy ra!');
                }
            });
           
        }
    });

    $(document).on('click','.deleteTeacher',function(){
        var teacher_id = $(this).attr('teacherID');
        swal({
             title: "Bạn có muốn?",
             text: "xóa giáo viên này?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
        .then((willDelete) => {
             if (willDelete) {
                    $.ajax({
                       url: "api/delete-teacher",
                       method:"post",
                       data:{id:teacher_id},
                       success:function(response){
                           if(response.code==1){
                               toastr.success(response.message);
                               tableTeacher.ajax.reload();
                           }else
                               toastr.error(response.message);
                       }
                   });
             }else {
             }
           });
    });
   
});