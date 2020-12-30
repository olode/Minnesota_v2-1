<?php

namespace App\Http\Controllers\Dashboard;
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

  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $students = Student::all();
        $branches = Branch::Select('id', 'name')->get();
        return view('dashboard.students/index', compact('students', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $idNumber = "IUM" . mt_rand(100000, 999999) . "S";
        
        $request->validate([
            'special_student_id'=> ['required','string', 'max:255'],
            'first_name'=> ['required','string', 'max:255'],
            'second_name'=> ['required','string', 'max:255'],
            'third_name'=> ['required','string', 'max:255'],
            'last_name'=> ['required','string', 'max:255'],
            'location'=> ['required','string', 'max:255'],
            'email'=> ['required','email', 'max:255'],
            'phone_number'=> ['required','string', 'max:255'],
            'password'=> ['required','string', 'max:255'],
            'avatar'=> ['image:jpeg,png,jpg'],
            'qualification'=> ['required','string', 'max:255'],
            'qualification_image'=> ['image:jpeg,png,jpg'],
            'passport_number'=> ['required','string', 'max:255'],
            'passport_image'=> ['image:jpeg,png,jpg'],
            'branch_id'=> ['required','integer', 'max:255'],
            'section_id'=> ['required','integer', 'max:255'],
            'specialization_id'=> ['required','integer', 'max:255'],
            'status'=> ['required','integer', 'max:255'],
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
        
        Student::create([
            'special_student_id'=> $request['special_student_id'],
            'first_name'=> $request['first_name'],
            'second_name'=> $request['second_name'],
            'third_name'=> $request['third_name'],
            'last_name'=> $request['last_name'],
            'location'=> $request['location'],
            'email'=> $request['email'],
            'phone_number'=> $request['phone_number'],
            'password'=> Hash::make($request['password']),
            'avatar'=> $avatarneme,
            'qualification'=> $request['qualification'],
            'qualification_image'=> $qualificationsneme,
            'passport_number'=> $request['passport_number'],
            'passport_image'=> $passportneme,
            'branch_id'=> $request['branch_id'],
            'section_id'=> $request['section_id'],
            'specialization_id'=> $request['specialization_id'],
            'status'=> $request['status'],
            'birthday'=> $request['birthday'],
            'nationality'=> $request['nationality'],
            'gender'=> $request['gender'],
            'graduation_rate'=> $request['graduation_rate'],
        ]);
        
        
        // return redirect('/student');
        return redirect()->back()->with('success', '  تم حفظ بيانات الطالب  '.$request['first_name'].'  بنجاح  ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findOrfail($id);
        return view('dashboard.students/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::Select('id', 'name')->where('status', 1)->get();
        $sections = Section::Select('id', 'name', 'stage_id')->get();
        $student = Student::findOrfail($id);
        return view('dashboard.students/edit', compact('student', 'branches', 'sections'));
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


      $request->validate([
       
        'first_name'                 => ['required','string', 'max:255'],
        'second_name'                => ['required','string', 'max:255'],
        'third_name'                 => ['required','string', 'max:255'],
        'last_name'                  => ['required','string', 'max:255'],
        'location'                   => ['required','string', 'max:255'],
        'email'                      => ['required','email', 'max:255'],
        'phone_number'               => ['required','string', 'max:255'],
        'qualification'              => ['required','string', 'max:255'],
        'passport_number'            => ['required','string', 'max:255'],
        'branch_id'                  => ['required','integer', 'max:255'],
        'section_id'                 => ['required','integer', 'max:255'],
        'specialization_id'          => ['required','integer', 'max:255'],
        'status'                     => ['required','integer', 'max:255'],
        'birthday'                   => ['required','string', 'max:255'],
        'nationality'                => ['required','string', 'max:255'],
        'gender'                     => ['required','string', 'max:255'],
        'graduation_rate'            => ['required','string', 'max:255'],
    ]);

    
        $student = Student::findOrfail($id);
        $student->fill($request->except('avatar', 'qualification_image', 'passport_image'));

        if(request()->hasFile('avatar')){

          $avatar = request()->file('avatar');
          $filename = time() .'.'. $avatar->getClientOriginalExtension();
          Image::make($avatar)->save(public_path('/uploads/students/avatars/' . $filename));
          $avatarneme = $filename;

          $student->avatar = $avatarneme;
          // Then we just save
          $student->save();

      }

      if(request()->hasFile('qualification_image')){

          $qualifications = request()->file('qualification_image');
          $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
          Image::make($qualifications)->save(public_path('/uploads/students/qualifications/' . $qualificationsname));
          $qualificationsneme = $qualificationsname;

          $student->qualification_image = $qualificationsneme;
          // Then we just save
          $student->save();

      }

      if(request()->hasFile('passport_image')){

          $passport = request()->file('passport_image');
          $passportname = time() .'.'. $passport->getClientOriginalExtension();
          Image::make($passport)->save(public_path('/uploads/students/passports/' . $passportname));
          $passportneme = $passportname;

          $student->passport_image = $passportneme;
          // Then we just save
          $student->save();

      }


        $student->update([
          'first_name'               => $request['first_name'],
          'second_name'              => $request['second_name'],
          'third_name'               => $request['third_name'],
          'last_name'                => $request['last_name'],
          'location'                 => $request['location'],
          'email'                    => $request['email'],
          'phone_number'             => $request['phone_number'],
          'qualification'            => $request['qualification'],
          'passport_number'          => $request['passport_number'],
          'branch_id'                => $request['branch_id'],
          'section_id'               => $request['section_id'],
          'specialization_id'        => $request['specialization_id'],
          'status'                   => $request['status'],
          'birthday'                 => $request['birthday'],
          'nationality'              => $request['nationality'],
          'gender'                   => $request['gender'],
          'graduation_rate'          => $request['graduation_rate'],
      ]);
        
        return redirect('/student');
    }



    public function active ($id){

        $activity = '1';
        Student::whereId($id)->update([
          'status' => $activity,
        ]);
      return redirect()->back();
        
      }
    
      public function unactive ($id){
    
        $unactivity = '0';
        Student::whereId($id)->update([
          'status' => $unactivity,
        ]);
      return redirect()->back();
        
      }

      public function downloadAvatar($id)
      {
        $file = Student::findOrfail($id);
        $d1 = $file->avatar;
        $pathToFile = public_path(). "/uploads/students/avatars/" .$d1;
        //dd($pathToFile);
        return response()->download($pathToFile);
      }

      public function downloadQualification($id)
      {
        $file = Student::findOrfail($id);
        $d1 = $file->imageOfQualification;
        $pathToFile = public_path(). "/uploads/students/qualifications/" .$d1;
        //dd($pathToFile);
        return response()->download($pathToFile);
      }

      public function downloadPassport($id)
      {
        $file = Student::findOrfail($id);
        $d1 = $file->imageOfPassport;
        $pathToFile = public_path(). "/uploads/students/passports/" .$d1;
        //dd($pathToFile);
        return response()->download($pathToFile);
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student');
    }

    public function getAjaxStudent($specialization_id)
   {
       $students = Student::Select('id', 'first_name', 'second_name', 'last_name')->Where('specialization_id', $specialization_id)->get();
 
       if($students == null){
 
         $students = 'null';
       }
 
       return  compact('students');
   }
}
