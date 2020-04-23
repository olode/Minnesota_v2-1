<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
 @include('dashboard.includes.meta')
  <title>جامعة منيسوتا</title>
  @include('dashboard.includes.css')

</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  

  @include('dashboard.partials.navbar')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      

        @include('dashboard.partials.sidebar')
        <div class="content-body">

        @yield('content')

        </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  @include('dashboard.partials.footer')
  @include('dashboard.includes.js')

  
</body>
</html>