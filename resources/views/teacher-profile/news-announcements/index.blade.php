@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body" style="margin-left: 0px;">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة الاخبار</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>عنوان الخبر</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>المادة</th>
                          <th style="width: 40%;" >محتوى الخبر</th>
                          <th style="width: 17%;" >التاريخ</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($news as $data)
                        <tr>
                          <td>{{ $data->title }}</td>
                          <td>{{ $data['class']->material->specialization->section->stage->name }}</td>
                          <td>{{ $data['class']->material->specialization->name }}</td>
                          <td>{{ $data['class']->material->name }}</td>
                          <td>{{ $data->text }}</td>
                          <td>{{ $data->created_at }}</td>
                          <td>
                            <form style="display: ruby-base; margin-left: 5px;" action="{{ route('news-announcements.edit', $data->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                           </form>
                           <form style="display: ruby-base; margin-left: 5px;" action="{{ route('news-announcements.destroy', $data->id) }}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}  
                            <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>عنوان الخبر</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>المادة</th>
                          <th>محتوى الخبر</th>
                          <th>التاريخ</th>
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