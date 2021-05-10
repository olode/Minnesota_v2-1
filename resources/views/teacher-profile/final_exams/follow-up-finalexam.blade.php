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
                          <form action="{{ route('follow-up-finalexam-students') }}" method="POST" class="form row">
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
                              <select   name="final_exam_id" id="finalexam"  class="form-control" required>
                                
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
                  <h4 class="card-title">درجات الإختبارات النهائية للطلاب</h4>
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
                                <td id="{{ $student->id }}newMark">
                                @foreach($student->final_exams as $final_exam)

                                  @if($final_exam->final_exam_id == $final_exam_id)
                                  {{--dd($final_exam, $final_exam_id)--}}
                                      {{$final_exam->mark}}

                                  @endif
                                

                                @endforeach
                                    {{--@foreach ($followupfinalexams as $followupfinalexam)
                                        @if ($student->id == $followupfinalexam->student_id && $final_exam_id == $followupfinalexam->final_exam_id)

                                            {{ $followupfinalexam->mark }}
                                            
                                        @endif
                                    @endforeach--}}
                                </td>
                                <td>
                                  
                                  <form id="form" style="display: inline;"  action="{{ route('followupfinalexam.store') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $final_exam_id }}" name="final_exam_id">
                                    <input type="hidden" value="{{ $student->id }}" name="student_id">
                                    <input type="hidden" value="1" name="status">
                                    <div class="row">
                                      <div class="col-md-8">
                                      <!-- required -->
                                        <input id="{{ $student->id }}marks" type="text" name="mark" class="form-control" >
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

  $(document).on('submit','#form',function(event){

    event.preventDefault();
    var form = $(this);
    var fors = form.serialize()
    var spl = fors.split("&")
    var splMark = spl[5].split("=")
    var splStuId = spl[3].split("=")

    console.log(spl,splStuId, splMark[1]);

    if(splMark[1] == ""){

      $('#'+splStuId[1]+'marks').css('border-color', 'red'); 

    }else{


      $.ajax({
          type: form.attr('method'),
          url: form.attr('action'),
          data: form.serialize()
        }).done(function(data) {
          console.log(data)
          // stu_status = $('#'+data.stu_id+'attendance').text(data.status)
          $('#'+splStuId[1]+'marks').css('border-color', '#D4D4D4')
          $('#'+splStuId[1]+'marks').val('')
          $('#'+splStuId[1]+'newMark').text(data.new_mark)
          // Optionally alert the user of success here...
          // console.log(data);
        }).fail(function(data) {
          // Optionally alert the user of an error here...
        });


    }

    
  });
</script>


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
        $("#finalexam").text('');

        $.ajax({
        
        url:'/get-class-finalexam/'+ class_id,
        type:'get',
        dataType:'json',
        success:function(data){
            
          if(data.finalexams.length == 0){
        
              $("#finalexam").append('<option > لا توجد معلومات </option>');
              
              if($("#class").val() == 'اختر'){
                $("#finalexam").text('');
              }
        
          }else{
        
              $("#finalexam").append('<option selected disabled >اختر</option>');
        
              $.each(data.finalexams,function(key, val){
                $("#finalexam").append('<option value='+val.id+' >' + val.title + '</option>');
              });
        
          }
        }
        });
    });

</script>

@endsection