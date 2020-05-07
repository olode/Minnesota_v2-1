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
        $sections = Section::Select('id', 'name')->get();
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
        
        //dd($request->all());
        $request->validate([

            'special_student_id'         => ['string', 'max:255'],
            'first_name'                 => ['string', 'max:255'],
            'second_name'                => ['string', 'max:255'],
            'last_name'                  => ['string', 'max:255'],
            'location'                   => ['string', 'max:255'],
            'email'                      => ['string', 'max:255'],
            'phone_number'               => ['string', 'max:255'],
            'password'                   => ['string', 'max:255'],
            'avatar'                     => [],
            'qualification'              => ['string', 'max:255'],
            'qualification_image'        => [],
            'passport_number'            => ['string', 'max:255'],
            'passport_image'             => [],
            'branch_id'                  => ['integer', 'max:255'],
            'section_id'                 => ['integer', 'max:255'],
            'specialization_id'          => ['integer', 'max:255'],
            'status'                     => ['integer', 'max:255'],
            'birthday'                   => ['string', 'max:255'],
            'nationality'                => ['string', 'max:255'],
            'gender'                     => ['string', 'max:255'],
            'graduation_rate'            => ['string', 'max:255'],
        ]);


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
        
        Student::create([
            'special_student_id'       => $idNumber,
            'first_name'               => $request['first_name'],
            'second_name'              => $request['second_name'],
            'last_name'                => $request['last_name'],
            'location'                 => $request['location'],
            'email'                    => $request['email'],
            'phone_number'             => $request['phone_number'],
            'password'                 => Hash::make($request['password']),
            'avatar'                   => $avatarneme,
            'qualification'            => $request['qualification'],
            'qualification_image'      => $qualificationsneme,
            'passport_number'          => $request['passport_number'],
            'passport_image'           => $passportneme,
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
        $sections = Section::Select('id', 'name')->get();
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
        $student = Student::findOrfail($id);
        $student->update($request->all());
        
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
