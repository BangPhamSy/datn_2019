$(function () {
    var tableListNoti = $('#list-notification').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "ajax":"api/get-list-notification",
      
        "columns": [
            {"data":"id"},
            { "data": "title" },
            { "data": "content" },
            { "data": "created_time" },
            {
              "data":function(data, type, full) 
              {
                return '<button type="button" class="edit-notification btn btn-warning" id_noti="'+data.id+'"><i class="fa fa-pencil-square" aria-hidden="true"></i></button> \
                <button id_noti="'+data.id+'" type="button"   class="delete-notification btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' 
              }
            }
        ]
    });
    tableListNoti.on( 'order.dt search.dt', function () {
        tableListNoti.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
    } ).draw();


    $('#button-create-new-notification').click(function(){
        $('#modal-create-new-notification').modal('show');
    });
    $(document).on('click','.submit-new-notification',function(){
        event.preventDefault();
        var title        = $('#title_noti').val();
        var content        = $('.content-new-noti').val();
        var data     = {title:title,content:content};

        $.ajax({
            url: "api/create-notification",
            method:"POST",
            data:data,
            success:function(response){
                $('.content-new-noti').val("");
                $('#title_noti').val("");
                toastr.success("Thêm thông báo thành công!");
                $('#modal-create-new-notification').modal('hide');
                tableListNoti.ajax.reload();
            }
        });
    })
    $(document).on('click','.edit-notification',function(){
        $('#modal-edit-notification').modal('show');
        var id_noti = $(this).attr('id_noti');
        $('#get_id_noti').val(id_noti);
        $.ajax({
            type:'get',
            url:'api/get-edit-notification',
            data:{id_noti:id_noti},
            success : function(res){
                // console.log(res[0]['title']);
                $('#title_noti_edit').val(res[0]['title']),
                $('.content-edit-noti').val(res[0]['content'])
            }

        })
    })

    $(document).on('click','.submit-edit-notification',function(){
        var title           = $('#title_noti_edit').val();
        var content         = $('.content-edit-noti').val(); 
        var id_noti         =  $('#get_id_noti').val();
        $.ajax({
            type:'post',
            url:'api/edit-notification',
            data:{id_noti:id_noti,title:title,content:content},
            success : function(res){
                $('.content-new-notification').val("");
                $('#title_noti').val();
                toastr.success("Chỉnh sửa thành công!");
                $('#modal-edit-notification').modal('hide');
                tableListNoti.ajax.reload();
            }

        })
        
    })

    $(document).on('click','.delete-notification',function(){
         var id_noti = $(this).attr('id_noti');
         console.log(id_noti);
         swal({
              title: "Bạn có muốn?",
              text: "xóa thông báo này?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
         .then((willDelete) => {
              if (willDelete) {
                     $.ajax({
                        url: "api/delete-notification",
                        method:"post",
                        data:{id_noti:id_noti},
                        success:function(response){
                                toastr.success("Xóa thành công");
                                tableListNoti.ajax.reload();
                        }
                    });
              }else {
              }
            });
    });
});