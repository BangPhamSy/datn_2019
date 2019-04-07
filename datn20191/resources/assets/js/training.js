$(function(){

    var tableResultTrainingCourse = $('#show-list-result-course').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "ajax":"api/get-result-training-course",
        "bDestroy": true,
        "columns": [
            {"data":null},
            { "data": "course_code" },
            { "data": "course_name" },
            { 
                render:function(data, type, row) 
                {
                   return row.point_pass+"/"+row.total_student;
                }
            },
            { 
                render:function(data, type, row) 
                {
                    var percentage = (row.point_pass/row.total_student)*100;
                   return percentage+"%";
                }
            },
            {
              "data":function(data, type, full) 
              {
                 return '<button course_id1="'+data.course_id+'" type="button"   class="detail-result-training-class btn btn-warning"><i class="fa fa-asterisk" aria-hidden="true"></i></button>' 
              }
            }
        ]
    });
    tableResultTrainingCourse.on( 'order.dt search.dt', function () {
        tableResultTrainingCourse.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
    } ).draw();

    $(document).on('click','.detail-result-training-class',function(){
        $('.table-list-result-training-course').addClass('hidden');
        $('.table-result-training-class').removeClass('hidden');
        $('.back-result-course').removeClass('hidden');
        var course_id = $(this).attr('course_id1');

        var tableResultTrainingClass = $('#show-list-result-class').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "searching":false,
            "paging":false,
            "info":false,
            ajax:{
                method:"get",
                url:" api/get-result-training-class",
                data:{
                    course_id : course_id
                }
               
            },
            "bDestroy": true,
            "columns": [
                // {"data":null},
                { "data": "class_code" },
                { "data": "class_name" },
                { 
                    render:function(data, type, row) 
                    {
                       return row.point_pass+"/"+row.total_student;
                    }
                },
                { 
                    render:function(data, type, row) 
                    {
                        var percentage = (row.point_pass/row.total_student)*100;
                       return percentage+"%";
                    }
                }
            ]
        });
        tableResultTrainingCourse.on( 'order.dt search.dt', function () {
            tableResultTrainingCourse.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
        } ).draw();
    

    });

    $(document).on('click','.back-result-course',function(){
        $('.table-list-result-training-course').removeClass('hidden');
        $('.table-result-training-class').addClass('hidden');
        $('.back-result-course').addClass('hidden');
    })

})