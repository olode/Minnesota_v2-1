
$("#section").change(function(){

    section_id = $(this).val();
    $("#specialization").text('');
  
  $.ajax({
  
    url:'/get-specialization/'+ section_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.specializations.length == 0){
  
          $("#specialization").append('<option > لاتوجد تخصصات لهذا القسم </option>');
          
          if($("#section").val() == 'اختر'){
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