$(function(){
    var user_id = $('#get_teacher_id').val();
    var teachers_id;
    $.ajax({
        method : "post",
        url : 'api/get-teacher-name-by-user',
        data : { 
            user_id : user_id
        },
        success : function(response){
            var teachers_id;
            teachers_id = response.data[0].teacher_id;
            // getTeacherID(teachers_id);
            var tableTeacherClass = $('#list_class_of_teacher').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                ajax: {
                    url: 'api/get-class-list-of-teacher',
                    data : {teacher_id :teachers_id},
                    dataSrc: 'data',
                },
                columns: [
                    {data:null},
                    { data: "name" , name:"name"},
                    { data: "class_code_teacher_class", name:"class_code" },
                    { data: "teacher_name_teacher_class", name:"teacher_name" },
                    { data: "class_size_teacher_class", name:"class_size" },
                    { data:  "start_date_teacher_class", name:"start_date"},
                    { data: "class_size_teacher_class", name:"class_size" },
                    { data:  "start_date_teacher_class", name:"start_date"},
                    { data:  "start_date_teacher_class", name:"start_date"},
                    { data: "class_size_teacher_class", name:"class_size" },
                    { data:  "start_date_teacher_class", name:"start_date"},
                    // { 
                    //     render:function(data, type, row) 
                    //     {
                    //         var arr_date = (row.schedule).split(",");
                    //         var days = "";
                    //         for(var i=0;i<arr_date.length-1;i++){
                    //             switch(Number(arr_date[i])){
                    //                 case 0:
                    //                     day = "Chủ nhật";
                    //                     break;
                    //                 case 1:
                    //                     day = "Thứ hai";
                    //                     break;
                    //                 case 2:
                    //                     day = "Thứ ba";
                    //                     break;
                    //                 case 3:
                    //                     day = "Thứ tư";
                    //                     break;
                    //                 case 4:
                    //                     day = "Thứ năm";
                    //                     break;
                    //                 case 5:
                    //                     day = "Thứ sáu";
                    //                    break;
                    //                 case 6:
                    //                     day = "Thứ bảy";
                    //                     break;
                    //             }
                    //             days+=day+" ";
        
                    //         }
                    //         return days;
                            
                    //     }
                    // },
                    // { data: "time_start" , name:"time_start"},
                    // {
                    //     "render":function(data, type, row) 
                    //     {
                    //         switch(row.status){
                    //             case 0:   
        
                    //                 return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                    //                             <option value="0" selected>Đang tuyển sinh</option>\
                    //                             <option value="1">Đang học</option>\
                    //                             <option value="2">Đã kết thúc</option>\
                    //                             <option value="3">Tạm dừng</option>\
                    //                         </select>'+
                    //                         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                    //                 break;
                    //             case 1:
                    //                 return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                    //                             <option value="0" >Đang tuyển sinh</option>\
                    //                             <option value="1" selected>Đang học</option>\
                    //                             <option value="2">Đã kết thúc</option>\
                    //                             <option value="3">Tạm dừng</option>\
                    //                         </select>'+
                    //                         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                    //                 break;
                    //             case 2:
                    //                 return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                    //                             <option value="0" selected>Đang tuyển sinh</option>\
                    //                             <option value="1">Đang học</option>\
                    //                             <option value="2" selected>Đã kết thúc</option>\
                    //                             <option value="3">Tạm dừng</option>\
                    //                         </select>'+
                    //                         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                    //                 break;
                    //             case 3:
                    //                 return '<select class="change-s" class_id="'+row.id+'" id="'+row.id+'">\
                    //                             <option value="0" selected>Đang tuyển sinh</option>\
                    //                             <option value="1">Đang học</option>\
                    //                             <option value="2">Đã kết thúc</option>\
                    //                             <option value="3" selected>Tạm dừng</option>\
                    //                         </select>'+
                    //                         '<input name="'+row.id+'" type="hidden" class="statuschange" value="'+row.id+'">';
                    //                 break;
                    //         }
                            
                    //     }
                  
                    // },
                    // {
                    //   "render":function(data, type, row) 
                    //     {
                    //         if(role_id==2) {
                    //             return '<button type="button" class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                    //             <button type="button" class_id="'+row.id+'" title="Xem danh sách kì thi" class=" show-list-exams btn btn-info"><i class="fa fa-graduation-cap" aria-hidden="true"></i> \
                    //             ' 
                    //         }
                          
                    //         return '<button type="button" class_id1="'+row.id+'" class="add-student-class btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>\
                    //         <button type="button" class_id="'+row.id+'" class="list-student-class btn btn-danger"><i class="fa fa-address-book-o" aria-hidden="true"></i></button>\
                    //         <button type="button" class_id="'+row.id+'" class="show-timetable btn btn-success"><i title="Xem Thời Khóa Biểu" class="fa fa-book"  aria-hidden="true"></i></button>\
                    //         <button type="button" class_id="'+row.id+'" title="Xem danh sách kì thi" class=" show-list-exams btn btn-info"><i class="fa fa-graduation-cap" aria-hidden="true"></i> \
                    //         <button class_id="'+row.id+'" type="button" class="edit-class btn btn-warning"><i title="Sửa thông tin lớp" class="fa fa-pencil-square-o" aria-hidden="true"></i></button>\
                    //         <button class_id="'+row.id+'" type="button" class=" delete-class1 btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' 
                            
                    //     }
                    // }
                ]
             
                });
                tableTeacherClass.on( 'order.dt search.dt', function () {
                tableTeacherClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                });
                }).draw();
        }
    });
    // function getTeacherID(id){
    //     return id;
    // };
    
    
    // teachers_id =getData();
    // console.log(teachers_id);
    // console.log(teacher_role_id);
  
})