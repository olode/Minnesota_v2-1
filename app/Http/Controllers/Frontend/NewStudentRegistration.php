<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\New_Student_Registration;
use App\Models\Branch;
use App\Models\Section;
use Image;

class NewStudentRegistration extends Controller
{
    public function create()
    {
        $branches = Branch::Select('id', 'name')->where('status', 1)->get();
        $sections = Section::Select('id', 'name', 'stage_id')->get();
        return view('dashboard.students/create', compact('branches', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $status     = '0';
        // $idNumber = "IUM" . mt_rand(100000, 999999) . "S";
        
        $request->validate([
            'first_name'=> ['required','string', 'max:255'],
            'second_name'=> ['required','string', 'max:255'],
            'third_name'=> ['required','string', 'max:255'],
            'last_name'=> ['required','string', 'max:255'],
            'location'=> ['required','string', 'max:255'],
            'email'=> ['required','email', 'unique:new_student_registrations,email', 'max:255'],
            'phone_number'=> ['required','string', 'unique:new_student_registrations,phone_number', 'max:255'],
            'avatar'=> ['image:jpeg,png,jpg'],
            'qualification'=> ['required','string', 'max:255'],
            'qualification_image'=> ['image:jpeg,png,jpg'],
            'passport_number'=> ['required','string', 'unique:new_student_registrations,passport_number', 'max:255'],
            'passport_image'=> ['image:jpeg,png,jpg'],
            'branch_id'=> ['required','integer', 'max:255'],
            'section_id'=> ['required','integer', 'max:255'],
            'specialization_id'=> ['required','integer', 'max:255'],
            'birthday'=> ['required','string', 'max:255'],
            'nationality'=> ['required','string', 'max:255'],
            'gender'=> ['required','string', 'max:255'],
            'graduation_rate'=> ['required','string', 'max:255'],
        ]);

        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/students/avatars/' . $filename));
            $avatarneme = $filename;

        }else{
            $avatarneme = 'default.png';
        }

        if(request()->hasFile('qualification_image')){

            $qualifications = request()->file('qualification_image');
            $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
            Image::make($qualifications)->save(public_path('/uploads/students/qualifications/' . $qualificationsname));
            $qualificationsneme = $qualificationsname;

        }else{
          $qualificationsneme = 'default.png';
        }

        if(request()->hasFile('passport_image')){

            $passport = request()->file('passport_image');
            $passportname = time() .'.'. $passport->getClientOriginalExtension();
            Image::make($passport)->save(public_path('/uploads/students/passports/' . $passportname));
            $passportneme = $passportname;

        }else{
          $passportneme = 'default.png';
        }
        // dd($request->all());
        New_Student_Registration::create([
            'first_name'=> $request['first_name'],
            'second_name'=> $request['second_name'],
            'third_name'=> $request['third_name'],
            'last_name'=> $request['last_name'],
            'location'=> $request['location'],
            'email'=> $request['email'],
            'phone_number'=> $request['phone_number'],
            'avatar'=> $avatarneme,
            'qualification'=> $request['qualification'],
            'qualification_image'=> $qualificationsneme,
            'passport_number'=> $request['passport_number'],
            'passport_image'=> $passportneme,
            'branch_id'=> $request['branch_id'],
            'section_id'=> $request['section_id'],
            'specialization_id'=> $request['specialization_id'],
            'status'=> $status,
            'birthday'=> $request['birthday'],
            'nationality'=> $request['nationality'],
            'gender'=> $request['gender'],
            'graduation_rate'=> $request['graduation_rate'],
        ]);
        
        
        // return redirect('/student');
        return redirect()->back()->with('success', '  تم تقديم طلب إلتحاق   '.$request['first_name'].'  بنجاح  ');
    }


}
