<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\ClassInfo;
use App\Models\Semester;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentClassController extends Controller 
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
    $studentClasses   = StudentClass::all();
    return view('dashboard.student_classes/index', compact('studentClasses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $branches   = Branch::select('name', 'id')->get();
    $semesters  = Semester::select('title', 'id', 'specialization_id')->get();
    $classes    = ClassInfo::select('name', 'id', 'material_id')->get();
    $years      = Year::all();
    return view('dashboard.student_classes/create', compact('branches', 'semesters', 'classes', 'years'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    $request->validate([
      'branch_id'                  => ['required', 'integer', 'max:255'],
      'stage_id'                   => ['required', 'integer', 'max:255'],
      'section_id'                 => ['required', 'integer', 'max:255'],
      'specialization_id'          => ['required', 'integer', 'max:255'],
      'semester_id'                => ['required', 'integer', 'max:255'],
      'student_id'                 => ['required', 'integer'],
      'class_id'                   => ['required', 'integer', 'max:255'],
      'year_id'                    => ['required', 'integer', 'max:255'],

    ]);
    //dd($request->all());
    StudentClass::create([
      'semester_id'                     => $request['semester_id'],
      'student_id'                      => $request['student_id'],
      'class_id'                        => $request['class_id'],
      'year_id'                         => $request['year_id'],
    ]);

  return redirect('/studentclass');
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
    $student    = StudentClass::findOrfail($id);
    $branches   = Branch::select('name', 'id')->get();
    $semesters  = Semester::select('tittle', 'id')->get();
    $classes    = ClassInfo::select('name', 'id')->get();
    $years      = Year::all();
    return view('dashboard.student_classes/edit', compact('student', 'branches', 'semesters', 'classes', 'years'));
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
      'specialization_id'          => ['required', 'integer', 'max:255'],
      'semester_id'                => ['required', 'integer', 'max:255'],
      'student_id'                 => ['required', 'integer', 'max:255'],
      'class_id'                   => ['required', 'integer', 'max:255'],
      'year_id'                    => ['required', 'integer', 'max:255'],

    ]);

    $studentClass = StudentClass::findOrfail($id);
    $studentClass->update([
      'semester_id'                     => $request['semester_id'],
      'student_id'                      => $request['student_id'],
      'class_id'                        => $request['class_id'],
      'year_id'                         => $request['year_id'],
    ]);
        
    return redirect('/studentclass');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    StudentClass::destroy($id);
    return redirect()->back();
  }

  public function getAjaxStudentClass($class_id)
   {
       $students = StudentClass::with(['student:id,first_name,second_name,third_name,last_name'])->Where('class_id', $class_id)->get()->unique('student_id');
 
       if($students == null){
 
         $students = 'null';
       }
 
       return  compact('students');
   }
  
}

?>