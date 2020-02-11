<?php

namespace App\Http\Controllers\StudentProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Specialization;
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
        
        $students = Student::all();
        return view('student-profile.students/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specailizations = Specialization::all();
        return view('dashboard.students/create', compact('specailizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idNumber = mt_rand(1000000000, 9999999999);
        
        //dd($request->all());
        $request->validate([

            'id' => ['integer', 'max:255'],
            'firstName' => ['string', 'max:255'],
            'secondName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'location' => ['string', 'max:255'],
            'email' => ['string', 'max:255'],
            'phoneNumber' => ['string', 'max:255'],
            'password' => ['string', 'max:255'],
            'avatar' => [],
            'qualification' => ['string', 'max:255'],
            'imageOfQualification' => [],
            'passportNumber' => ['string', 'max:255'],
            'imageOfPassport' => [],
            'specialization_id' => ['integer', 'max:255'],
            'status' => ['integer', 'max:255'],
        ]);


        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/avatars/students/' . $filename));
            $avatarneme = $filename;

        }

        if(request()->hasFile('imageOfQualification')){

            $qualifications = request()->file('imageOfQualification');
            $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
            Image::make($qualifications)->save(public_path('/uploads/avatars/qualifications/' . $qualificationsname));
            $qualificationsneme = $qualificationsname;

        }

        if(request()->hasFile('imageOfPassport')){

            $passport = request()->file('imageOfPassport');
            $passportname = time() .'.'. $passport->getClientOriginalExtension();
            Image::make($passport)->save(public_path('/uploads/avatars/passports/' . $passportname));
            $passportneme = $passportname;

        }
        
        Student::create([
            'id' => $idNumber,
            'firstName' => $request['firstName'],
            'secondName' => $request['secondName'],
            'lastName' => $request['lastName'],
            'location' => $request['location'],
            'email' => $request['email'],
            'phoneNumber' => $request['phoneNumber'],
            'password' => Hash::make($request['password']),
            'avatar' => $avatarneme,
            'qualification' => $request['qualification'],
            'imageOfQualification' => $qualificationsneme,
            'passportNumber' => $request['passportNumber'],
            'imageOfPassport' => $passportneme,
            'specialization_id' => $request['specialization_id'],
            'status' => $request['status'],
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specailizations = Specialization::all();
        $student = Student::findOrfail($id);
        return view('dashboard.students/edit', compact('student', 'specailizations'));
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
}
