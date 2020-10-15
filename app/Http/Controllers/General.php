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
}
