<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{route('c-panel')}}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">الرئيسية</span></a>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المستخدمين</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('user.index')}}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المستخدمين</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('user.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('user.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>


            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الطلاب</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('student.index')}}"><i class="icon-graduation"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الطلاب</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('student.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('student.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المعلمين</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('teacher.index')}}"><i class="icon-briefcase"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المعلمين</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('teacher.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('teacher.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
                <li><a class="menu-item" href="{{route('studentmark.create')}}" data-i18n="nav.dash.project">اضافة الدرجات</a>
                </li>
              </li>
              <li><a class="menu-item" href="{{route('studentmark.index')}}" data-i18n="nav.dash.project">عرض درجات الطلاب</a>
              </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الفروع</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>

            <li class=" nav-item"><a href="{{route('branche.index')}}"><i class="icon-globe"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الفروع</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('branche.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('branche.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المرحلة</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('stage.index')}}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المراحل الدراسية</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('stage.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('stage.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الاقسام</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('section.index')}}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الأقسام</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('section.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('section.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">التخصصات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('specialization.index')}}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة التخصصات</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('specialization.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('specialization.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الفصول</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('semester.index')}}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الفصول</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('semester.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('semester.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">المواد</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('material.index')}}"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة المواد</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('material.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('material.create')}}" data-i18n="nav.dash.project">اضافة</a>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">الصفوف</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('class.index')}}"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة الصفوف</span></a>
              <ul class="menu-content">
                <li ><a class="menu-item" href="{{route('class.index')}}" data-i18n="nav.dash.analytics">عرض</a>
                </li>
                <li><a class="menu-item" href="{{route('class.create')}}" data-i18n="nav.dash.project">اضافة</a>
                </li>
              </ul>
            </li>

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts">التعيينات</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="{{route('studentclass.index')}}"><i class="icon-book-open"></i><span class="menu-title" data-i18n="nav.dash.main">ادارة التعيينات</span></a>
              <ul class="menu-content">
                {{--  <li >
                  <a class="menu-item" href="{{route('marktype.create')}}" data-i18n="nav.dash.analytics">تعيين خانة درجة</a>
                </li>  --}}
                <li>
                  <a class="menu-item" href="{{route('studentclass.create')}}" data-i18n="nav.dash.project">تعيين مواد لطالب</a>
                </li>
                </li>
                <li>
                  <a class="menu-item" href="{{route('studentclass.index')}}" data-i18n="nav.dash.project">عرض مواد الطالب</a>
                </li>
              </ul>
            </li>


            {{--  <li class=" navigation-header">
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
            </li>  --}}

            <li class=" navigation-header">
              <span data-i18n="nav.category.layouts"></span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip"
              data-placement="right" data-original-title="Layouts"></i>
            </li>


          </ul>
        </div>
      </div>