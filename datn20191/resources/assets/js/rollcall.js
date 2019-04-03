$(document).on('click','.rollCallPage', function(){
    var timetable_id = $(this).attr('timetableID');
    $('.get_timetable_id').val(timetable_id);
    $('.table-timetable').addClass('hidden');
    $('.back-class').addClass('hidden');
    $('.table-rollcall').removeClass('hidden');
    var tableRollCall = $('#table-rollcall').DataTable({
    	"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        ajax: {
	        url: 'api/get-list-roll-call-student',
	        data: {timetable_id:timetable_id},
	        dataSrc: 'data',
        },
        "bDestroy":true,
	    columns: [
            { data: null},
            { data: 'student_code',name:'student_code'},
            { data: 'name',name:'name'},
            {
                'render': function (data, type, row) {
                	let tmp = (row.status == 0)  ? 'checked': "";
                	let tmp1 = (row.status == 1) ? 'checked': "";
                	let tmp2 = (row.status == 2) ? 'checked': "";
                	let tmp3 = (row.status == 3) ? 'checked': "";
                    return '<label class="container1">Đ'+
                        '<input class="rol" studentID=\"'+row.id+'\" '+tmp+' value="0" type="radio" name=\"'+row.id+'\">'+
                        '<span class="checkmark"></span>'+
                        '</label>'+
                        '<label class="container1">P'+
                        '<input class="rol" studentID=\"'+row.id+'\" '+tmp1+' value="1" type="radio" name=\"'+row.id+'\">'+
                        '<span class="checkmark"></span>'+
                        '</label>'+
                        '<label class="container1">M'+
                        '<input class="rol" studentID=\"'+row.id+'\" '+tmp2+' value="2" type="radio" name=\"'+row.id+'\">'+
                        '<span class="checkmark"></span>'+
                        '</label>'+
                        '<label class="container1">V'+
                        '<input class="rol" studentID=\"'+row.id+'\" '+tmp3+' value="3" type="radio" name=\"'+row.id+'\">'+
                        '<span class="checkmark"></span>'+
                        '</label>';
                }
            },
            {
                'render': function (data, type, row) {
                    if (row.note == null) {
                        return ''
                    }else{
                        return row.note
                    }
                }
            },
            {
                'render': function (data, type, row) {
                return '<button rolID="'+row.rol_id+'" class="show-note btn btn-success" '+
                'title="Nhập ghi chú">'+
                '<i class="fa fa-newspaper-o" aria-hidden="true"></i></button>'
                }
            },
        ]
    });
    
    tableRollCall.on( 'order.dt search.dt', function () {
        tableRollCall.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    $(document).on('click','.show-note',function(){
        $('#enter-note').modal('show');
        var id = $(this).attr('rolID');
        $('#rollID').val(id);
        console.log(id);
        
        
    });
    $(document).on('click','.back-timetable',function(){
        $('.table-timetable').removeClass('hidden');
        $('.back-class').removeClass('hidden');
        $('.table-rollcall').addClass('hidden');
    });

    $('#update-note').click(function(e){
        e.preventDefault();
        var note = $('#note1').val();
        var id = $('#rollID').val();
        console.log(note);
        $.ajax({
            type: "POST",
            url: "api/update-note",
            data: {id:id,note:note},
            success: function(response){
                if (response.code == 0) {
                    toastr.error(response.message)
                }else{
                    $('#enter-note').modal('hide');
                    $('#enter-note').on('hidden.bs.modal', function(){
                        $(this).find('form')[0].reset();
                    });
                    tableRollCall.ajax.reload();
                    toastr.success('Thêm ghi chú thành công');
                }
            }
        });
    });
    
   
});
$(document).on('change','.rol',function(e){
    e.preventDefault();
    var timetable_id = $('.get_timetable_id').val();
    var student_id = $(this).attr('studentID');
    var status = $('input[name='+student_id+']:checked').val();
    $.ajax({
        type: "POST",
        url: "api/roll-call-student",
        data: {status:status,student_id:student_id,timetable_id:timetable_id},
        success: function(response){
            // $('#table-rollcall').ajax.reload();
        }
    });
});
// var timetable_id = $(this).attr('timetableID');


// $(function(){
//     var timetable_id = localStorage.getItem("idOfTimetable");
	// var tableRollCall = $('#table-rollcall').DataTable({
    // 	"columnDefs": [ {
    //         "searchable": false,
    //         "orderable": false,
    //         "targets": 0
    //     } ],
    //     "order": [[ 1, 'asc' ]],
    //     ajax: {
	//         url: 'api/get-list-roll-call-student',
	//         data: {timetable_id:timetable_id},
	//         dataSrc: 'data',
    //     },
    //     "bDestroy":true,
	//     columns: [
    //         { data: null},
    //         { data: 'student_code',name:'student_code'},
    //         { data: 'name',name:'name'},
    //         {
    //             'render': function (data, type, row) {
    //             	let tmp = (row.status == 0)  ? 'checked': "";
    //             	let tmp1 = (row.status == 1) ? 'checked': "";
    //             	let tmp2 = (row.status == 2) ? 'checked': "";
    //             	let tmp3 = (row.status == 3) ? 'checked': "";
    //                 return '<label class="container1">Đ'+
    //                     '<input class="rol" studentID=\"'+row.id+'\" '+tmp+' value="0" type="radio" name=\"'+row.id+'\">'+
    //                     '<span class="checkmark"></span>'+
    //                     '</label>'+
    //                     '<label class="container1">P'+
    //                     '<input class="rol" studentID=\"'+row.id+'\" '+tmp1+' value="1" type="radio" name=\"'+row.id+'\">'+
    //                     '<span class="checkmark"></span>'+
    //                     '</label>'+
    //                     '<label class="container1">M'+
    //                     '<input class="rol" studentID=\"'+row.id+'\" '+tmp2+' value="2" type="radio" name=\"'+row.id+'\">'+
    //                     '<span class="checkmark"></span>'+
    //                     '</label>'+
    //                     '<label class="container1">V'+
    //                     '<input class="rol" studentID=\"'+row.id+'\" '+tmp3+' value="3" type="radio" name=\"'+row.id+'\">'+
    //                     '<span class="checkmark"></span>'+
    //                     '</label>';
    //             }
    //         },
    //         {
    //             'render': function (data, type, row) {
    //                 if (row.note == null) {
    //                     return ''
    //                 }else{
    //                     return row.note
    //                 }
    //             }
    //         },
    //         {
    //             'render': function (data, type, row) {
    //             return '<button rolID="'+row.rol_id+'" class="show-note btn btn-success" '+
    //             'title="Nhập ghi chú">'+
    //             '<i class="fa fa-newspaper-o" aria-hidden="true"></i></button>'
    //             }
    //         },
    //     ]
    // });
    
    // tableRollCall.on( 'order.dt search.dt', function () {
    //     tableRollCall.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // } ).draw();

    // $(document).on('change','.rol',function(e){
    //     e.preventDefault();
    //     var student_id = $(this).attr('studentID');
    //     var status = $('input[name='+student_id+']:checked').val();
    //     $.ajax({
    //         type: "POST",
    //         url: "api/roll-call-student",
    //         data: {status:status,student_id:student_id,timetable_id:timetable_id},
    //         success: function(response){
    //             tableRollCall.ajax.reload();
    //         }
    //     });
    // });

    // $(document).on('click','.show-note',function(){
    //     $('#enter-note').modal('show');
    //     var id = $(this).attr('rolID');
    //     $('#rollID').val(id);
    //     console.log(id);
        
        
    // });

    // $('#update-note').click(function(e){
    //     e.preventDefault();
    //     var note = $('#note1').val();
    //     var id = $('#rollID').val();
    //     console.log(note);
    //     $.ajax({
    //         type: "POST",
    //         url: "api/update-note",
    //         data: {id:id,note:note},
    //         success: function(response){
    //             if (response.code == 0) {
    //                 toastr.error(response.message)
    //             }else{
    //                 $('#enter-note').modal('hide');
    //                 $('#enter-note').on('hidden.bs.modal', function(){
    //                     $(this).find('form')[0].reset();
    //                 });
    //                 tableRollCall.ajax.reload();
    //                 toastr.success('Thêm ghi chú thành công');
    //             }
    //         }
    //     });
    // })

// })