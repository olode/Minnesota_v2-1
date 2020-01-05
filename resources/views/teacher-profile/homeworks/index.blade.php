@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة التكليفات</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table-responsive table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>عنوان التكليف</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>التكليف</th>
                          <th>اعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>احمد سعد علي</td>
                          <td>ماجستير</td>
                          <td>ادارة اعمال</td>
                          <td>التكليف الاول</td>
                          <td><button class="btn btn-success">عرض</button>
                              <button class="btn btn-danger">حذف</button>
                              <button class="btn btn-warning">تعديل</button>
                          </td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>عنوان التكليف</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>التكليف</th>
                          <th>اعدادت</th>
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