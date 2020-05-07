
$("#branch").change(function(){

    branch_id = $(this).val();
    $("#stage").text('');
    $("#section").text('');
    $("#specialization").text('');
    $("#student").text('');
  
  $.ajax({
  
    url:'/get-stages/'+ branch_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.stages.length == 0){
  
          $("#stage").append('<option > لاتوجد بيانات </option>');
          
          if($("#branch").val() == 'اختر'){
            $("#stage").text('');
          }
  
      }else{
  
          $("#stage").append('<option > اختر </option>');
  
          $.each(data.stages,function(key, val){
            $("#stage").append('<option value='+val.id+' >' + val.name + '</option>');
          });
  
      }
    }
  });
  });

  $("#stage").change(function(){

    stage_id = $(this).val();
    $("#section").text('');
    $("#specialization").text('');
    $("#student").text('');
  
  $.ajax({
  
    url:'/get-section/'+ stage_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.sections.length == 0){
  
          $("#section").append('<option > لاتوجد بيانات </option>');
          
          if($("#stage").val() == 'اختر'){
            $("#section").text('');
          }
  
      }else{
  
          $("#section").append('<option > اختر </option>');
  
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
    $("#student").text('');
  
  $.ajax({
  
    url:'/get-specialization/'+ section_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.specializations.length == 0){
  
          $("#specialization").append('<option > لاتوجد بيانات </option>');
          
          if($("#section").val() == 'اختر'){
            $("#specialization").text('');
          }
  
      }else{
  
          $("#specialization").append('<option > اختر </option>');
  
          $.each(data.specializations,function(key, val){
            $("#specialization").append('<option value='+val.id+' >' + val.name + '</option>');
          });
  
      }
    }
  });
  });

  $("#specialization").change(function(){

    specialization_id = $(this).val();
    $("#student").text('');
  
  $.ajax({
  
    url:'/get-student/'+ specialization_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.students.length == 0){
  
          $("#student").append('<option > لاتوجد بيانات </option>');
          
          if($("#specialization").val() == 'اختر'){
            $("#student").text('');
          }
  
      }else{
  
          $("#student").append('<option > اختر </option>');
  
          $.each(data.students,function(key, val){
            $("#student").append('<option value='+val.id+' >' + val.first_name + ' '  + val.second_name + ' '  + val.last_name + '</option>');
          });
  
      }
    }
  });
  });
