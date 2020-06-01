@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body" style="margin-left: 0px;">

            <!-- Form repeater section start -->
       
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">البحث عن الطلاب</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>
                          <form action="{{ route('follow-up-quizze-students') }}" method="POST" class="form row">
                            @csrf

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الصف</label>
                              <br>
                              <select   name="class_id" id="class"  class="form-control" required>
                                <option disabled selected ></option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الأختبار</label>
                              <br>
                              <select   name="quizze_id" id="quizze"  class="form-control" required>
                                
                              </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                              <button data-repeater-create class="btn btn-primary">
                              بحث<i class="ft-search"></i> 
                              </button>
                            </div>
                          </form>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
        <!-- // Form repeater section end -->


              <!-- Description -->
              <section id="description" class="card">
                <div class="card-header">
                  <h4 class="card-title">درجات الإختبارات الشهرية للطلاب</h4>
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
                              <th>الدرجة</th>
                              <th>تعيين الدرجة</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($students as $student)
                              <tr>
                                <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->special_student_id }}</td>
                                <td>{{ $student->stage_name }}</td>
                                <td>{{ $student->section_name }}</td>
                                <td>
                                    @foreach ($followUpQuizzes as $followUpQuizze)
                                        @if ($student->id == $followUpQuizze->student_id && $quizze_id == $followUpQuizze->quizze_id)

                                            {{ $followUpQuizze->mark }}
                                            
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                  
                                  <form style="display: inline;"  action="{{ route('followupquizze.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $quizze_id }}" name="quizze_id">
                                    <input type="hidden" value="{{ $student->id }}" name="student_id">
                                    <input type="hidden" value="1" name="status">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <input type="text" name="mark" class="form-control" required>
                                      </div>
                                      <div class="col-md-3">
                                        <button type="submit" class="btn btn-success">حفظ</button>
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
                                <th>الدرجة</th>
                                <th>تعيين الدرجة</th>
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
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
<script>

    $("#class").change(function(){
        class_id = $(this).val();
        $("#quizze").text('');

        $.ajax({
        
        url:'/get-class-quizze/'+ class_id,
        type:'get',
        dataType:'json',
        success:function(data){
            
          if(data.quizzes.length == 0){
        
              $("#quizze").append('<option > لا توجد معلومات </option>');
              
              if($("#class").val() == 'اختر'){
                $("#quizze").text('');
              }
        
          }else{
        
              $("#quizze").append('<option selected disabled >اختر</option>');
        
              $.each(data.quizzes,function(key, val){
                $("#quizze").append('<option value='+val.id+' >' + val.title + '</option>');
              });
        
          }
        }
        });
    });

</script>

@endsection