$("#class").change(function(){

    class_id = $(this).val();
    $("#student").text('');
  
  $.ajax({
  
    url:'/get-student-class/'+ class_id,
    type:'get',
    dataType:'json',
    success:function(data){
  
      if(data.students.length == 0){
  
          $("#student").append('<option > لاتوجد بيانات </option>');
          
          if($("#class").val() == 'اختر'){
            $("#student").text('');
          }
  
      }else{
        
          $("#student").append('<option > اختر </option>');
  
          $.each(data.students,function(key, val){
            $("#student").append('<option value='+val.student.id+' >' + val.student.first_name + ' ' + val.student.second_name + ' ' + val.student.last_name +'</option>');
          });
  
      }
    }
  });
  });