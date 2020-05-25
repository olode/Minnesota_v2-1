

$("#branch").change(function(){

    branch_id = $(this).val();
    $("#stage").text('');
    $("#section").text('');
    $("#specialization").text('');
    
    $.ajax({
    
    url:'/get-stages/'+ branch_id,
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
    
      url:'/get-section/'+ section_id,
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
    
      url:'/get-specialization/'+ section_id,
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
    
    
    $("#specialization").change(function(){
    
    specialization_id = $(this).val();
    $("#material").text('');
    
    $.ajax({
    
      url:'/get-material/'+ specialization_id,
      type:'get',
      dataType:'json',
      success:function(data){
    console.log(data);
        if(data.materials.length == 0){
    
              $("#material").append('<option > لاتوجد اقسام لهذه المرحلة </option>');
    
              if($("#stage").val() == 'اختر التخصص'){
                $("#material").text('');
              }
    
        }else{
    
            $("#material").append('<option > اختر التخصص </option>');
            $.each(data.materials,function(key, val){
              $("#material").append('<option value='+val.id+' >' + val.name + '</option>');
            });
    
        }
      }
    });
    });
    