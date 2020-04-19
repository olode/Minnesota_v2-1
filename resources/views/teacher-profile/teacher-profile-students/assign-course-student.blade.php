@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

          <!-- Form repeater section start -->
          @include('teacher-profile.teacher-profile-students.filter')
          <!--  Form repeater section end -->

          
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">تعيين مواد للطالب</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table-responsive table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>اسم الطالب</th>
                          <th>الرقم الجامعي</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>تعيين المواد</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>احمد سعد علي</td>
                          <td>ِAUD85685s</td>
                          <td>ماجستير</td>
                          <td>ادارة اعمال</td>
                          <td>
                            <button class="btn btn-danger">مبادي المالية</button>
                            <button class="btn btn-danger">مبادي الادارة</button>
                          </td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>ِAUD85685s</td>
                          <td>ماجستير</td>
                          <td>ادارة اعمال</td>
                          <td><button class="btn btn-danger">مبادي المالية</button>
                              <button class="btn btn-danger">مبادي الادارة</button>
                          </td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>اسم الطالب</th>
                          <th>الرقم الجامعي</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>تعيين المواد</th>
                        </tr>
                      </tfoot>
                    </table>
        
        <!-- Both borders end -->

                </div>
              </div>
            </div>

          </section>
          <!--/ Description -->
          
          
        </div>
      </div>



@endsection