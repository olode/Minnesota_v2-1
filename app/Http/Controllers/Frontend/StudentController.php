<?php

namespace App\Http\Controllers\Frontend;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Branch;
use App\Models\Specialization;
use App\Models\Section;
use Image;
use Auth;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idNumber = "IUM" . mt_rand(100000, 999999) . "S";
        
        // dd($request->all());
        $request->validate([
            'first_name'                 => ['required','string','max:20','min:3'],
            'second_name'                => ['required','string','max:20','min:3'],
            'last_name'                  => ['required','string','max:20','min:3'],
            'location'                   => ['required','string','max:20','min:3'],
            'email'                      => ['required','string','max:20','min:3'],
            'phone_number'               => ['required','string','max:20','min:3'],
            'avatar'                     => ['required', 'mimes:jpeg,jpg,png'],
            'qualification'              => ['required','string','max:20','min:3'],
            'qualification_image'        => ['required', 'mimes:jpeg,jpg,png'],
            'passport_number'            => ['required','string','max:20','min:3'],
            'passport_image'             => ['required', 'mimes:jpeg,jpg,png'],
            'branch_id'                  => ['required','integer','min:1'],
            'section_id'                 => ['required','integer','min:1'],
            'specialization_id'          => ['required','integer','min:1'],
            'birthday'                   => ['required','string','max:20','min:3'],
            'nationality'                => ['required','string','max:20','min:3'],
            'gender'                     => ['required','string','max:20','min:3'],
            'graduation_rate'            => ['required','string','max:20','min:3'],

        ]);

            // dd($request->all());
        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/students/avatars/' . $filename));
            $avatarneme = $filename;

        }

        if(request()->hasFile('qualification_image')){

            $qualifications = request()->file('qualification_image');
            $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
            Image::make($qualifications)->save(public_path('/uploads/students/qualifications/' . $qualificationsname));
            $qualificationsneme = $qualificationsname;

        }

        if(request()->hasFile('passport_image')){

            $passport = request()->file('passport_image');
            $passportname = time() .'.'. $passport->getClientOriginalExtension();
            Image::make($passport)->save(public_path('/uploads/students/passports/' . $passportname));
            $passportneme = $passportname;

        }
        
        $password     = "1234567890";
        $status     = "0";
        
        Student::create([
            'special_student_id'       => $idNumber,
            'first_name'               => $request['first_name'],
            'second_name'              => $request['second_name'],
            'last_name'                => $request['last_name'],
            'location'                 => $request['location'],
            'email'                    => $request['email'],
            'phone_number'             => $request['phone_number'],
            'password'                 => Hash::make($password),
            'avatar'                   => $avatarneme,
            'qualification'            => $request['qualification'],
            'qualification_image'      => $qualificationsneme,
            'passport_number'          => $request['passport_number'],
            'passport_image'           => $passportneme,
            'branch_id'                => $request['branch_id'],
            'section_id'               => $request['section_id'],
            'specialization_id'        => $request['specialization_id'],
            'status'                   => $status,
            'birthday'                 => $request['birthday'],
            'nationality'              => $request['nationality'],
            'gender'                   => $request['gender'],
            'graduation_rate'          => $request['graduation_rate'],

        ]);
        
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
