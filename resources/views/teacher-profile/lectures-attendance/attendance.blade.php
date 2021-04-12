@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body" style="margin-left: 0px;">

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
      
                      @if (!empty($students))
                        <table class="table table table-bordered dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th>اسم الطالب</th>
                              <th>الرقم الجامعي</th>
                              <th>المرحلة</th>
                              <th>القسم</th>
                              <th>حالة التحضير</th>
                              <th>تحضير</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($students as $student)
                              <tr>
                                <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->special_student_id }}</td>
                                <td>{{ $student->stage_name }}</td>
                                <td>{{ $student->section_name }}</td>
                                <td id="{{$student->id}}attendance">
                                  @foreach ($attendances as $attendance)
                                    @if ($student->id == $attendance->student_id && $lecture_id == $attendance->lecture_id)

                                        {{ $attendance->attendance }}
                                        
                                    @endif
                                  @endforeach
                                </td>
                                <td>
                                  
                                  <form id="form" style="display: inline;"  action="{{ route('preparation') }}" method="post">
                                    @csrf
                                    {{ method_field('post') }}
                                    <input type="hidden" value="{{ $lecture_id }}" name="lecture_id">
                                    <input type="hidden" value="{{ $student->id }}" name="student_id">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <div class="form-group">
                                          <select class="form-control" name="attendance" id="{{$student->id}}select" required>
                                            <option selected disabled>اختر</option>
                                            <option value="present" >حاضر</option>
                                            <option value="absent" >غائب</option>
                                            <option value="excused" >مستأذن</option>
                                          </select>
                                          
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <button id="submit" type="submit" class="btn btn-success">حفظ</button>
                                      </div>
                                    </div>
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
                              <th>حالة التحضير</th>
                              <th>تعيين المواد</th>
                            </tr>
                          </tfoot>
                        </table>
                      @else
                      <hr>
                          <h5>إستخدم الفلتر أعلاه للحصول على البيانات</h5>
                      @endif
            
            <!-- Both borders end -->

                    </div>
                  </div>
                </div>

              </section>
          <!--/ Description -->
          
          
        </div>
      </div>

<script>



$(document).on('submit','#form',function(event){

  event.preventDefault();
  var form = $(this);
  var fors = form.serialize()
  var spl = fors.split("&")
  var splStudId = spl[3].split("=")


  selectedStatus = $('#'+splStudId[1]+'select').val()
  if(selectedStatus == null){
    $('#'+splStudId[1]+'select').css('color', '#C80000'); 
    console.log(selectedStatus)

  }else{


    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize()
      }).done(function(data) {
        stu_status = $('#'+data.stu_id+'attendance').text(data.status)
        $('#'+splStudId[1]+'select').css('color', 'black')
        // Optionally alert the user of success here...
        console.log(data);
      }).fail(function(data) {
        // Optionally alert the user of an error here...
      });


  }


    


  
});
  </script>

@endsection