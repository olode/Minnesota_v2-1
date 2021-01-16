<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="navbar-brand" href="/c-panel">
            <img class="brand-logo" alt="robust admin logo" src="{{asset('dashboard/app-assets/images/logo/logo-dark-sm.jpg')}}">
            <h3 class="brand-text">الجامعة الإسلامية بولاية منيسوتا</h3>
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
          
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          
        </ul>
        <ul class="nav navbar-nav float-right">
          {{--  <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span>English</span><span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
              <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item"
                href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item"
                href="#"><i class="flag-icon flag-icon-de"></i> German</a>
            </div>
          </li>  --}}
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
              <span class="badge badge-pill badge-default badge-danger badge-default badge-up">0</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                  <span class="grey darken-2">تنبهات</span>
                </h6>
                <span class="notification-tag badge badge-default badge-danger float-right m-0">0 New</span>
              </li>
              <li class="scrollable-container media-list w-100">
               

              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">عرض جميع التنبيهات</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i>
              <span class="badge badge-pill badge-default badge-info badge-default badge-up">0</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                  <span class="grey darken-2">رسائل</span>
                </h6>
                <span class="notification-tag badge badge-default badge-warning float-right m-0">0 New</span>
              </li>
              <li class="scrollable-container media-list w-100">
                
              
              
               
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">عرض جميع الرسائل</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="avatar avatar-online">
                <img style="height: 35px;" src="/uploads/students/avatars/{{ Auth::user()->avatar }}"
                alt="avatar"><i></i></span>
              <span class="user-name">{{ Auth::user()->first_name }}</span>
            </a>
            <!-- /user/{{ Auth::user()->id }}/edit/ -->
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i>ملفي الشخصي <span class="red">(قريباً)</span></a>
              {{-- <a
              class="dropdown-item" href="#"><i class="ft-mail"></i> البريد</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> جدول المهام</a> --}}
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <div class="dropdown-divider"></div><button type="submit" class="dropdown-item" ><i class="ft-power"></i> تسجيل خروج</button>
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>