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
}
