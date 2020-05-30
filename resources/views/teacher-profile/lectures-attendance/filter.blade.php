

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
                          <form action="{{ route('get-students-to-attendance') }}" method="POST" class="form row">
                            @csrf
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المرحلة</label>
                              <br>
                              <select name="stage_id" id="stage" class="form-control" required>
                                <option disabled selected></option>
                                @foreach ($stages as $stage)
                                    <option value="{{ $stage->stage_id }}">{{ $stage->stage_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر القسم </label>
                              <br>
                              <select name="section_id" id="section"  class="form-control" required>
                                
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الفصل</label>
                              <br>
                              <select  name="semester_id" id="semester"  class="form-control" required>
                                
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الصف</label>
                              <br>
                              <select   name="class_id" id="class"  class="form-control" required>
                                
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المحاضرة</label>
                              <br>
                              <select   name="lecture_id" id="lecture"  class="form-control" required>
                                
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
<script>

  $("#stage").change(function(){
      stage_id = $(this).val();
      $("#section").text('');
      $("#semester").text('');
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
        $("#semester").text('');
        $("#class").text('');
        $("#lecture").text('');

        $.ajax({
        
        url:'/get-stage-semester/'+ section_id,
        type:'get',
        dataType:'json',
        success:function(data){
            
          if(data.semesters.length == 0){
        
              $("#semester").append('<option > لا توجد معلومات </option>');
              
              if($("#section").val() == 'اختر'){
                $("#semester").text('');
              }
        
          }else{
        
              $("#semester").append('<option > اختر </option>');
        
              $.each(data.semesters,function(key, val){
                $("#semester").append('<option value='+val.semester_id+' >' + val.semester_title + '</option>');
              });
        
          }
        }
        });
        });

        $("#semester").change(function(){
          semester_id = $(this).val();
          $("#class").text('');
          $("#lecture").text('');
  
          $.ajax({
          
          url:'/get-stage-class/'+ semester_id,
          type:'get',
          dataType:'json',
          success:function(data){
              
            if(data.classes.length == 0){
          
                $("#class").append('<option > لا توجد معلومات </option>');
                
                if($("#semester").val() == 'اختر'){
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