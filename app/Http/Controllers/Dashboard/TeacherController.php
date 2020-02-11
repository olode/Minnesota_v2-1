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
    $idNumber = mt_rand(100000, 999999);
        
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
        
        Teacher::create([
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
            'status' => $request['status'],
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