$(function(){

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 2
      })
    // function getTimeEnd1(data, type, row) {
    //     var d = moment(data.class_time_start,'HH:mm:ss').add(data.class_duration,'hour').format('HH:mm:ss');
    //     return d;
    // }
    function convertCurrency(data, type ,row){
        var currency = formatter.format(data.total_revenue);
        return currency;
    }
      var tableCourse = $('#show-list-course').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "ajax":"api/get-list-total-revenue",
        "bDestroy": true,
        "columns": [
            {"data":"id"},
            { "data": "code" },
            { "data": "name" },
            { 
                "data":function(data, type, full) 
                {
                    if(data.level==0){
                        return "Cơ bản";
                    }else
                        return "Nâng cao";
                }
            },
            { "data": "curriculum" },
            { "data": "duration" },
            { "data":"students"},
            { "data": convertCurrency },
            {
              "data":function(data, type, full) 
              {
                 return '<button course_id="'+data.id+'" type="button"   class="detail-revenue btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></button>' 
              }
            }
        ]
    });
    tableCourse.on( 'order.dt search.dt', function () {
            tableCourse.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
    } ).draw();

    // $(document).on('click','.show-revenue',function(){
    //     var course_id = $(this).attr('course_id');
    //     $.ajax({
    //         url : 'api/get-list-revenue',
    //         data:{course_id : course_id},
    //         success: function(response){
    //             var currency = formatter.format(response);
    //             toastr.info("Doanh thu của khóa học hiện tại là : "+currency);
    //         }
    //     })
    // });
    $(document).on('click','.detail-revenue',function(){
        $('.table-list-course').addClass('hidden');
        function totalFeeClass(data, type, row){
            var convertCurrency = formatter.format(data.total_revenue_class);
            return convertCurrency;
        }
        function showClassSize(data,type,row){
            var students = data.students;
            return students+"/"+data.class_size;
        }
        var course_id =$(this).attr('course_id');
        var tableRevenueClass = $('#show-revenue-class').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            ajax:{
                url: 'api/get-list-revenue-class',
                data:{course_id:course_id}
            },
            "bDestroy": true,
            "columns": [
                // { "data":null},
                { "data": "class_name" },
                { "data": showClassSize },
                { "data": "start_date" },
                { "data":totalFeeClass },
            ]
        });
        tableCourse.on( 'order.dt search.dt', function () {
                tableCourse.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
        } ).draw();
        $('.table-revenue-class').removeClass('hidden');
        $('.back').removeClass('hidden');
        $('.back').click(function(){
            $('.table-revenue-class').addClass('hidden');
        })
        
        
        
    });
    $(document).on('click','.back',function(){
        $('.table-list-course').removeClass('hidden');
        $('.back').addClass('hidden');
    })
        
})