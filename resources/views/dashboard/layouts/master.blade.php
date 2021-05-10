<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
 @include('dashboard.includes.meta')
  <title>جامعة منيسوتا</title>
  @include('dashboard.includes.css')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');
  body{
    font-family: 'Tajawal', sans-serif !important;
  }
  h1, h2, h3, h4, h5, h6, span, a, button{
    font-family: 'Tajawal', sans-serif !important;
  }
  {
    font-family: simple-line-icons !important;
  }
</style>
</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
  <!-- fixed-top-->
  <style>
    
  </style>

  @include('dashboard.partials.navbar')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
       {{-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif--}}
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