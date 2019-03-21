$(function(){
    var user_id = $('#get_teacher_id').val();
    $.ajax({
        method : "get",
        url : 'api/get-teacher-name-by-user',
        data : { 
            user_id : user_id
        },
        success : function(response){
            // var teachers_id;
            teachers_id = response.data.teacher_id;
            console.log(response);
            // $('#get_teacher_id2').val(teachers_id);
            var tableTeacherClass = $('#list_class_of_teacher').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],
                ajax: {
                    method : "get",
                    url: 'api/get-class-list-of-teacher',
                    data : {teacher_id :teachers_id},
                    dataSrc: 'data',
                    // success : function(res){
                    //     console.log(res);
                    // }
                },
                columns: [
                    {data:null},
                    { data: "name" ,         name:"name"},
                    { data: "class_code",    name:"class_code" },
                    { data: "class_size",    name:"class_size" },
                    { data:  "start_date",   name:"start_date"},
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
                            
                            return '<span>Đang học</span>';
                            
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
                tableTeacherClass.on( 'order.dt search.dt', function () {
                tableTeacherClass.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                });
                }).draw();
            
        }
    });
    // var abc = $('#get_teacher_id2').val();
    // console.log(abc);
    // function getTeacherID(id){
    //     return id;
    // };
    
   
    // teachers_id =getData();
    // console.log(teachers_id);
    // console.log(teacher_role_id);
  
})