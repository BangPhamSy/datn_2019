$(function(){
    var student_id = $('#get_id_student_123').val();
    var tableShowAchievement = $('#table-show-achieve').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0,
        } ],
        paging : false,
        searching :false,
        info :false,
        "order": [[ 1, 'asc' ]],
        "bDestroy":true,
        ajax: {
            url: 'api/get-achievement-student',
            data:{
                student_id : student_id
            }
        },
        columns: [
            { data: null},
            { data: 'class_code'},
            { data: 'class_name'},
            { data: 'days_absent'},
            {
                render:function(data, type, row) {
                    if(row.point_class){
                        return row.point_class;
                    }else{
                        return '<span>Chưa thi</span>';
                    }
                }
            },
            {
                render:function(data, type, row) {
                    switch(row.achieve){
                        case 0 :  
                            return '<i title="Chưa qua" class="fa fa-times btn btn-danger" aria-hidden="true"></i>';
                        case 1 :
                            return '<i title="Đã qua" class="fa fa-check btn btn-success" aria-hidden="true"></i>';
                        case 2 :
                            return '<i title="Chưa thi" class="fa fa-question-circle btn btn-warning" aria-hidden="true"></i>';
                    }
                }
                
            }
        ]
    });
    tableShowAchievement.on( 'order.dt search.dt', function () {
        tableShowAchievement.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
})