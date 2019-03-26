$(function(){
    var student_id = $('#get_id_student_lll').val();
    console.log(student_id);
    // console.log('abc');
    function getTimeEnd(data, type, row) {
        var d = moment(data.time_start,'HH:mm:ss').add(data.duration,'hour').format('HH:mm:ss');
        return d;
    }
    var tableRegistrationClass = $('#list_registration_class').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        ajax: {
            method : 'get',
            url: 'api/get-list-registration-class',
            data : {student_id : student_id},
            dataSrc: 'data',
        },
        columns: [
            {data:null},
            { data: "name" , name:"name"},
            { data: "class_code", name:"class_code" },
            { data: "teacher_name", name:"teacher_name" },
            { data: "class_size", name:"class_size" },
            { data:  "start_date", name:"start_date"},
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
                data:"room_name",name:"room_name"
            },
            { data: "time_start" , name:"time_start"},
            {data:getTimeEnd},
            {
                "render":function(data, type, row) 
                {
                   
                  return "Đang tuyển sinh";
                    
                }
          
            },
            {
              "render":function(data, type, row) 
                {
                    // if(role_id==2) {
                    //     return '<button type="button" class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                    //     <button type="button" class_id="'+row.id+'" title="Xem danh sách kì thi" class=" show-list-exams btn btn-info"><i class="fa fa-graduation-cap" aria-hidden="true"></i> \
                    //     ' 
                    // }
                  
                    return '<button type="button" class_id_registration="'+row.id+'" class="registration-class btn btn-primary"><i class="fa fa-key" title="Đăng kí lớp"></i></button>\
                    '
                    
                }
            }
        ]
     
    });
    tableRegistrationClass.on( 'order.dt search.dt', function () {
        tableRegistrationClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    $(document).on('click','.registration-class',function(){
        // var student_id = $('#get_student_id').val();
        var class_id = $(this).attr('class_id_registration');
        $.ajax({
            type: 'post',
            url: 'api/add-student-to-class',
            data: {student_id:student_id,class_id:class_id},
            success: function(response){
                if(response.code == 1){
                         $('#list-class').modal('hide');
                         toastr.success("Đăng kí thành công!");
                    tableRegistrationClass.ajax.reload();
                }else{
                	toastr.error('Lịch học bị trùng hoặc học sinh đã có trong lớp')
                }
            }
        });
    });

    //Xem danh sach lop da dang ki
    $('.show-list-class-registed').click(function(){
        $('#list_class_registed').modal('show');
        var tableListClassRegisted = $('#table_list_registration_class').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0,
            } ],
            "order": [[ 1, 'asc' ]],
            paging: false,
            "bDestroy": true,
            ajax: {
                method : 'get',
                url: 'api/get-list-class-registed',
                data : {student_id : student_id},
                dataSrc: 'data',
            },
            columns: [
                {data:null},
                { data: "name" , name:"name"},
                { data: "class_code", name:"class_code" },
                { data: "class_size", name:"class_size" },
                { data:  "start_date", name:"start_date"},
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
                {data:getTimeEnd},
                {
                  "render":function(data, type, row) 
                    {
                        return '<button type="button" class_id_registed="'+row.id+'" class="cancel-registed-class btn btn-danger"><i title="Hủy lớp" class="fa fa-trash-o" aria-hidden="true"></i></button>\
                        '  
                    }
                }
            ]
         
        });
        tableListClassRegisted.on( 'order.dt search.dt', function () {
            tableListClassRegisted.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        $(document).on('click','.cancel-registed-class',function(){
            var class_id = $(this).attr('class_id_registed');
            swal({
              title: "Bạn có muốn?",
              text: "hủy lớp này?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                     $.ajax({
                        url: "api/delete-class-registed",
                        method:"GET",
                        data:{student_id:student_id,class_id:class_id},
                        success:function(response){
                            if(response.code==1){
                                tableListClassRegisted.ajax.reload();
                                tableRegistrationClass.ajax.reload();
                                toastr.success(response.message);
                            }else
                                 toastr.error(response.message);
                        }
                    });
              }
            });
        })
    })
})

