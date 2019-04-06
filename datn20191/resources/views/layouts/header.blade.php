<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TTDT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Trung tâm </b>đào tạo</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @include('layouts.header')
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('admin/image/user.jpg') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{Auth::User()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('admin/image/user.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  {{Auth::User()->name}}
                </p>
                
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <a href="{{asset('/logout')}}" class="btn btn-default btn-flat">Đămg xuất</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        
      </div>
    </nav>
  </header>