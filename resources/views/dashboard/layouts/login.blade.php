<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
 @include('dashboard.includes.meta')
  <title>جامعة منيسوتا</title>
  @include('dashboard.includes.css')

</head>
<body class="vertical-layout vertical-content-menu 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-content-menu" data-col="1-column">
  <!-- fixed-top-->
  



  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      

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