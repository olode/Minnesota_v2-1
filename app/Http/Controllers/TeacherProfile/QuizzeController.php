<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzeController extends Controller 
{

  public function __construct()
    {
        $this->middleware('auth:teacher');
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $quizzes    = Quizze::all();
    return view('teacher-profile.quizzes.index', compact('quizzes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $teacherId= Auth::guard('teacher')->user()->id;
    $classes= ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.quizzes.create', compact('classes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'class_id'          => ['required', 'integer'],
      'date'              => ['required', 'date'],
      'title'             => ['required', 'string'],
      'full_mark'         => ['required', 'integer'],
  ]);

  Quizze::create($request->all());
    return redirect('/quizze');

    // dd($request->all());
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
    $quizze             =   Quizze::findOrfail($id);
    $teacherId          =   Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.quizzes.edit', compact('quizze', 'classes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $quizze = Quizze::findOrfail($id);
    $quizze->update($request->all());
        
    return redirect('/quizze');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Quizze::destroy($id);
    return redirect()->back();
  }
  
}

?>