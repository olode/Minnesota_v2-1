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
        $this->middleware('auth');
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
        
        //dd($request->all());
        $request->validate([

            'special_teacher_id'         => ['string', 'max:255'],
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
            'status'                     => ['integer', 'max:255'],
        ]);


        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/teachers/avatars/' . $filename));
            $avatarneme = $filename;

        }

        if(request()->hasFile('qualification_image')){

            $qualifications = request()->file('qualification_image');
            $qualificationsname = time() .'.'. $qualifications->getClientOriginalExtension();
            Image::make($qualifications)->save(public_path('/uploads/teachers/qualifications/' . $qualificationsname));
            $qualificationsneme = $qualificationsname;

        }

        if(request()->hasFile('passport_image')){

            $passport = request()->file('passport_image');
            $passportname = time() .'.'. $passport->getClientOriginalExtension();
            Image::make($passport)->save(public_path('/uploads/teachers/passports/' . $passportname));
            $passportneme = $passportname;

        }
        
        Teacher::create([
            'special_teacher_id'             => $idNumber,
            'first_name'                     => $request['first_name'],
            'second_name'                    => $request['second_name'],
            'last_name'                      => $request['last_name'],
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
    $teacher = Teacher::findOrfail($id);
        $teacher->update($request->all());
        
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