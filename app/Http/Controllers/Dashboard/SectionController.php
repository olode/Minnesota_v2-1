<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Section;
use App\Models\Student;

class SectionController extends Controller 
{
  public function __construct()
    {
      $this->middleware(['auth', 'super-admin']);
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   **/

  public function getAjaxSections($stage_id)
  {
      $sections = Section::Select('id', 'name')->Where('stage_id', $stage_id)->get();

      if($sections == null){

        $sections = 'null';
      }

      return  compact('sections');
  }


  public function index()
  {
    $sections = Section::with(['student_count', 'classes_count', 'material_count'])->get();
    
    // $students = Student::Select('id')->count();
    return view('dashboard.sections.index', compact('sections'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $stages = Stage::all();
    return view('dashboard.sections/create', compact('stages'));   
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'info' => ['required', 'string', 'max:255'],
      'stage_id' => ['required'],
    ]);
    
    $stages   = array($request->stage_id);
    if (!empty($stages)) {
      foreach ($stages as $value) {
      
        foreach ($value as $stage) {
          Section::create([
            'name' => $request['name'],
            'info' => $request['info'],
            'stage_id' => $stage,
          ]);
        }
      }
      return redirect('/section');

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
    $section = Section::findOrfail($id);
    $stages = Stage::all();
    return view('dashboard.sections/edit', compact('section', 'stages'));
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
      'name' => ['required', 'string', 'max:255'],
      'info' => ['required', 'string', 'max:255'],
      'stage_id' => ['required'],
    ]);

    $section = Section::findOrfail($id);
    $section->update($request->all());

    return redirect('/section');
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Section::destroy($id);
    return redirect()->back();
  }

  public function getSections($stage_id)
  {
    $sections = Section::where('stage_id', $stage_id)->pluck('name', 'id');
    return compact('sections');

  }
  
}

?>