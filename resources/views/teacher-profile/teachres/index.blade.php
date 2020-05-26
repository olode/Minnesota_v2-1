@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">جدول المواد الدراسية</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                    <thead>
                      <tr>
                        <th>اليوم</th>
                        <th>اسم المادة</th>
                        <th>رمز المادة</th>
                        <th>موعد المحاضرة</th>
                        <th>عدد الطلاب</th>
                        <th>رابط القاعة</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach ($classes as $class)
                        <tr>
                          <td>{{ $class->class_day }}</td>
                          <td>{{ $class->name }}</td>
                          <td>{{ $class['material']->code }}</td>
                          <td>من {{ $class->starts_at }}  -  الى {{ $class->ends_at }}</td>
                          <td>١٠٠</td>
                          <td>
                            <a href="{{ $class->classroom_url }}" target="_blank" class="btn btn-primary" rel="noopener noreferrer">دخول</a>
                          </td>
                        </tr>    
                      @endforeach
                    </tbody>
                  </table>
                </div>
        
        <!-- Both borders end -->

                </div>
              </div>
            </div>

          </section>
          <!--/ Description -->
          <!-- CSS Classes -->
          <section id="css-classes" class="card">
            <div class="card-header">
              <h4 class="card-title">المعلومات الشخصية</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                  <p></p>
                 
                 
                  <!-- Both borders end-->
   
                  <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                    <thead>
                   
                    </thead>
                    <tbody>
                      <tr>
                        <td>الاسم</td>
                        <td>{{ Auth::guard('teacher')->user()->first_name}} {{ Auth::guard('teacher')->user()->second_name}} {{ Auth::guard('teacher')->user()->last_name}}</td>
                  
                      </tr>
                      <tr>
                        <td>البريد الالكتروني</td>
                        <td>{{ Auth::guard('teacher')->user()->email}}</td>
                      
                      </tr>
                      <tr>
                        <td>رقم الهاتف</td>
                        <td>{{ Auth::guard('teacher')->user()->phone_number}}</td>
                      
                      </tr>
                      <tr>
                        <td>الفرع</td>
                        <td>الثالث</td>
                      
                      </tr>
                      <tr>
                        <td>القسم</td>
                        <td>إدارة اعمال</td>
                      
                      </tr>

                      <tr>
                        <td>إجمالي المحاضرات في الاسبوع</td>
                        <td>٨</td>
                      
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
        
        <!-- Both borders end -->

                </div>
              </div>
            </div>
          </section>
          <!--/ CSS Classes -->

          
        </div>
      </div>

      @include('teacher-profile.partials.left-sidebar')
@endsection