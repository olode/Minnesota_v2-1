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
                        <th>رابط القاعة</th>
                        <th>عدد الطلاب</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>١٠٠</td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>Moe</td>
                        <td>١٠٠</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>Doe</td>
                        <td>١٠٠</td>
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
                        <td>ابراهيم ابكر سعد</td>
                  
                      </tr>
                      <tr>
                        <td>البريد الالكتروني</td>
                        <td>student@gmail.com</td>
                      
                      </tr>
                      <tr>
                        <td>رقم الهاتف</td>
                        <td>0569854568</td>
                      
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


@endsection