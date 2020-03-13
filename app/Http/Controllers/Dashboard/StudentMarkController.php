<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentMark;
use App\Models\Student;
use App\Models\MarkType;
use App\Models\StudentMaterial;


class StudentMarkController extends Controller 
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
    $students = StudentMark::all();
    return view('dashboard.students_marks/index', compact('students'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $students = Student::all();
    $marks = MarkType::all();
    $materials = StudentMaterial::all();
    return view('dashboard.students_marks/create', compact('students', 'marks', 'materials'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    //dd($request->all());
    $id = $request['mark_types_id'];
    $maxmark = $request['student_mark'];
    $marktype = MarkType::findOrfail($id);
    $mark = $marktype->student_mark;
    
    if ($maxmark === $mark Or $maxmark  < $mark ) {

      StudentMark::create($request->all());
      return redirect('/studentmark');

    } else {
      
      return redirect()->back();
    
    }
    
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
    //dd($id);
    $studentmark = StudentMark::findOrfail($id);
    $students = Student::all();
    $marks = MarkType::all();
    $materials = StudentMaterial::all();
    return view('dashboard.students_marks/edit', compact('studentmark', 'students', 'marks', 'materials'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $data = StudentMark::findOrFail($id);

    $data->update($request->all());

    return redirect('/studentmark');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    StudentMark::destroy($id);
    return redirect()->back();
  }
  
}

?>