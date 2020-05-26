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
                  <table class="table table table-bordered">
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
                              <td>{{ $student->stage_name }}</td>
                              <td>{{ $student->section_name }}</td>

                              <td>{{ $student->specialization_name }}</td>
                              <td>
                                @foreach ($materials as $material)
                                  <form style="display: inline;" action="{{ route('assign.course') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $year_id }}" name="year_id">
                                    <input type="hidden" value="{{ $material->id }}" name="class_id">
                                    <input type="hidden" value="{{ $material->semester_id }}" name="semester_id">
                                    <input type="hidden" value="{{ $student->id }}" name="student_id">
                                    <button style="border-radius: 25px;" class="btn btn-warning" type="submit">{{ $material->name }}</button>  
                                  </form>
                                @endforeach
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
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>