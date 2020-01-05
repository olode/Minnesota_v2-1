@extends('student-profile.layouts.master')

@section('content')


      
<div class="content-detached content-left">
<div class="content-body">


<div class="row">
  <div class="col-xl-3 col-md-3 col-sm-3">
    <a href="{{route('student-shwo-marks')}}">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">الموارد البشرية</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3">
    <a href="">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">الحاسب</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3">
    <a href="">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">الاقتصاد الاسلامي</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3">
    <a href="">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">الادارة المالية</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3">
    <a href="">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">القانون الاقتصادي</p>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>



        
          
        </div>
      </div>


@endsection