@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body" style="margin-left: 0px;">

          
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">ادارة المحاضرات</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <table class="table table table-bordered dataex-html5-selectors">
                      <thead>
                        <tr>
                          <th>المادة</th>
                          <th>عنوان المحاضرة</th>
                          <th>ترتيب المحاضرة</th>
                          <th>المرحلة الدراسية</th>
                          <th>القسم</th>
                          <th>التاريخ</th>
                          <th>التفاصيل</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($lectures as $lecture)
                        <tr>
                          <td>{{ $lecture['class']->material->name }}</td>
                          <td>{{ $lecture->title }}</td>
                          <td>{{ $lecture->article_arrangement }} - ( {{ $lecture->article_arrangement_number }} )</td>
                          <td>{{ $lecture['class']->material->specialization->section->stage->name }}</td>
                          <td>{{ $lecture['class']->material->specialization->section->name }}</td>
                          <td>{{ $lecture->date }}</td>
                          <td>
                            <form action="{{ route('about.download', $lecture->id ) }}" method="get">
                              @csrf
                              <button class="btn btn-success" type="submit">تحميل ملف المحاضرة</button>
                            </form>
                          </td>
                          <td>
                            <form style="display: inline;" action="{{ route('lectures.edit', $lecture->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="" class="btn btn-warning" type="submit">تعديل</button>  
                              </form>
                              <form style="display: inline;" action="{{ route('lectures.destroy', $lecture->id ) }}" method="post">
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
                          <th>المادة</th>
                          <th>عنوان المحاضرة</th>
                          <th>ترتيب المحاضرة</th>
                          <th>المرحلة الدراسية</th>
                          <th>القسم</th>
                          <th>التاريخ</th>
                          <th>التفاصيل</th>
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