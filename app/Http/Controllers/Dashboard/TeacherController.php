<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;

class TeacherController extends Controller 
{
  public function __construct()
    {
      $this->middleware(['auth', 'super-admin']);
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $teachers = Teacher::all();
        return view('dashboard.teachers/index', compact('teachers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('dashboard.teachers/create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $idNumber = "IUM" . mt_rand(100000, 999999) . "T";
    
        
        $request->validate([
          
            'first_name'                 => ['required','string', 'max:255'],
            'second_name'                => ['required','string', 'max:255'],
            'third_name'                 => ['required','string', 'max:255'],
            'last_name'                  => ['required','string', 'max:255'],
            'location'                   => ['required','string', 'max:255'],
            'job_description'            => ['required','string', 'max:255'],
            'specialization_name'        => ['required','string', 'max:255'],
            'qualification'              => ['required','string', 'max:255'],
            'email'                      => ['email','required','string', 'max:255'],
            'phone_number'               => ['required','string', 'max:255'],
            'status'                     => ['required','integer', 'max:255'],
            'passport_number'            => ['required','string', 'max:255'],
            'password'                   => ['required','string', 'max:255'],
        ]);


        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/teachers/avatars/' . $filename));
            $avatarneme = $filename;

        }else{
          $avatarneme = "defult.png";
        }

        if(request()->hasFile('qualification_image')){

            $qualifications = request()->file('qualification_image');
            $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
            Image::make($qualifications)->save(public_path('/uploads/teachers/qualifications/' . $qualificationsname));
            $qualificationsneme = $qualificationsname;

        }else{
          $qualificationsneme = "defult.png";
        }

        if(request()->hasFile('passport_image')){

            $passport = request()->file('passport_image');
            $passportname = time() .'.'. $passport->getClientOriginalExtension();
            Image::make($passport)->save(public_path('/uploads/teachers/passports/' . $passportname));
            $passportneme = $passportname;

        }else{
          $passportneme = "defult.png";
        }
        
        Teacher::create([
            'special_teacher_id'             => $idNumber,
            'first_name'                     => $request['first_name'],
            'second_name'                    => $request['second_name'],
            'third_name'                     => $request['third_name'],
            'last_name'                      => $request['last_name'],
            'specialization_name'            => $request['specialization_name'],
            'job_description'                => $request['job_description'],
            'location'                       => $request['location'],
            'email'                          => $request['email'],
            'phone_number'                   => $request['phone_number'],
            'password'                       => Hash::make($request['password']),
            'avatar'                         => $avatarneme,
            'qualification'                  => $request['qualification'],
            'qualification_image'            => $qualificationsneme,
            'passport_number'                => $request['passport_number'],
            'passport_image'                 => $passportneme,
            'status'                         => $request['status'],
        ]);
        
        
        return redirect('/teacher');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $data = Teacher::findOrfail($id);
    return view('dashboard.teachers/show', compact('data'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $teacher = Teacher::findOrfail($id);
    return view('dashboard.teachers/edit', compact('teacher'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {

    $request->validate([
      'first_name'=> ['required','string', 'max:255'],
      'second_name'=> ['required','string', 'max:255'],
      'third_name'=> ['required','string', 'max:255'],
      'last_name'=> ['required','string', 'max:255'],
      'location'=> ['required','string', 'max:255'],
      'job_description'=> ['required','string', 'max:255'],
      'specialization_name'=> ['required','string', 'max:255'],
      'qualification'=> ['required','string', 'max:255'],
      'email'=> ['email','required','string', 'max:255'],
      'phone_number'=> ['required','string', 'max:255'],
      'status'=> ['required','integer', 'max:255'],
      'passport_number'=> ['required','string', 'max:255'],
    ]);

    $teacher = Teacher::findOrfail($id);

    if(request()->hasFile('avatar')){

      $avatar = request()->file('avatar');
      $filename = time() .'.'. $avatar->getClientOriginalExtension();
      Image::make($avatar)->save(public_path('/uploads/teachers/avatars/' . $filename));
      $avatarneme = $filename;

      $teacher->avatar = $avatarneme;
      // Then we just save
      $teacher->save();

    }

    if(request()->hasFile('qualification_image')){

        $qualifications = request()->file('qualification_image');
        $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
        Image::make($qualifications)->save(public_path('/uploads/teachers/qualifications/' . $qualificationsname));
        $qualificationsneme = $qualificationsname;

        $teacher->qualification_image = $qualificationsneme;
        // Then we just save
        $teacher->save();

    }

    if(request()->hasFile('passport_image')){

        $passport = request()->file('passport_image');
        $passportname = time() .'.'. $passport->getClientOriginalExtension();
        Image::make($passport)->save(public_path('/uploads/teachers/passports/' . $passportname));
        $passportneme = $passportname;

        $teacher->passport_image = $passportneme;
        // Then we just save
        $teacher->save();

    }

        $teacher->update([
          'first_name'=> $request['first_name'],
          'second_name'=> $request['second_name'],
          'third_name'=> $request['third_name'],
          'last_name'=> $request['last_name'],
          'job_description'=> $request['job_description'],
          'specialization_name'=> $request['specialization_name'],
          'location'=> $request['location'],
          'email'=> $request['email'],
          'phone_number'=> $request['phone_number'],
          'qualification'=> $request['qualification'],
          'passport_number'=> $request['passport_number'],
          'status'=> $request['status'],
      ]);
        
        return redirect('/teacher');
  }

  public function active ($id){

    $activity = '1';
    Teacher::whereId($id)->update([
      'status' => $activity,
    ]);
  return redirect()->back();
    
  }

  public function unactive ($id){

    $unactivity = '0';
    Teacher::whereId($id)->update([
      'status' => $unactivity,
    ]);
  return redirect()->back();
    
  }



  public function downloadAvatar($id)
  {
    $file = Teacher::findOrfail($id);
    $d1 = $file->avatar;
    $pathToFile = public_path(). "/uploads/teachers/avatars/" .$d1;
    //dd($pathToFile);
    return response()->download($pathToFile);
  }

  public function downloadQualification($id)
  {
    $file = Teacher::findOrfail($id);
    $d1 = $file->imageOfQualification;
    $pathToFile = public_path(). "/uploads/teachers/qualifications/" .$d1;
    //dd($pathToFile);
    return response()->download($pathToFile);
  }

  public function downloadPassport($id)
  {
    $file = Teacher::findOrfail($id);
    $d1 = $file->imageOfPassport;
    $pathToFile = public_path(). "/uploads/teachers/passports/" .$d1;
    //dd($pathToFile);
    return response()->download($pathToFile);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Teacher::destroy($id);
    return redirect('/teacher');
  }
  
}

?>