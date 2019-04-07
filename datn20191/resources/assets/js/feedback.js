$(function(){
    var role_id = $('#get_role_id').val();
    var user_id = $('#get_user_id').val();
    var data;
    if(role_id==3){
        data={user_id:user_id}
    }
    console.log(role_id);
    var tableFeedBack= $('#list-feedback').DataTable({
    	"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        ajax: {
	        url: 'api/list-feedback',
            data : data
	    },
	    columns: [
            { data: null},
            { data: 'sender'},
            { data:'email'},
            { data: 'time_send'},
            {
                render : function(data,type,row){
                    if(role_id==1){
                        if(row.status==1){
                            return '<button class="btn btn-success"><i class="fa fa-reply" aria-hidden="true"></i> Đã trả lời</button>';
                           
                        }else if(row.status==0){
                            return '<button class="btn btn-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> Phản hồi mới</button>';
                        }else{
                            return '<button class="btn btn-danger"><i title="Đã gửi" class="fa fa-paper-plane" aria-hidden="true"></i> Gửi đến</button>';
                        }
                    }else if(role_id==3){
                        if(row.status==2){
                            return '<button class="btn btn-success"><i title="Đã gửi" class="fa fa-paper-plane" aria-hidden="true"></i> Đã gửi đi</button>';
                           
                        }else if(row.status==1){
                            return '<button class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Đã trả lời</button>';
                        }
                    }
                   
                    

                    
                }
            },
            {
                // 'data': null,
                render: function (data, type, row) {
                    return '<button feedbackID=\"'+row.id+'\" title=\"Xem chi tiết\" '+
                    'class=\"show-detail-feedback btn btn-primary\"><i class=\"fa fa-commenting\" '+
                    'aria-hidden=\"true\"></i></button>'
                }
            },
        ]
    });
    tableFeedBack.on( 'order.dt search.dt', function () {
        tableFeedBack.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
   

    $('#button-create-new-feedback').click(function(){
        $('#modal-create-new-feedback').modal('show');
        $('.submit-new-feedback').click(function(){
            var content =  $('.content-new-feedback').val();
            $.ajax({
                method : 'post',
                url:'api/create-feedback',
                data:{
                    content:content,
                    user_id : user_id
                },
                success : function(response){
                    $('.content-new-feedback').val("");
                    // $('#modal-create-new-feedback').modal('close');
                    toastr.success("Phản hồi đã được gửi đến ban quan trị để xem xét!");
                }
            })
        })
        
    });

    $(document).on('click','.show-detail-feedback',function(){
        // $('#modal-create-new-feedback').modal('close');
        $('#modal-show-detail-feedback').modal('show');

        var feedback_id = $(this).attr('feedbackID');
        // $('#get-feedback-id').val(feedback_id);
        var tableDetailFeedBack= $('#list-detail-feedback').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0,
                
            } ],
            // "order": [[ 1, 'desc' ]],
            paging: false,
            "info":false,
            "bDestroy": true,
            "searching": false,
            "order": [],
            ajax: {
                method:'get',
                url: 'api/show-detail-feedback',
                data : {feedback_id:feedback_id}
            },
            columns: [
                {data:null},
                { 
                    render:function(data,type,row){
                        return '<strong>'+row.sender1+':</strong>';
                    }
                },
                { data:'content'},
                { data: 'created_at'}
            ]
        });
        
        tableDetailFeedBack.on( 'order.dt search.dt', function () {
            tableDetailFeedBack.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        $('.submit-feedback').click(function(){
            var content = $('.content-feedback').val();
            // var user_id = user_id;
            $.ajax({
                method : 'post',
                url:'api/answer-feedback',
                data:{
                    id_feedback : feedback_id,
                    content:content,
                    user_id : user_id
                },
                success : function(response){
                    $('.content-feedback').val("");
                    tableDetailFeedBack.ajax.reload();
                    tableFeedBack.ajax.reload();
                }
            })
        });
    });

    // $(document).on('click','.submit-feedback',function(){
    //     
    // })
})