$(function(){
    $('.list-room').click(function(){
        $('#list-room').modal('show');
        
    })
    var tableClassRoom = $('#table-class-room').DataTable({
        "columnDefs": [ {
            "searchable": true,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "paging":true,
        "ajax":"api/get-list-name-room",
        
        "columns": [
            {"data":null},
            { "data": "name" },
        ]
    });
    tableClassRoom.on( 'order.dt search.dt', function () {
            tableClassRoom.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
    } ).draw();

    $(document).on('click','.add-list-room',function(){
        $('#modal-add-room').modal('show');
        $('#add-room').click(function(e){
            e.preventDefault();
            $name_room = $('#name_room').val();
            $.ajax({
                method : 'post',
                url : 'api/add-room',
                data : {name : $name_room},
                success : function(response){
                    if(response.code==1){
                        tableClassRoom.ajax.reload();
                        toastr.success(response.message);
                        $('#form-add-classroom')[0].reset();
                        $('#modal-add-room').modal('hide');
                    }else{
                        toastr.error(response.message);
                    }
                   
                }
            })
        })
    })
//Tra cuu
    $('.search-room-by-day').click(function(){
        $('.press-day-search').removeClass('hidden');
        $('.press-room-search').addClass('hidden');
        $('.table-list-class-room-by-room').addClass('hidden');
    });
    $('.search-room-by-room').click(function(){
        $('.press-room-search').removeClass('hidden');
        $('.press-day-search').addClass('hidden');
        $('.table-list-class-room').addClass('hidden');
        $('#select_name_room').empty();
        $.ajax({
            dataType : 'json',
            type : 'get',
            url : 'api/get-list-name-room',
            success:function(response){
                $.each(response.data, function () {
                    $("#select_name_room").append("<option  value="+this.id+">"+this.name+"</option>")
                });
            }
        });
    });
    $(document).on('change','#select_name_room',function(e){
        var classroom_id = $('#select_name_room').val();
        console.log(classroom_id);
        $('.table-list-class-room-by-room').removeClass('hidden');
        function getTimeEnd1(data, type, row) {
            var d = moment(data.time,'HH:mm:ss').add(data.duration,'hour').format('HH:mm:ss');
            return d;
        }
        var tableClassRoomAfterSearch = $('#list-class-room-by-room').DataTable({
            "columnDefs": [ {
                "searchable": true,
                "orderable": false,
                "targets": 0
            } ],
            // "order": [[ 1, 'asc' ]],
            paging:true,
            showing :false,
            searching : false,
            info : false,
            "bDestroy": true,
            ajax:{
                url :  "api/get-class-room-by-date",
                data : {classroom_id:classroom_id}
            },
            "columns": [
                {"data":null},
                {"data": "class_name"},
                {"data":"date"},
                {"data":"time"},
                {"data":getTimeEnd1}
            ]
        });
        tableClassRoomAfterSearch.on( 'order.dt search.dt', function () {
            tableClassRoomAfterSearch.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
        }).draw();
        // tableClassRoomAfterSearch.ajax.reload();
    });
    $(document).on('change','#time_search',function(){
        var date = $('#time_search').val();
        var splitDate = date.split("-");  
        var convertDate = splitDate[2]+ "/" +splitDate[1]+ "/" +splitDate[0];
        // var convertDate = date("d-m-y", strtotime(date));
        console.log(convertDate);
        // $.ajax({
        //     url: "api/get-class-room-by-date",
        //     data: {
        //         date : date
        //     },
        //     success: function(response){
        $('.table-list-class-room').removeClass('hidden');
        // $('.add-text-date').append(convertDate);
        //         console.log(response[0]['name']);
        function getTimeEnd1(data, type, row) {
            var d = moment(data.time,'HH:mm:ss').add(data.duration,'hour').format('HH:mm:ss');
            return d;
        }
                var tableClassRoomAfterSearch = $('#list-class-room').DataTable({
                    "columnDefs": [ {
                        "searchable": true,
                        "orderable": false,
                        "targets": 0
                    } ],
                    // "order": [[ 1, 'asc' ]],
                    paging:false,
                    showing :false,
                    searching : false,
                    info : false,
                    "bDestroy": true,
                    ajax:{
                        url :  "api/get-class-room-by-date",
                        data : {date:date}
                    },
                    "columns": [
                        {"data":null},
                        {"data": "name"},
                        {"data":"time"},
                        {"data":getTimeEnd1}
                    ]
                });
                tableClassRoomAfterSearch.on( 'order.dt search.dt', function () {
                    tableClassRoomAfterSearch.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                }).draw();
                // console.log(response);
            // }
        // });
    });
    // $(document).on('click','.delete-class1',function(){
    // $('#add-list-room').click(function(){
    //    console.log('ssss');
    // })
})