<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{route('teacher-profile.index')}}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">الرئيسية</span></a>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الاخبار والتنبيهات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="الاخبار والتنبيهات"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الاخبار والتنبيهات</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('news-announcements.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('news-announcements.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>


            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الطلاب</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-graduation"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الطلاب</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('teacher-profile-students.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('teacher-profile-assign-course')}}" data-i18n="nav.dash.project">اضافة مادة لطالب</a>
                </li>
                {{--<li><a class="menu-item" href="{{route('student-attendance')}}" data-i18n="nav.dash.project">التحضيرات</a>
                </li>--}}
              </ul>
            </li>
            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">التكليفات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة التكليفات</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('student-home-work.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('student-home-work.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li ><a class="menu-item" href="{{route('follow-up-homework.index')}}" data-i18n="nav.dash.analytics">متابعة التكليفات</a>
                </li>
              </ul>
            </li>
            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الإختبارات النهائية</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="icon-note"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الإختبارات النهائية</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('finalexam.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('finalexam.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li ><a class="menu-item" href="{{route('followupfinalexam.index')}}" data-i18n="nav.dash.analytics">متابعة الدرجات</a>
                </li>
              </ul>
            </li>
            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الإختبارات الشهرية</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="icon-note"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الإختبارات الشهرية</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('quizze.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('quizze.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li ><a class="menu-item" href="{{route('followupquizze.index')}}" data-i18n="nav.dash.analytics">متابعة الدرجات</a>
                </li>
              </ul>
            </li>
             {{--  <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الدرجات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-briefcase"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الدرجات</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('marks.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('marks.create')}}" data-i18n="nav.dash.project">اضافة انواع الدرجات</a>
                </li>
                <li><a class="menu-item" href="{{route('add-attendance-marks')}}" data-i18n="nav.dash.project">اضافة الدرجات</a>
                </li>
                 <li><a class="menu-item" href="{{route('add-mid-exam-marks')}}" data-i18n="nav.dash.project">اضافة درجات الاختبارات</a>
                </li>
                <li><a class="menu-item" href="{{route('add-final-exam-marks')}}" data-i18n="nav.dash.project">اضافة درجات الاختبار النهائي</a>
                </li>
              </ul>
            </li>  --}}
             <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المحاضرات و التحضير</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المحاضرات و التحضير</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('lectures.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('lectures.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li ><a class="menu-item" href="{{route('lecture-attendance')}}" data-i18n="nav.dash.analytics">متابعة الحضور والغياب</a>
                </li>
              </ul>
            </li>

            {{--<li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المواد</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المواد</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('materials.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('materials.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li><a class="menu-item" href="{{route('materials.index')}}" data-i18n="nav.dash.project">تعيين مواد لمعلم</a>
                </li>
                <li><a class="menu-item" href="{{route('materials.index')}}" data-i18n="nav.dash.project">تعيين مواد لطالب</a>
                </li>
              </ul>
            </li>


            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الاعلانات والتنبيهات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="icon-screen-desktop"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الاعلانات والتنبيهات</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="dashboard-analytics.html" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="dashboard-project.html" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts"></span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>--}}


          </ul>
        </div>
      </div>