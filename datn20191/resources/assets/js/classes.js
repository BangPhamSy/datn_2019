$(function () {

    var role_id = $('#get_role').val();
    var teacher_id = $('#get_teacher_id').val();
    if(teacher_id){
        var tableClass = $('#list_class').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            ajax: {
                method : "get",
                url: 'api/get-class-list-of-teacher',
                data : {teacher_id :teacher_id},
                dataSrc: 'data'
            },
            "bDestroy":true,
            columns: [
                {data:null},
                { data: "name" ,         name:"name"},
                { data: "class_code",    name:"class_code" },
                { data: "teacher_name", name:"teacher_name" },
                { data: "class_size",    name:"class_size" },
                { data:  "start_date",   name:"start_date"},
                {data : "room_name",name:"room_name"},
                { 
                    render:function(data, type, row) 
                    {
                        var arr_date = (row.schedule).split(",");
                        var days = "";
                        for(var i=0;i<arr_date.length-1;i++){
                            switch(Number(arr_date[i])){
                                case 0:
                                    day = "Chủ nhật";
                                    break;
                                case 1:
                                    day = "Thứ hai";
                                    break;
                                case 2:
                                    day = "Thứ ba";
                                    break;
                                case 3:
                                    day = "Thứ tư";
                                    break;
                                case 4:
                                    day = "Thứ năm";
                                    break;
                                case 5:
                                    day = "Thứ sáu";
                                   break;
                                case 6:
                                    day = "Thứ bảy";
                                    break;
                            }
                            days+=day+" ";
    
                        }
                        return days;
                        
                    }
                },
                { data: "time_start" , name:"time_start"},
                // { data:  "status",       name:"status"},
                // { data: "action",        name:"class_size" },
                {
                    render:function(data, type, row) 
                    {
                        switch(row.status){
                            case 0 :  
                                return '<span>Đang tuyển sinh</span>';
                            case 1 :
                                return '<span>Đang học</span>';
                            case 2 :
                                return '<span>Đã kết thúc</span>';
                        }
                       
                        
                    }
                },
                // },
                {
                  "render":function(data, type, row) 
                    {
                        // if(role_id==2) {
                            return '<button type="button" class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                            <button type="button" class_id="'+row.id+'" title="Xem danh sách kì thi" class=" show-list-exams btn btn-info"><i class="fa fa-graduation-cap" aria-hidden="true"></i> \
                            ' 
                        // }
                        
                    }
                }
            ]
         
            });
            tableClass.on( 'order.dt search.dt', function () {
            tableClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
            }).draw();
    
    }else{
        
        var tableClass = $('#list_class').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            ajax: {
                url: 'api/get-list-class',
                dataSrc: 'data',
            },
            columns: [
                {data:null},
                { data: "name" },
                { data: "class_code" },
                { data: "teacher_name" },
                { data: "class_size" },
                {
                    render:function(data, type, row){
                        return row.start_date+"/"+row.end_date;
                    }
                },
                // { data:  "start_date"},
                // { data:  "end_date"},
                { 
                    render:function(data, type, row) 
                    {
                        var arr_date = (row.schedule).split(",");
                        var days = "";
                        for(var i=0;i<arr_date.length-1;i++){
                            switch(Number(arr_date[i])){
                                case 0:
                                    day = "Chủ nhật";
                                    break;
                                case 1:
                                    day = "Thứ hai";
                                    break;
                                case 2:
                                    day = "Thứ ba";
                                    break;
                                case 3:
                                    day = "Thứ tư";
                                    break;
                                case 4:
                                    day = "Thứ năm";
                                    break;
                                case 5:
                                    day = "Thứ sáu";
                                   break;
                                case 6:
                                    day = "Thứ bảy";
                                    break;
                            }
                            days+=day+" ";
    
                        }
                        return days;
                        
                    }
                },
                {
                    render:function(data, type, row)
                    {
                        return row.time_start+"-"+row.time_end;
                    }
                },
                // { data: "time_start" },
                // { data: "time_end" },
                {data:"room_name"},
                {
                    "render":function(data, type, row) 
                    {
                        switch(row.status){
                            case 0:   
                                return "Đang tuyển sinh";
                                // return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                                //             <option value="0" selected>Đang tuyển sinh</option>\
                                //             <option value="1">Đang học</option>\
                                //             <option value="2">Đã kết thúc</option>\
                                //             <option value="3">Tạm dừng</option>\
                                //         </select>'+
                                //         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                                break;
                            case 1:
                                return "Đang học"
                                // return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                                //             <option value="0" >Đang tuyển sinh</option>\
                                //             <option value="1" selected>Đang học</option>\
                                //             <option value="2">Đã kết thúc</option>\
                                //             <option value="3">Tạm dừng</option>\
                                //         </select>'+
                                //         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                                break;
                            case 2:
                                return "Đã kết thúc"
                                // return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                                //             <option value="0" selected>Đang tuyển sinh</option>\
                                //             <option value="1">Đang học</option>\
                                //             <option value="2" selected>Đã kết thúc</option>\
                                //             <option value="3">Tạm dừng</option>\
                                //         </select>'+
                                //         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                                break;
                            case 3:
                                return "Tạm dừng";
                                // return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                                //             <option value="0" selected>Đang tuyển sinh</option>\
                                //             <option value="1">Đang học</option>\
                                //             <option value="2">Đã kết thúc</option>\
                                //             <option value="3" selected>Tạm dừng</option>\
                                //         </select>'+
                                //         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                                break;
                        }
                        
                    }
              
                },
               
                {
                  "render":function(data, type, row) 
                    {
                        if(role_id==2) {
                            return '<button type="button" class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                            <button type="button" class_id="'+row.id+'" title="Xem danh sách kì thi" class=" show-list-exams btn btn-info"><i class="fa fa-graduation-cap" aria-hidden="true"></i> \
                            ' 
                        }
                    // return '<button class_id1=\"'+row.id+'\" title=\"thêm học sinh vào lớp\"'+
                    //     'class=\"btn btn-primary add-student-class\"><i class=\"fa fa-plus-square\" aria-hidden=\"true\"></i>'+
                    //     '</button> <button class_id=\"'+row.id+'\" title=\"Xem danh sách\"'+
                    //     'class=\"btn btn-danger list-student-class\"><i class=\"fa fa-address-book-o\"aria-hidden=\"true\"></i>'+
                    //     '</button> <button class_id=\"'+row.id+'\" title=\"Xem danh sách kì thi\" '+
                    //     'class=\"show-list-exams btn btn-info\"><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>'+
                    //     '</button> <button class_id=\"'+row.id+'\" title=\"Xem Thời Khóa Biểu\"'+
                    //     'class=\"show-timetable btn btn-success\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i>'+
                    //     '</button> <button class_id=\"'+row.id+'\" title=\"Xóa lớp\" '+
                    //     'class=\" delete-class1 btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i>'+
                    //     '</button> <button class_id=\"'+row.id+'\" title=\"Sửa thông tin lớp\" '+
                    //     'class=\"edit-class btn btn-warning\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></button>'
                        
                 
                 return '<button class_id1="'+row.id+'" class="add-student-class btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>\
                        <button  class_id="'+row.id+'" class="list-student-class btn btn-danger"><i class="fa fa-address-book-o" aria-hidden="true"></i></button>\
                        <button  class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                        <button  style="margin-top:5px" style="margin-top:5px" class_id="'+row.id+'" class=" show-list-exams btn btn-info"><i title="Xem danh sách kì thi" class="fa fa-graduation-cap" aria-hidden="true"></i>\
                        <button style="margin-top:5px" class_id="'+row.id+'" type="button" class="edit-class btn btn-warning"><i title="Sửa thông tin lớp" class="fa fa-pencil-square-o" aria-hidden="true"></i></button>\
                        <button style="margin-top:5px" class_id="'+row.id+'" type="button" class=" delete-class1 btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' 
                        
                    }
                }
            ]
         
        });
        tableClass.on( 'order.dt search.dt', function () {
            tableClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    }
    $('.button-add').addClass('hidden');
    // $('#timetable').addClass('hidden');
    // console.log(role_id);
    // if(role)
  

    $('#form-create-class').validate(
            {
                rules: {
                    "name": {
                        required: true
                    },
                    "class_code": {
                        required: true,
                    },
                    "schedule": {
                        required: true
                    },
                    "time_start": {
                        required: true
                    },
                    "duration": {
                        required: true,
                        number: true,
                    },
                    "class_size": {
                        required: true,
                        number: true,
                    },
                    "start_date": {
                        required: true         
                    }

                },
                messages: {
                    "name": {
                        required: "Tên lớp không được trống!"
                    },
                    "class_code": {
                        required: "Mã lớp học không được trống!",
                    },
                    "schedule": {
                        required: "Bạn chưa chọn các ngày học!"
                    },
                    "class_size": {
                        required: "Sĩ số không được bỏ trống!",
                        number : "Sĩ số phải là kiểu số",
                    },
                    "start_date": {
                        required: "Ngày  bắt đầu không được trống!",
                    },
                    "duration": {
                        required: "Thời lượng không được trống!",
                        number : "Thời lượng là kiểu số!",
                    },
                    "time_start": {
                        required: "Thời gian bắt đầu không được trống!",
                    },
                    "class_size":{
                        required: "Sĩ số không được trống!",
                        number : "Sĩ số là kiểu số!",
                    }


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
            }
    );
    $('#form-edit-class').validate(
            {
                rules: {
                    "name_edit": {
                        required: true
                    },
                    "class_code_edit": {
                        required: true,
                    },
                    "class_size_edit": {
                        required: true,
                        number: true,
                    },
                },
                messages: {
                    "name_edit": {
                        required: "Tên lớp không được trống!"
                    },
                    "class_code_edit": {
                        required: "Mã lớp học không được trống!",
                    },
                    "class_size_edit":{
                        required: "Sĩ số không được trống!",
                        number : "Sĩ số là kiểu số!",
                    }


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
            }
    );
    $("#button-create-class").click(function(){
        $('#modal-create-class').modal('show');
        $('#name_room').empty();
        $.ajax({
            dataType : 'json',
            type : 'get',
            url : 'api/get-list-name-room',
            success:function(response){
                $.each(response.data, function () {
                    $("#name_room").append("<option  value="+this.id+">"+this.name+"</option>")
                });
            }
        });
        $("#name_teacher").empty();
         $.ajax({
            dataType : 'json',
            type : 'get',
            url : 'api/get-name-teacher',
            success:function(response){
                $.each(response.data, function () {
                    $("#name_teacher").append("<option  value="+this.id+">"+this.name+"</option>")
                });
            }
        });
        $("#name_course").empty();
        $.ajax({
            dataType : 'json',
            type : 'get',
            url : 'api/get-name-course',
            success:function(response){
                $.each(response.data, function () {
                    $("#name_course").append("<option  value="+this.id+">"+this.name+"</option>")
                });
            }
        })
    });

    jQuery.datetimepicker.setLocale('vi');
    $('#start_date').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        minDate: '-1970-01-1',
    });
    $('#start_date').blur(function(){
        let a = $(this).val();
        let x = new Date(a)
        let thu = x.getDay();
        $(":checkbox[value="+thu+"]").prop("checked","true");
        $(":checkbox").not(":checkbox[value="+thu+"]").prop('checked', false);
        $(":checkbox[value="+thu+"]").prop("disabled","true");
        $(":checkbox").not(":checkbox[value="+thu+"]").prop('disabled', false);
    });

    $("#create-class").click(function(event){
        event.preventDefault();
        var name        = $('#name').val();"<br />"
        var class_code  = $('#class_code').val();
        var start_date  = $('#start_date').val();
        var duration    = $('#duration').val();
        var time_start  = $('#time_start').val();
        var teacher_id  = $('#name_teacher').val();
        var course_id   = $('#name_course').val();
        var class_size  = $('#class_size').val();
        var classroom_id = $('#name_room').val();
        var val = [];
        var schedule = "";
        $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
            schedule =schedule+val[i]+",";
        });
        // console.log(schedule);
        // console.log(classroom_id);
        // console.log(course_id);
        // console.log(teacher_id);

        if($('#form-create-class').valid()){
            
            $.ajax({
                url: "api/create-class",
                method:"POST",
                data:
                {
                    name:name,
                    class_code:class_code,
                    time_start:time_start,
                    teacher_id:teacher_id,
                    duration :duration,
                    course_id:course_id,
                    schedule:schedule,
                    start_date:start_date,
                    class_size:class_size,
                    classroom_id : classroom_id
                },
                success:function(response){
                    if(response.code==0){
                        toastr.error(response.message);
                    }else{
                        $('#form-create-class')[0].reset();
                        $("#modal-create-class").modal("hide");
                        toastr.success('Thêm lớp thành công!');
                        tableClass.ajax.reload();
                        // $('#list_class').DataTable().ajax.reload();
                    }
                }
            });
        }
    });
    
    $(document).on('click','.delete-class1',function(){
        var id = $(this).attr('class_id');
        if(id){
                swal({
                  title: "Bạn có muốn?",
                  text: "xóa lớp học này?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                         $.ajax({
                            url: "api/delete-class",
                            method:"GET",
                            data:{id:id},
                            success:function(response){
                                if(response.code==1){
                                    $('#list_class').DataTable().ajax.reload();
                                    toastr.success(response.message);
                                    
                                }else
                                    toastr.error(response.message);
                            }
                        });
                  }else {
                    tableClass.ajax.reload();
                  }
                });
             }else{
                toastr.warning('Không tìm thấy lớp học cần xóa!');
             }
    });

    $(document).on('click','.edit-class',function(){
        $('#modal-edit-class').modal('show');
        var class_id = $(this).attr('class_id');
          $.ajax({
            dataType : 'json',
            type:'get',
            url : 'api/edit-class',
            data : {id:class_id},
            success: function(response){
                // console.log(response[0].class_code);
                    $('#class_code_edit').val(response[0].class_code);
                    $('#name_edit').val(response[0].class_name);
                    $('#start_date_edit').val(response[0].start_date);
                    $('#time_start_edit').val(response[0].time_start);
                    $('#duration_edit').val(response[0].duration);
                    $('#name_room_edit').val(response[0].name_room);
                    $('#name_teacher_edit').val(response[0].teacher_name);
                    $('#class_size_edit').val(response[0].class_size);
                    $('.button-edit-class').attr('data-id',response[0].id);
            }
        });
        
    });

    $(".button-edit-class").click(function(){
        var id = $(this).attr('data-id');
        var class_code   =  $('#class_code_edit').val();
        var name  =  $('#name_edit').val();
        var class_size   =   $('#class_size_edit').val();
        var data = {id:id,class_code:class_code,name:name,class_size:class_size};
           if($("#form-edit-class").valid()){
                $.ajax({
                    type : 'post',
                    url : 'api/edit-class',
                    data : data,
                    success: function(response){
                        if(response.code==1){
                            $("#modal-edit-class").modal("hide");
                            $('#list_class').DataTable().ajax.reload();
                            toastr.success(response.message);
                        }else{
                            toastr.error(response.message);
                        }
                    }
                });
            }
     });

    $(document).on('click','.add-student-class',function(){
        $('#modal-add-student-class').modal('show');
        var class_id = $(this).attr('class_id1');
        $('#get_class_id12').val(class_id);
        var tableStudent = $('#table-student-class').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            paging: false,
            "bDestroy": true,
            ajax: {
                url: 'api/get-student-not-in-class',
                data: {class_id:class_id},
                dataSrc: 'data',
            },
            columns :[
                {data:null},
                {data:"name",name:'name'},
                {data:"address",name:'address'},
                {data:"mobile",name:'mobile'},
                {data:"birthday",name:'birthday'},
                {
                    render:function(data, type, row)
                    {
                        if(row.gender==0){
                            return "Nam";
                        }else if(row.gender==1)
                            return "Nữ";
                        else
                            return "Khác";
                    }
                },
                {
                    "data":function(data, type, full)
                    {
                        return ' <button type="button" student_id1="'+data.id+'" class="button-add-student btn btn-success">Thêm vào lớp</button>'
                    }
                },
            ]
        });
        tableStudent.on( 'order.dt search.dt', function () {
            tableStudent.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        } ).draw();
    });

    $(document).on('click','.button-add-student',function(){
        var student_id = $(this).attr('student_id1');
        var class_id = $('#get_class_id12').val();
        $.ajax({
            url : "api/add-student-to-class",
            type: "post",
            data : {class_id:class_id,student_id:student_id},
            success:function(response){
                if(response.code == 0){
                    $('#table-student-class').DataTable().ajax.reload();
                    toastr.error(response.message);
                }else{
                    $('#table-student-class').DataTable().ajax.reload();
                    toastr.success(response.message);
                }
            }
        });
    });
   
    $(document).on('click','.list-student-class',function(){
        $('#modal-list-student-class').modal('show');
        var class_id = $(this).attr('class_id');
        var tableStudentClass = $('#table-student-of-class1').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            paging: false,
            "bDestroy": true,
            ajax: {
                url: 'api/get-list-class-student',
                data: {class_id:class_id},
                DataSrc: 'data',
            },
            columns: [
                {data:null},
                {data:"name",name:'name'},
                {data:"address",name:'address'},
                {data:"mobile",name:'mobile'},
                {data:"birthday",name:'birthday'},
                {
                    render:function(data, type, row)
                    {
                            if(row.gender==0){
                                return "Nam";
                            }else if(row.gender==1)
                                return "Nữ";
                            else
                                return "Khác";
                    }
                },
                {
                    render:function(data, type, row)
                    {
                        return ' <button type="button" student_id="'+row.id+'" class="button-delete-student btn btn-danger">Xóa khỏi lớp</button>'
                    }
                },
            ]
        });
        tableStudentClass.on( 'order.dt search.dt', function () {
            tableStudentClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });

    $(document).on('click','.button-delete-student',function(){
        var student_id = $(this).attr('student_id');
            swal({
              title: "Bạn có muốn?",
              text: "xóa học sinh này?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                     $.ajax({
                        url: "api/delete-student-class",
                        method:"GET",
                        data:{id:student_id},
                        success:function(response){
                            if(response.code==1){
                                $('#table-student-of-class1').DataTable().ajax.reload();
                                toastr.success(response.message);
                            }else
                                 toastr.error(response.message);
                        }
                    });
              }
            });
         
    });
    // $(document).on('click','.show-timetable',function(){
       
    //     var class_id = $(this).attr('class_id');
    //     $('.table-class').addClass('hidden');
    //     $('#button-create-class').addClass('hidden');
    //     $('#timetable').removeClass('hidden');
    //     function getTimeEnd(data, type, row) {
    //         var d = moment(data.time,'HH:mm:ss').add(data.duration,'hour').format('HH:mm:ss');
    //         return d;
    //    }
    //    function getDayAndDate(data, type, dataToSet) {
    //        return data.date + "<br>" + data.week_days;
    //    }
    //    var id = class_id;
    //    var tableTimetable = $('#timeTableClass').DataTable({
    //        "columnDefs": [ {
    //            "searchable": false,
    //            "orderable": false,
    //            "targets": 0
    //        } ],
    //        "order": [[ 1, 'asc' ]],
    //        ajax: {
    //            url: 'api/get-list-timetable',
    //            data: {id:id},
    //            dataSrc: 'data',
    //        },
    //        "bDestroy" :true,
    //        columns: [
    //            { data: null},
    //            { data: getDayAndDate,
    //                render : function(data, type, row) {
    //                    var day;
    //                    switch (row.week_days) {
    //                        case 0:
    //                            day = "Chủ nhật";
    //                            break;
    //                        case 1:
    //                            day = "Thứ hai";
    //                            break;
    //                        case 2:
    //                            day = "Thứ ba";
    //                            break;
    //                        case 3:
    //                            day = "Thứ tư";
    //                            break;
    //                        case 4:
    //                            day = "Thứ năm";
    //                            break;
    //                        case 5:
    //                            day = "Thứ sáu";
    //                            break;
    //                        case  6:
    //                            day = "Thứ bảy";
    //                    }
    //                    return row.date + "<br>" + day;
    //                },
    //            },
    //            { data: 'time', name: 'time'},
    //            { data: getTimeEnd},
    //            {
    //                'data': null,
    //                'render': function (data, type, row) {
    //                    return '</button> <button classID=\"'+row.class_id+'\" timetableID=\"'+row.id+'\" '+
    //                    'class="rollCallPage btn btn-success" '+
    //                    'title="Điểm danh"><i class="fa fa-sticky-note" '+
    //                    'aria-hidden="true"></i></button>'
    //                }
    //            },
    //        ]
    //    });
       
    //    tableTimetable.on( 'order.dt search.dt', function () {
    //        tableTimetable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //            cell.innerHTML = i+1;
    //        } );
    //    } ).draw();
    // });
    require('./timetable.js');
    require('./examination.js');
    // $(document).on('click','.show-list-exams',function(){
    //     var class_id = $(this).attr('class_id');
    //     $('.table-class').addClass('hidden');
    //     $('#button-create-class').addClass('hidden');
    //     $('.table-exam').removeClass('hidden');
    //     window.location.href= asset+ "exam?classid="+class_id+""
    // });
    $(document).on('click','.back-class',function(){
        $('.table-class').removeClass('hidden');
        $('#button-create-class').removeClass('hidden');
        $('.timetable').addClass('hidden');
        $('.table-exam').addClass('hidden');
        // $('.button-add').addClass('hidden');
    });
    function ChangeStatus(){
        var cars = [];
        $(".statuschange").each(function() {
            cars.push($(this).val());

        });
        for(var i = 0; i <= cars.length; i++){
            let car = cars[i];
            $(document).on('change','#status_class'+car+'',function(e){
                e.preventDefault();
                var id = $(this).attr('class_id');
                let status = $('select[id=status_class'+car+']').val()
                $.ajax({
                    type: 'post',
                    url: "api/update-status-class",
                    data: {id:id,status:status},
                    success: function(response){
                        toastr.success('Cập nhật thành công');
                    }
                })
            })
        }
    }

    // window.onload = ChangeStatus;
   
   $(document).on('change','.change-s',function(e){
        e.preventDefault();
        var id = $(this).attr('class_id');
        let status = $('select[id='+id+']').val()
        $.ajax({
            type: 'post',
            url: "api/update-status-class",
            data: {id:id,status:status},
            success: function(response){
                toastr.success('Cập nhật thành công');
            }
        })
    })
});
