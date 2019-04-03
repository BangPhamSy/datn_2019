<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin/image/user.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::User()->name}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Danh mục</li>
            @if(Auth::User()->role_id==1)
                  <li class="">
                  <a href="{{asset('statistic')}}">
                      <i class="fa fa-dashboard"></i> <span>Thống kê</span>
                    </a>
                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span>Quản lý nhân viên</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{asset('staff/list')}}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
                      <li><a href="{{asset('staff/add')}}"><i class="fa fa-circle-o"></i> Thêm nhân viên</a></li>
                    </ul>
                  </li>
                  <li class="">
                      <a href="{{ asset('revenue') }}">
                      <i class="fa fa-money" aria-hidden="true"></i>
                      <span>Quản lý doanh thu</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{asset('teacher')}}">
                      <i class="fa fa-female" aria-hidden="true"></i>
                      <span>Quản lý giáo viên</span>
                    </a>
                    {{-- <ul class="treeview-menu">
                      <li><a href="{{asset('teacher/list')}}"><i class="fa fa-circle-o"></i> Danh sách giáo viên</a></li>
                      <li><a href="{{asset('teacher/add')}}"><i class="fa fa-circle-o"></i> Thêm giáo viên</a></li>
                    </ul> --}}
                  </li>
                  <li class="">
                    <a href="{{ asset('course') }}">
                      <i class="fa fa-book" aria-hidden="true"></i>
                      <span>Quản lý khóa học</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ asset('class') }}">
                      <i class="fa fa-university" aria-hidden="true"></i>
                      <span>Quản lý lớp</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ asset('student') }}">
                      <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                      <span>Quản lý học viên</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ asset('exam') }}">
                      <i class="fa fa-trophy" aria-hidden="true"></i>
                      <span>Quản lý kì thi</span>
                    </a>
                  </li>
                  <li class="">
                      <a href="{{ asset('classroom') }}">
                      <i class="fa fa-table" aria-hidden="true"></i>
                      <span>Quản lý phòng học</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ asset('holiday') }}">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <span>Danh sách ngày nghỉ lễ</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="{{ asset('holiday') }}">
                      <i class="fa fa-comments" aria-hidden="true"></i>
                      <span>Phản hồi</span>
                    </a>
                  </li>
            @elseif(Auth::User()->role_id==2)
              <li class="">
                <a href="{{ asset('class') }}">
                  <i class="fa fa-dashboard"></i> <span>Danh sách các lớp</span>
                </a>
              </li>
            @elseif(Auth::User()->role_id==3)
              <li class="">
                <a href="{{asset('registration_class')}}">
                  <i class="fa fa-tag"></i> <span>Đăng kí các lớp học</span>
                </a>
              </li>
              <li class="">
                <a href="{{asset('timetable_student')}}">
                  <i class="fa fa-list-alt"></i> <span>Xem thời khóa biểu</span>
                </a>
              </li>
              <li class="">
                <a href="{{asset('timetable_student')}}">
                  <i class="fa fa-trophy" aria-hidden="true"></i><span> Xem thành tích học tập</span>
                </a>
              </li>
              <li class="">
                <a href="{{asset('timetable_student')}}">
                  <i class="fa fa-envelope" aria-hidden="true"></i> <span> Ý kiến phản hồi</span>
                </a>
              </li>
             
              
            @endif
          </ul>
        </section>
        <!-- /.sidebar -->
      
      </aside>