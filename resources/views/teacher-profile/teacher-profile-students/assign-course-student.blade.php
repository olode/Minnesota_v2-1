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
                  @if (!empty($students))
                  <table class="table table-responsive table-bordered">
                      <thead>
                        <tr>
                          <th>اسم الطالب</th>
                          <th>الرقم الجامعي</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>التخصص</th>
                          <th>خيارات</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($students as $student)
                            <tr>
                              <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}</td>
                              <td>ِ{{ $student->special_student_id }}</td>
                              <td>{{ $student['specialization']->section->stage->name }}</td>
                              <td>{{ $student['specialization']->section->name }}</td>

                              <td>{{ $student['specialization']->name }}</td>
                              <td>
                                <form style="display: ruby-base; margin-left: 5px;" action="{{ route('assign.course', $student->id) }}" method="get">
                                  {{ csrf_field() }}
                                  <button style="border-radius: 25px;" class="btn btn-warning" type="submit">اضافة مواد للطالب</button>  
                                </form>
                              </td>
                            </tr>
                          @endforeach   
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>اسم الطالب</th>
                          <th>الرقم الجامعي</th>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>التخصص</th>
                          <th>خيارات</th>
                        </tr>
                      </tfoot>
                    </table>
                    @else
                    <hr>
                        <p>يرجى تحديد البيانات أعلاه لعرض الطلاب</p>
                    <hr>
                    @endif

        <!-- Both borders end -->

                </div>
              </div>
            </div>

          </section>
          <!--/ Description -->
          
          
        </div>
      </div>



@endsection