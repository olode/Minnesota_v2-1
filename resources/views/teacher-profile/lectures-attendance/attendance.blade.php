@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

         @include('teacher-profile.lectures-attendance.filter')


              <!-- Description -->
              <section id="description" class="card">
                <div class="card-header">
                  <h4 class="card-title">تحضير الطلاب</h4>
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
                              <th>تحضير</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>احمد سعد علي</td>
                              <td>ِAUD85685s</td>
                              <td>ماجستير</td>
                              <td>ادارة اعمال</td>
                              <td>
                                <form style="display: ruby-base; margin-left: 5px;"  action="" method="post">
                                  <button type="submit" class="btn btn-success">حاضر</button>
                                </form>
                                <form style="display: ruby-base; margin-left: 5px;"  action="" method="post">
                                  <button class="btn btn-danger">غائب</button>
                                </form>
                                
                              </td>
                            </tr>
                            <tr>
                              <td>احمد سعد علي</td>
                              <td>ِAUD85685s</td>
                              <td>ماجستير</td>
                              <td>ادارة اعمال</td>
                              <td><button class="btn btn-success">ح</button>
                                  <button class="btn btn-danger">غ</button>
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