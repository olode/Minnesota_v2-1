<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
@include('student-profile.includes.meta')


  <title>بوابة الطالب</title>

  @include('student-profile.includes.css')

</head>
<body class="vertical-layout vertical-content-menu content-detached-right-sidebar   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="content-detached-right-sidebar">


@include('student-profile.partials.navbar')


 
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <div class="app-content content">
    <div class="content-wrapper">

    {{--@include('student-profile.partials.header')--}}
    @include('student-profile.partials.sidebar')
      

      @yield('content')

      @include('student-profile.partials.left-sidebar')

      
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  
  @include('student-profile.partials.footer')
  @include('student-profile.includes.js')



</body>
</html>