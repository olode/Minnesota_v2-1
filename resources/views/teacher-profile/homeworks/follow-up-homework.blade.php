@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

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
                          <form action="{{ route('follow-up-homework-students') }}" method="POST" class="form row">
                            @csrf
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المرحلة</label>
                              <br>
                              <select name="stage_id" class="form-control" id="stage" required>
                                <option selected disabled></option>
                                @foreach ($stages as $stage)
                                    <option value="{{ $stage->stage_id }}">{{ $stage->stage_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر القسم </label>
                              <br>
                              <select class="form-control" name="section_id" id="section" required>
                                
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الصف </label>
                              <br>
                              <select name="class_id" class="form-control" id="class" required>
                                
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المادة </label>
                              <br>
                              <select name="lecture_id" class="form-control" id="lecture" required>
                                
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر التكليف</label>
                              <br>
                              <select name="homework_id" class="form-control" id="homework" required>
                                
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
              <h4 class="card-title">متابعة التكليفات</h4>
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
                          <th>عنوان التكليف</th>
                          <th>اسم الصف</th>
                          <th>التكليف</th>
                          <th>الدرجة</th>
                          <th>التنفيذ</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($students as $student)
                          <tr>
                            <td>{{ $student['student']->first_name }} {{ $student['student']->second_name }} {{ $student['student']->last_name }}</td>
                            <td>{{ $student->homework_id }}</td>
                            <td>{{ $student->homework_id }}</td>
                            <td><button class="btn btn-primary">تحميل التكليف</button></td>
                            <td>{{ $student->mark }}</td>
                            <td>
                              <form action="{{ route('homework-mark-update', $student->id) }}" method="post">
                                @method('PUT')
                                @csrf
                              <div class="row">
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name="mark" >
                                  </div>
                                  <div class="col-md-6">
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
                        <th>عنوان التكليف</th>
                        <th>اسم الصف</th>
                        <th>التكليف</th>
                        <th>الدرجة</th>
                        <th>التنفيذ</th>
                      </tr>
                      </tfoot>
                    </table>
                  @else
                  <hr>
                      <h5>يرجى أستخدام الفلتر للحصول على البيانات المطلوبة</h5>
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
  $("#stage").change(function(){
    stage_id = $(this).val();
    $("#section").text('');
    $("#class").text('');
    $("#lecture").text('');
    $("#homework").text('');

    $.ajax({
    
    url:'/get-stage-section/'+ stage_id,
    type:'get',
    dataType:'json',
    success:function(data){
        
      if(data.sections.length == 0){
    
          $("#section").append('<option > لا توجد معلومات </option>');
          
          if($("#stage").val() == 'اختر'){
            $("#section").text('');
          }
    
      }else{
    
          $("#section").append('<option > اختر </option>');
    
          $.each(data.sections,function(key, val){
            $("#section").append('<option value='+val.section_id+' >' + val.section_name + '</option>');
          });
    
      }
    }
    });
    });

    $("#section").change(function(){
      section_id = $(this).val();
      $("#class").text('');
      $("#lecture").text('');
      $("#homework").text('');

      $.ajax({
      
      url:'/get-section-class/'+ section_id,
      type:'get',
      dataType:'json',
      success:function(data){
          
        if(data.classes.length == 0){
      
            $("#class").append('<option > لا توجد معلومات </option>');
            
            if($("#section").val() == 'اختر'){
              $("#class").text('');
            }
      
        }else{
      
            $("#class").append('<option > اختر </option>');
      
            $.each(data.classes,function(key, val){
              $("#class").append('<option value='+val.class_id+' >' + val.class_name + '</option>');
            });
      
        }
      }
      });
      });

      $("#class").change(function(){
        class_id = $(this).val();
        $("#lecture").text('');
        $("#homework").text('');

        $.ajax({
        
        url:'/get-stage-lecture/'+ class_id,
        type:'get',
        dataType:'json',
        success:function(data){
            
          if(data.lectures.length == 0){
        
              $("#lecture").append('<option > لا توجد معلومات </option>');
              
              if($("#class").val() == 'اختر'){
                $("#lecture").text('');
              }
        
          }else{
        
              $("#lecture").append('<option selected disabled >اختر</option>');
        
              $.each(data.lectures,function(key, val){
                $("#lecture").append('<option value='+val.id+' >' + val.title + '</option>');
              });
        
          }
        }
        });
        });

        $("#lecture").change(function(){
          lecture_id = $(this).val();
          $("#homework").text('');
  
          $.ajax({
          
          url:'/get-lecture-homework/'+ lecture_id,
          type:'get',
          dataType:'json',
          success:function(data){
              
            if(data.homeworks.length == 0){
          
                $("#homework").append('<option > لا توجد معلومات </option>');
                
                if($("#lecture").val() == 'اختر'){
                  $("#homework").text('');
                }
          
            }else{
          
                $("#homework").append('<option selected disabled >اختر</option>');
          
                $.each(data.homeworks,function(key, val){
                  $("#homework").append('<option value='+val.id+' >' + val.title + '</option>');
                });
          
            }
          }
          });
          });
</script>

@endsection