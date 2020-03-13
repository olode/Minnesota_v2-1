@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة الاخبار</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table-responsive table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>عنوان الخبر</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>المادة</th>
                          <th>التاريخ</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($news as $data)
                        <tr>
                          <td>{{ $data->tittle }}</td>
                          <td>{{ $data->tittle }}</td>
                          <td>{{ $data->specialization_id['section']->name }}</td>
                          <td>{{ $data->name }}</td>
                          <td>{{ $data->created_at }}</td>
                          <td></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>الاسم</th>
                          <th>المؤهل</th>
                          <th>رقم الهاتف</th>
                          <th>رقم الجواز</th>
                          <th>الاعدادت</th>
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