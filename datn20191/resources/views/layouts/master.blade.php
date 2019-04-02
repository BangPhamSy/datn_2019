<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page-title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/font-awesome/css/font-awesome.min.css') }}">
  {{-- datetimepicker --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/datetimepicker/jquery.datetimepicker.css') }}">
  <!-- Datatable bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/css/_all-skins.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
@if(Auth::check())
<div class="wrapper">
  
  @include('layouts.header')
  
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->

  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  @include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ asset('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        @yield('breadcrumb')
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          @yield('content')
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
@else 
  @include('layouts.403')
@endif
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/Chart.min.js')}}"></script>
{{-- momentjs --}}
<script>
  var asset = "{{asset('')}}";
  var img = "{{ asset('storage') }}/files/";
</script>
<script src="{{ asset('admin/js/moment.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
{{-- <script src="{{ asset('js/teacher_class.js') }}"></script> --}}
{{-- <script src="{{ asset('js/registration_class.js') }}"></script> --}}
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Datatable -->
<script src="{{ asset('admin/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.js')}}"></script>
@yield('js')
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  })
</script>
@yield('footer')
</body>
</html>