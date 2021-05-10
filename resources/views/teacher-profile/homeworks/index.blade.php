@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body" style="margin-left: 0px;">

          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة التكليفات</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>عنوان التكليف</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>الصف</th>
                          <th>المحاضرة</th>
                          <th>موعد التسليم</th>
                          <th>درجة التكليف</th>
                          <th>وصف التكليف</th>
                          <th>اعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($homeworks as $homework)
                        <tr>
                          <td>{{ $homework->title }}</td>
                          <td>{{ $homework['stage']->name }}</td>
                          <td>{{ $homework['section']->name }}</td>
                          <td>{{ $homework['class']->name }}</td>
                          <td>{{ $homework['lecture']->title }}</td>
                          <td>{{ $homework->due_date }}</td>
                          <td>{{ $homework->full_mark }}</td>
                          <td>{{ $homework->info }}</td>
                          <td>
                            <form style="display: inline;" action="{{ route('student-home-work.edit', $homework->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="" class="btn btn-warning" type="submit">تعديل</button>  
                              </form>
                              <form style="display: inline;" action="{{ route('student-home-work.destroy', $homework->id ) }}" method="post">
                                @method('DELETE')
                                {{ csrf_field() }}  
                              <button style="" class="btn btn-danger" type="submit">حذف</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      
                        
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>عنوان التكليف</th>
                        <th>المرحلة</th>
                        <th>القسم</th>
                        <th>الصف</th>
                        <th>المحاضرة</th>
                        <th>موعد التسليم</th>
                        <th>درجة التكليف</th>
                        <th>وصف التكليف</th>
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