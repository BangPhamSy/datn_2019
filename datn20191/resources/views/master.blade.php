@extends('home')
@section('title')
	Thông báo mới
@endsection
@section('content')
    <div class="container">
        @foreach($listNoti as $list)
            <div class="row col-md-11">
                <div class="panel panel-success">
                    <div class=" title panel-heading panel-primary">{{$list->title}}</div>
                    <div class="panel-body">
                        <div class=" created_time">{{$list->created_time}}</div><br/>
                        <div class="content_noti">{{$list->content}}</div>
                    </div>
                </div>
            </div>
       
        @endforeach
       
        <!-- <div class="row col-md-11">
            <div class="panel panel-success">
                <div class=" panel-heading panel-primary">Panel Heading</div>
                <div class="panel-body">
                    <div class=" time">28/04/2019 8:50pm</div><br/>
                    <div class="content_noti">sdhsadhashdkashkasas</div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="paginate" style="text-align:center">
                {{ $listNoti->links() }}
    </div> 
@endsection
<!-- @section('js')
<script>
        $(function () {
            $.ajax({
                typeData:"json",
                url:"http://localhost/datn_2019/datn20191/public/api/get-list-notification",
                type:"get",
                success:function(res){
                    console.log(res);
                }
            })
        })
</script>
@endsection -->