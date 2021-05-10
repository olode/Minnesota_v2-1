<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Student;
use Hash;
// BC_data
// PHD_data
// master_data
class General extends Controller
{
   public function  get_b_c_data(){
    set_time_limit(0);
       $bc_datas =   DB::table('BC_data')->get();
      

       foreach($bc_datas as $bc_data){
        $student =  new Student;
        echo  $bc_data->id.'-';
      echo  $student->first_name = $bc_data->f_name;
      echo "<br>";
        $student->second_name = $bc_data->s_name;
        $student->last_name = $bc_data->third_name." ".$bc_data->fourth_name;
        $student->birthday = $bc_data->berth;
        $student->gender = $bc_data->sex;
        $student->nationality = $bc_data->nationality;
        $student->passport_number = $bc_data->passport;
        $student->special_student_id = $bc_data->code;
        $student->qualification = $bc_data->gread;
        $student->graduation_rate = $bc_data->graguted;
        $student->email = $bc_data->email;
        $student->phone_number = $bc_data->phone;
        $student->location = $bc_data->address;
        $student->qualification = 1;
        $student->avatar = 'defult.jpeg';
        $student->qualification_image = 'defult.jpeg';
        $student->passport_image = 'defult.jpeg';
        $student->section_id = 3;
        $student->status = 1;
        $student->branch_id = 1;
        $student->specialization_id = 3;
        $student->password = Hash::make($bc_data->phone);

        $student->save();
       }

   }

   public function  get_master_data(){
        set_time_limit(0);
           $bc_datas =   DB::table('master_data')->get();
          
    
           foreach($bc_datas as $bc_data){
            $student =  new Student;
            echo  $bc_data->id.'-';
          echo  $student->first_name = $bc_data->f_name;
          echo "<br>";
            $student->second_name = $bc_data->s_name;
            $student->last_name = $bc_data->third_name." ".$bc_data->fourth_name;
            $student->birthday = $bc_data->berth;
            $student->gender = $bc_data->sex;
            $student->nationality = $bc_data->nationality;
            $student->passport_number = $bc_data->passport;
            $student->special_student_id = $bc_data->code;
            $student->qualification = $bc_data->gread;
            $student->graduation_rate = $bc_data->graguted;
            $student->email = $bc_data->email;
            $student->phone_number = $bc_data->phone;
            $student->location = $bc_data->address;
            $student->qualification = 2;
            $student->avatar = 'defult.jpeg';
            $student->qualification_image = 'defult.jpeg';
            $student->passport_image = 'defult.jpeg';
            $student->section_id = 1;
            $student->status = 1;
            $student->branch_id = 1;
            $student->specialization_id = 1;
            $student->password = Hash::make($bc_data->phone);
    
            $student->save();
           }
    
   }

   public function  get_phd_data(){
            set_time_limit(0);
               $bc_datas =   DB::table('PHD_data')->get();
              
        
               foreach($bc_datas as $bc_data){
                $student =  new Student;
                echo  $bc_data->id.'-';
              echo  $student->first_name = $bc_data->f_name;
              echo "<br>";
                $student->second_name = $bc_data->s_name;
                $student->last_name = $bc_data->third_name." ".$bc_data->fourth_name;
                $student->birthday = $bc_data->berth;
                $student->gender = $bc_data->sex;
                $student->nationality = $bc_data->nationality;
                $student->passport_number = $bc_data->passport;
                $student->special_student_id = $bc_data->code;
                $student->qualification = $bc_data->gread;
                $student->graduation_rate = $bc_data->graguted;
                $student->email = $bc_data->email;
                $student->phone_number = $bc_data->phone;
                $student->location = $bc_data->address;
                $student->qualification = 3;
                $student->avatar = 'defult.jpeg';
                $student->qualification_image = 'defult.jpeg';
                $student->passport_image = 'defult.jpeg';
                $student->section_id = 4;
                $student->status = 1;
                $student->branch_id = 1;
                $student->specialization_id = 4;
                $student->password = Hash::make($bc_data->phone);
        
                $student->save();
               }

               
        
   }

   public function get_student_data(Request $request){
               set_time_limit(0);
               // ?table=&spe_1=&spe_2=&spe_3=&sec_1=&sec_2=&sec_3
               $table = $request->table;
               

               $values = DB::table($table)->get();

               foreach($values as $value){
              
               
                  if($value->stage == 'البكالوريوس.'){

                     $qu = 1;
                     $sec = $request->sec_1;
                     $spe = $request->spe_1;

                  }elseif($value->stage == 'الماجستير.'){
                     $qu = 2;
                     $sec = $request->sec_2;
                     $spe = $request->spe_2;

                  }else{
                     $qu = 3;
                     $sec = $request->sec_3;
                     $spe = $request->spe_3;


                  }
                
                  DB::table('students')->insert([
                     ['first_name' => $value->f_name , 
                     'second_name' => $value->s_name,
                     'last_name' => $value->third_name." ".$value->fourth_name,
                     'birthday' => $value->berth,
                     'gender' => $value->sex,
                     'nationality' => $value->nationality,
                     'passport_number' => $value->passport,
                     'special_student_id' => $value->code,
                     'qualification' => $value->gread,
                     'graduation_rate' => $value->graguted,
                     'email' => $value->email,
                     'phone_number' => $value->phone,
                     'location' => $value->address,
                     'avatar' => 'defult.jpeg',
                     'qualification_image' => 'defult.jpeg',
                     'passport_image' => 'defult.jpeg',
                     'qualification' => $qu,
                     'section_id' => $sec,
                     'specialization_id' => $spe,
                     'status' => 1,
                     'branch_id' => 1,
                     'password' => Hash::make($value->phone)]
                 ]);

               }
              
                  
   }

   public function material_assing(Request $request, $table){
      // url
      // /material-assign/{table_name}?class_id=7&semester_id=8&year_id=2
      $materials = DB::table($table)->get();
      $counter= 1;
      $missing = 1;
      foreach($materials as $material){

         $students = DB::table('students')->Where('special_student_id', $material->id_number)->get();


         if($students->all() != []){

            foreach ($students as $student) {
               if($material->id_number == $student->special_student_id){
                  echo "++++++++";
                  echo "<br>";
                  echo $counter++;
                  echo "<br>";
                  echo $student->special_student_id;
                  echo "<br>";
                  echo $material->id_number;
                  echo "<br>";
                  echo $student->first_name." ".$student->second_name." ".$student->third_name." ".$student->last_name;
                  echo "<br>";
                  echo $material->name;
                  echo "<br>";
                  echo "++++++++";
                  echo "<br>";
                  echo "<br>";
                  

                   DB::table('student_calsses')->insert([
                     'semester_id' => $request->semester_id,
                     'student_id' => $student->id,
                     'class_id' => $request->class_id,
                     'year_id' => $request->year_id
                 ]);
   

               }
              
             
            }

         }else{
        

            
            echo "<h1 style='color:red'>"."++++++++"." </h1>";
             
            echo "<h3 style='color:red'>".$missing++." </h3>";
            echo "<br>";

            echo "<h3 style='color:red'>".$material->id_number." </h3>";
            echo "<br>";
            echo "<h3 style='color:red'>".$material->name." </h3>";
            echo "<h1 style='color:red'>"."++++++++"." </h1>";

            echo "<br>";
         }
        
      }
   }

   public function clean_duplicate_names($table){
     
      $materials = DB::table($table)->get();
      $counter= 1;
      $missing = 1;
      foreach($materials as $material){

         $students = DB::table('students')->Where('special_student_id', $material->id_number)->get();


         if($students->all() != []){
            $delet_counter = 1;

            foreach ($students as $student) {
               if($material->id_number == $student->special_student_id){
                  echo "++++++++";
                  echo "<br>";
                  echo $counter++;
                  echo "<br>";
                  echo $student->special_student_id;
                  echo "<br>";
                  echo $material->id_number;
                  echo "<br>";
                  echo $student->first_name." ".$student->second_name." ".$student->third_name." ".$student->last_name;
                  echo "<br>";
                  echo $material->name;
                  echo "<br>";
                  echo "++++++++";
                  echo "<br>";
                  echo "<br>";
                

               }
              


               if($delet_counter != 1){
                  
                  echo "<h1>NO".$delet_counter." NEED</h1>";
                  DB::table('students')->Where('special_student_id',$student->special_student_id)->delete();
                  continue;
               }
               $delet_counter++;
               
             
            }

         }else{
        

            
            echo "<h1 style='color:red'>"."++++++++"." </h1>";
             
            echo "<h3 style='color:red'>".$missing++." </h3>";
            echo "<br>";

            echo "<h3 style='color:red'>".$material->id_number." </h3>";
            echo "<br>";
            echo "<h3 style='color:red'>".$material->name." </h3>";
            echo "<h1 style='color:red'>"."++++++++"." </h1>";

            echo "<br>";
         }
        
      }
   }


   public function set_pass_key($table){

      $counter = 1;
      $values = DB::table($table)->get();

      foreach($values as $value){


         echo $counter++;
         echo "<br>";
         echo $value->id_number;
         echo "<br>";
         echo $value->name;
         echo "<br>";

      DB::table('students')
      ->where('special_student_id', $value->id_number)
      ->update([
         'email' => $value->email,
         'password' => Hash::make($value->phone)]);
      }
   }



   // set-final-exsam-marks/marks_material_social?exam_id=
   public function set_final_exsam_marks(Request $request, $table){

      $values = DB::table($table)->get();
      $students = Student::WhereIn('special_student_id',$values->pluck('id_number'))->get();

      foreach($students as $student){
         foreach($values as $value) {

            if($student->special_student_id == $value->id_number){

                DB::table('follow_up_final_exams')->insert(['student_id'=>$student->id,
                                                                     'mark'=>$value->final_mark,
                                                                     'final_exam_id'=>$request->exam_id]);
            }
            


         }

         

      // $values = DB::table($table)->get();
      // $students = Student::WhereIn('special_student_id',$values->pluck('id_number'))->get();

      // foreach($students as $student){

      //    $values = DB::table('follow_up_final_exams')->insert(['student_id'=>$student->id,
      //                                                          'mark'=>100,
      //                                                          'final_exam_id'=>$request->exam_id

      //    ]);

      }

         
       
      

   }


   public function clean_duplicate_student_class(){

      $values = DB::table('student_calsses')->select('semester_id', 'student_id', 'class_id')->distinct()->get();

      foreach($values as $value){

        $duplcated_classes =  DB::table('student_calsses')->Where('semester_id', $value->semester_id)
                                       ->Where('student_id', $value->student_id)
                                       ->Where('class_id', $value->class_id)->get();

                                       
         if($duplcated_classes->count() != 1){

            
            $counter = 1;
            foreach($duplcated_classes as $duplcated_classe){
  
               if($counter == 1){
                     echo  $counter;
                     echo  "<br>";
                     echo  $duplcated_classe->id;
                     echo  "<br>";
                     echo  $duplcated_classe->student_id;
                     echo  "<hr>";
                  DB::table('student_calsses')->where('id', '=', $duplcated_classe->id)->where('created_at', '!=', null)->delete();
               }


               
               $counter++;
               

            }

         }

         
      }
      
   }
}
