<div class="section-modal modal fade contact" id="contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                {{-- <div class="section-title text-center">
                    <h3>تسجيل بيانات طالب مستجد</h3>
                    <p>تسجيل البيانات لا يعني قبول الطالب في الجامعة في حال تم قبوله سوف تصله رسالة تبلغه بذلك</p>
                </div> --}}
            </div>
            <div class="row" dir="rtl" >
                <div class="col-md-12">
                    <h1 class="text-center " style=" font-size: 100px;">قريبا</h1>
                    {{-- <form action="{{ route('store') }}" method="POST"  enctype="multipart/form-data" name="sentMessage" id="contactForm" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="السم الأول" name="first_name" required data-validation-required-message="رجاء اكتب اسمك الأول">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="الاسم الثاني" name="second_name" required data-validation-required-message="رجاء اكتب اسمك الثاني">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="الاسم الأخير" name="last_name" required data-validation-required-message="رجاء اكتب اسمك الاخير">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="المدينة التي تعيش فيها" name="location" required data-validation-required-message="رجاء اكتب اسم المدينة التي تعيش فيها">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" required data-validation-required-message="رجاء اكتب البريد الإلكتروني الخاص بك">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="رقم الهاتف" name="phone_number" required data-validation-required-message="رجاء اكتب رقم الهاتف">
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="تاريخ الميلاد" name="birthday" required data-validation-required-message="رجاء اكتب تاريخ الميلاد الخاص بك">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="الجنسية" name="nationality" required data-validation-required-message="رجاء اكتب جنسيتك">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="نسبة التخرج" name="graduation_rate" required data-validation-required-message="رجاء اكتب نسبة تخرجك">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="رقم الجواز" name="passport_number" required data-validation-required-message="رجاء اكتب رقم جواز السفر">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                      <select class="form-control" name="gender" id="" required data-validation-required-message="رجاء اختر الجنس" >
                                        <option value="" selected disabled>اختر الجنس</option>
                                        <option value="0">ذكر</option>
                                        <option value="1">أنثى</option>
                                        <option value="2">غير ذلك</option>
                                      </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="branch_id" id="branch" required data-validation-required-message="رجاء اختر الفرع" >
                                      <option value="" selected disabled>اختر الفرع</option>
                                      <option value="1">الفرع الثالث</option>
                                    </select>
                                  <p class="help-block text-danger"></p>
                              </div>
                              <div class="form-group">
                                <select class="form-control" name="stage_id" id="stage" required data-validation-required-message="رجاء اختر القسم" >
                                  <option value="" selected disabled>اختر القسم</option>
                                </select>
                                <p class="help-block text-danger"></p>
                                </div>
                                    <div class="form-group">
                                        <select class="form-control" name="section_id" id="section" required data-validation-required-message="رجاء اختر القسم" >
                                        <option value="" selected disabled>اختر القسم</option>
                                        </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="specialization_id" id="specialization" required data-validation-required-message="رجاء اختر التخصص" >
                                    <option value="" selected disabled>اختر التخصص</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="qualification" id="" required data-validation-required-message="رجاء اختر المؤهل العلمي" >
                                    <option value="none" selected disabled>اختر المؤهل العلمي</option>
                                    <option value="1">ثانوي</option>
                                    <option value="2">دبلوم</option>
                                    <option value="3">بكالوريوس</option>
                                    <option value="4">ماجستير</option>
                                    <option value="5">دكتورا</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">الصورة الشخصية</label>
                                    <input type="file" class="form-control" placeholder="" name="avatar" required data-validation-required-message="هذا الحقل مطلوب">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">صورة اخر مؤهل علمي</label>
                                    <input type="file" class="form-control" placeholder="" name="qualification_image" required data-validation-required-message="هذا الحقل مطلوب">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">صورة جواز السفر</label>
                                    <input type="file" class="form-control" value="" name="passport_image" required data-validation-required-message="هذا الحقل مطلوب">
                                    <p class="help-block text-danger"></p>
                                </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" class="btn btn-primary" value="إرسال البيانات" >
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>

$("#branch").change(function(){

    branch_id = $(this).val();
    $("#stage").text('');
    $("#section").text('');
    $("#specialization").text('');
    
    $.ajax({
    
    url:'/get-stages-frontend/'+ branch_id,
    type:'get',
    dataType:'json',
    success:function(data){
    
      if(data.stages.length == 0){
    
          $("#stage").append('<option > لاتوجد مراحل لهذا الفرع </option>');
          
          if($("#branch").val() == 'اختر'){
            $("#stage").text('');
          }
    
      }else{
    
          $("#stage").append('<option > اختر المرحلة </option>');
    
          $.each(data.stages,function(key, val){
            $("#stage").append('<option value='+val.id+' >' + val.name + '</option>');
          });
    
      }
    }
    });
    });
    
    
$("#stage").change(function(){

section_id = $(this).val();
$("#section").text('');
$("#specialization").text('');


$.ajax({

    url:'/get-section-frontend/'+ section_id,
    type:'get',
    dataType:'json',
    success:function(data){

    if(data.sections.length == 0){

            $("#section").append('<option > لاتوجد اقسام لهذه المرحلة </option>');

            if($("#stage").val() == 'اختر المرحلة'){
            $("#section").text('');
            }

    }else{

        $("#section").append('<option > اختر القسم </option>');
        $.each(data.sections,function(key, val){
            $("#section").append('<option value='+val.id+' >' + val.name + '</option>');
        });

    }
    }
});
});

$("#section").change(function(){

    section_id = $(this).val();
$("#specialization").text('');

$.ajax({

    url:'/get-specialization-frontend/'+ section_id,
    type:'get',
    dataType:'json',
    success:function(data){

    if(data.specializations.length == 0){

        $("#specialization").append('<option > لاتوجد تخصصات لهذا القسم </option>');

            if($("#section").val() == 'اختر القسم'){
            $("#specialization").text('');
            }

    }else{

        $("#specialization").append('<option > اختر التخصص </option>');
        $.each(data.specializations,function(key, val){

            $("#specialization").append('<option value='+val.id+' >' + val.name + '</option>');
        });

    }
    }
});
});

</script>