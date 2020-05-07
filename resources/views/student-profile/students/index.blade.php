@extends('student-profile.layouts.master')

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
                        <th>الدكتور</th>
                        <th>موعد المحاضرة</th>
                        <th>تفاصيل المادة</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>السبت</td>
                        <td>القانون</td>
                        <td>ق١</td>
                        <td>حسام</td>
                        <td>9:50</td>
                        <td><button class="badge badge-success">عرض</button></td>
                      </tr>
                      <tr>
                        <td>الاثنين</td>
                        <td>حساب</td>
                        <td>ح٢٢</td>
                        <td>فهد</td>
                        <td>10:00</td>
                        <td><button class="badge badge-success">عرض</button></td>
                      </tr>
                      <tr>
                        <td>الاربعاء</td>
                        <td>الادراة</td>
                        <td>در٢</td>
                        <td>ابكر</td>
                        <td>8:00</td>
                        <td><button class="badge badge-success">عرض</button></td>
                      </tr>
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
                        <td>{{$student->first_name}} {{$student->second_name}} {{$student->last_name}}</td>
                  
                      </tr>
                      <tr>
                        <td>الرقم الجامعي</td>
                        <td>{{$student->special_student_id}}</td>
                     
                      </tr>
                      <tr>
                        <td>البريد الالكتروني</td>
                        <td>{{$student->email}}</td>
                      
                      </tr>
                      <tr>
                        <td>رقم الهاتف</td>
                        <td>{{$student->phone_number}}</td>
                      
                      </tr>
                      <tr>
                        <td>الفرع</td>
                        <td>{{$student->branch->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>المرحلة</td>
                        <td>{{$student->specialization->section->stage->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>القسم</td>
                        <td>{{$student->section->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>التخصص</td>
                        <td>{{$student->specialization->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>الفصل</td>
                        <td>{{'smester'}}</td>
                      
                      </tr>
                      <tr>
                        <td>إجمالي الساعات</td>
                        <td>{{$student->specialization->total_hours}}</td>
                      
                      </tr>
                      <tr>
                        <td>الساعات المكتملة</td>
                        <td>{{$student->StudentClass}}</td>
                      </tr>
                      <tr>
                        <td>الساعات المتبقية</td>
                        <td>٨٠</td>
                      </tr>
                      <tr>
                        <td>المعدل</td>
                        <td>٪٣٫٥٠</td>
                      
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


@endsection