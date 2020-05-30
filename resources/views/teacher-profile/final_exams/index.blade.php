@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة الإختبارات النهائية</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>عنوان الإختبار</th>
                          <th>التاريخ</th>
                          <th>الدرجة</th>
                          <th>الصف</th>
                          <th>اعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($finalexams as $finalexam)
                        <tr>
                          <td>{{ $finalexam->title }}</td>
                          <td>{{ $finalexam->date }}</td>
                          <td>{{ $finalexam->full_mark }}</td>
                          <td>{{ $finalexam['class']->name }}</td>
                          <td>
                            <form style="display: inline;" action="{{ route('finalexam.edit', $finalexam->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="" class="btn btn-warning" type="submit">تعديل</button>  
                              </form>
                              <form style="display: inline;" action="{{ route('finalexam.destroy', $finalexam->id ) }}" method="post">
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
                            <th>عنوان الإختبار</th>
                            <th>التاريخ</th>
                            <th>الدرجة</th>
                            <th>الصف</th>
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