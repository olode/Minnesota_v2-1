<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
@include('teacher-profile.includes.meta')


  <title>بوابة المعلم</title>

  @include('teacher-profile.includes.css')

</head>
<body class="vertical-layout vertical-content-menu content-detached-right-sidebar   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="content-detached-right-sidebar">


@include('teacher-profile.partials.navbar')


 
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <div class="app-content content">
    <div class="content-wrapper">

    {{--@include('teacher-profile.partials.header')--}}
    @include('teacher-profile.partials.sidebar')
      

      @yield('content')

      {{-- @include('teacher-profile.partials.left-sidebar') --}}

      
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  
  @include('teacher-profile.partials.footer')
  @include('teacher-profile.includes.js')



</body>
</html>