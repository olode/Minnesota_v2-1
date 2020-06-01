@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body"  style="margin-left: 0px;">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">اضافة تكليف جديد</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   

                  <form action="{{ route('student-home-work.store') }}" method="POST" class="form form-horizontal form-bordered">
                    @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل التكليف</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المرحلة</label>
                          <div class="col-md-9">
                            <select id="stage" name="stage_id" class="form-control">
                              <option value="none" selected="" disabled="">اختر</option>
                              @foreach ($stages as $stage)
                                  <option value="{{ $stage->stage_id }}">{{ $stage->stage_name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">القسم</label>
                          <div class="col-md-9">
                            <select id="section" name="section_id" class="form-control">
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الصف</label>
                          <div class="col-md-9">
                            <select id="class" name="class_id" class="form-control">
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المحاضرة</label>
                          <div class="col-md-9">
                            <select id="lecture" name="lecture_id" class="form-control">
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ التسليم</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput2" class="form-control" placeholder="تاريخ التسليم"
                            name="due_date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان التكليف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عنوان التكليف"
                            name="title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">درجة التكليف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="درجة التكليف"
                            name="full_mark">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">تفاصيل  التكليف</label>
                          <div class="col-md-9">
                            <textarea id="projectinput9" rows="5" class="form-control" name="info" placeholder="تفاصيل  التكليف"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> حفظ
                        </button>
                      </div>
                    </form>
       
       
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
        
              $("#lecture").append('<option selected disabled ></option>');
        
              $.each(data.lectures,function(key, val){
                $("#lecture").append('<option value='+val.id+' >' + val.title + '</option>');
              });
        
          }
        }
        });
        });
</script>
@endsection