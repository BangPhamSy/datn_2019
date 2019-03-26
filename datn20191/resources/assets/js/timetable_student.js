$(function(){
    var student_id2 = $('#get_id_student_123').val();
    function getDayAndDate1(data, type, dataToSet) {
	    return data.class_start_date + "<br>" + data.class_week_day;
    }
    function getTimeEnd1(data, type, row) {
        var d = moment(data.class_time_start,'HH:mm:ss').add(data.class_duration,'hour').format('HH:mm:ss');
        return d;
   }

    var timeTableStudent = $('#timeTableStudent').DataTable({
    	"columnDefs": [ {
            "orderable": false,
            "targets": 0,
            "info":  false,
        } ],
        // "order": [[ 1, 'asc' ]],
        paging: false,
        "bDestroy": true,
        "searching": false,
        ajax: {
            method : 'get',
	        url: 'api/get-list-timetable-student',
	        data: {student_id:student_id2},
	        dataSrc: 'data',
	    },
	    columns: [
            { data: null},
            {data:"class_code",name:"class_code"},
            {data:"class_name",name:"class_name"},
            {data:"teacher_name",name:"teacher_name"},
            {data:"class_start_date",name:"class_start_date"},
            { 
                render:function(data, type, row) 
                {
                    var arr_date = (row.class_schedule).split(",");
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
                        days+=day+" "+"|";

                    }
                    return days;
                    
                }
            },
            {
                data : "room_name",name : "room_name"
            },
            { data: "class_time_start", name: 'class_time_start'},
            { data: getTimeEnd1},
        ]
    });
    
    timeTableStudent.on( 'order.dt search.dt', function () {
        timeTableStudent.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
})