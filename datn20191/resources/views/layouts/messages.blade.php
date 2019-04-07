{{-- 
@if(Auth::check())
  @if(Auth::User()->roll_id==1) --}}

  <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-success">{{count($count_notifications)}}</span>
        </a>
        <ul class="dropdown-menu">
        <li class="header">Bạn có {{count($count_notifications)}} tin nhắn mới</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              @foreach($count_notifications as $noti)
                <li><!-- start message -->
                <a href="{{asset('feedback')}}">
                    <div class="pull-left">
                    
                    </div>
                    <h4>
                      @if($noti['status']==1)
                        Admin
                      @else
                        {{$noti['sender']}}
                      @endif
                    <small><i class="fa fa-clock-o"></i>{{$noti['time_send']}}</small>
                    </h4>
                    @if($noti['status']==2)
                      <p><strong>đã trả lời bình luận</strong></p>
                    @elseif($noti['status']==0)
                      <p><strong>đã thêm một phản hồi mới</strong></p>
                    @else
                      <p><strong>Admin  đã trả lời</strong></p>
                    @endif
                  </a>
                </li>
              @endforeach
              <!-- end message -->
               {{-- <li>
                <a href="#">
                  <div class="pull-left">
                    
                  </div>
                  <h4>
                    AdminLTE Design Team
                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li> --}}
              {{-- <li>
                <a href="#">
                  <div class="pull-left">
                    
                  </div>
                  <h4>
                    Developers
                    <small><i class="fa fa-clock-o"></i> Today</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li> --}}
              {{-- <li>
                <a href="#">
                  <div class="pull-left">
                   
                  </div>
                  <h4>
                    Sales Department
                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li> --}}
              {{-- <li>
                <a href="#">
                  <div class="pull-left">
                    
                  </div>
                  <h4>
                    Reviewers
                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                  </h4>
                  <p>Why not buy a new awesome theme?</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="footer"><a href="{{asset('feedback')}}">Xem tất cả</a></li>
        </ul>
      </li>

  {{-- @endif
  @endif --}}