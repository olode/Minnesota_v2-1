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
                <form action="{{ route('get-students') }}" method="GET" class="form row">
                  @csrf
                  <div class="form-group mb-1 col-sm-12 col-md-2">
                    <label for="profession">اختر المرحلة</label>
                    <br>
                    <select class="form-control" id="stage" name="stage_id">
                      <option>اختر المرحلة</option>
                      @foreach ($stages as $stage)
                          <option value="{{ $stage->stage_id }}">{{ $stage->stage_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group mb-1 col-sm-12 col-md-2">
                    <label for="profession">اختر القسم </label>
                    <br>
                    <select class="form-control" id="section" name="section_id">
                      
                    </select>
                  </div>

                  <div class="form-group mb-1 col-sm-12 col-md-2">
                    <label for="profession">اختر التخصص </label>
                    <br>
                    <select class="form-control" id="specialization" name="specialization_id">
                      
                    </select>
                  </div>

                  <div class="form-group mb-1 col-sm-12 col-md-2">
                    <label for="profession">اختر السنة الدراسية </label>
                    <br>
                    <select class="form-control" id="year" name="year_id">
                      <option value="" disabled selected >اختر</option>
                      @foreach ($years as $year)
                          <option value="{{ $year->id }}">{{ $year->year_m }}</option>
                      @endforeach
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
      <span style="margin-bottom: 20px; margin-right: 25px;">ملاحظة: من الضروري إختيار التاريخ قبل الضغط على زر <strong>البحث</strong> لكي يعتمد كاسنة دراسة الطالب للمادة</span>
    </div>
  </div>

<script>

  $("#stage").change(function(){
      stage_id = $(this).val();
      $("#section").text('');
      $("#specialization").text('');

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
        $("#specialization").text('');

        $.ajax({
        
        url:'/get-stage-specialization/'+ section_id,
        type:'get',
        dataType:'json',
        success:function(data){
            
          if(data.specializations.length == 0){
        
              $("#specialization").append('<option > لا توجد معلومات </option>');
              
              if($("#section").val() == 'اختر'){
                $("#specialization").text('');
              }
        
          }else{
        
              $("#specialization").append('<option > اختر </option>');
        
              $.each(data.specializations,function(key, val){
                $("#specialization").append('<option value='+val.specialization_id+' >' + val.specialization_name + '</option>');
              });
        
          }
        }
        });
        });
      
      
          
  </script>
