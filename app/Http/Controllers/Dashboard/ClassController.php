<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\Material;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Stage;
use App\Models\StudentClass;
use App\Models\Teacher;
use App\Models\Year;
use Illuminate\Http\Request;

class ClassController extends Controller 
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
    $classes  = ClassInfo::all();
    return view('dashboard.classes/index', compact('classes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $stages     = Stage::select('name', 'id')->get();
    $sections   = Section::select('name', 'id')->get();
    $semesters  = Semester::select('title', 'id')->get();
    $materials  = Material::select('name', 'id')->get();
    $teachers   = Teacher::select('first_name', 'second_name', 'last_name', 'id')->get();
    $years      = Year::select('year_m', 'id')->get();
    return view('dashboard.classes/create', compact('stages', 'sections', 'semesters', 'materials', 'teachers', 'years'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    
    $request->validate([
      'stage_id'                                   => ['required', 'integer', 'max:255'],
      'section_id'                                 => ['required', 'integer', 'max:255'],
      'semester_id'                                => ['required', 'integer', 'max:255'],
      'material_id'                                => ['required', 'integer', 'max:255'],
      'teacher_id'                                 => ['required', 'integer', 'max:255'],
      'year_id'                                    => ['required', 'max:255'],
      'name'                                       => ['required', 'string', 'max:255'],
      'class_day'                                  => ['required', 'string', 'max:255'],
      'starts_at'                                  => ['required', 'max:255'],
      'ends_at'                                    => ['required', 'max:255'],
      'max_student'                                => ['required', 'integer', 'max:255'],
      'lecturing_allowance'                        => ['required', 'string', 'max:255'],
      'classroom_url'                              => ['required', 'url', 'max:255'],
      'required_attendance'                        => ['required', 'integer', 'max:255'],
      'class_fee'                                  => ['required', 'string', 'max:255'],
      'fee_due_date'                               => ['required', 'date', 'max:255'],
    ]);
      
    //dd($request->all());
    ClassInfo::create($request->all());

    return redirect('/class');
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
    $class      = ClassInfo::findOrfail($id);
    $stages     = Stage::select('name', 'id')->get();
    $sections   = Section::select('name', 'id')->get();
    $semesters  = Semester::select('tittle', 'id')->get();
    $materials  = Material::select('name', 'id')->get();
    $teachers   = Teacher::select('first_name', 'second_name', 'last_name', 'id')->get();
    $years      = Year::select('year_m', 'id')->get();
    return view('dashboard.classes/edit', compact('class', 'stages', 'sections', 'semesters', 'materials', 'teachers', 'years'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $class = ClassInfo::findOrfail($id);
    $class->update($request->all());
    
    return redirect('/class');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    ClassInfo::destroy($id);
    return redirect()->back();
  }

  

  public function getAjaxClass($section_id)
   {
       $classes = ClassInfo::Select('id', 'name')->Where('section_id', $section_id)->get();
 
       if($classes == null){
 
         $classes = 'null';
       }
 
       return  compact('classes');
   }
  
}

?>