<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Stage;
use App\Models\Section;
use App\Models\Specialization;

class SpecializationController extends Controller 
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

  public function getAjaxSpecializationsFromStageID($stage_id)
  {
      $specializations = Specialization::Select('id', 'name')->Where('stage_id', $stage_id)->get();
      
      if($specializations == null){

        $specializations = 'null';
      }

      return  compact('specializations');
  }

  public function getAjaxSpecializations($section_id)
  {
      $specializations = Specialization::Select('id', 'name')->Where('section_id', $section_id)->get();
      
      if($specializations == null){

        $specializations = 'null';
      }

      return  compact('specializations');
  }

  public function index()
  {
    $datas = Specialization::all();
   return view('dashboard.specializations/index', compact('datas')); 
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $sections = Section::all();
    $stages   = Stage::all();
    $branches = Branch::Select('id', 'name')->Where('status', 1)->get();
    return view('dashboard.specializations/create', compact('branches', 'stages', 'sections'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
   
    $request->validate([
      'name'                                      => ['required', 'string', 'max:255'],
      'info'                                      => ['required', 'string', 'max:255'],
      'max_student_number'                        => ['required', 'string', 'max:255'],
      'section_id'                                => ['required', 'integer', 'max:255'],
      'status'                                    => ['required', 'integer', 'max:255'],
      'stage_id'                                  => ['required', 'integer', 'max:255'],
      'branch_id'                                 => ['required', 'integer', 'max:255'],
      'fees'                                      => ['required', 'string', 'max:255'],
      'number_of_materials'                       => ['required', 'integer', 'max:255'],
      'number_of_mandatory_materials'             => ['required', 'integer', 'max:255'],
      'number_of_optional_materials'              => ['required', 'integer', 'max:255'],
      'number_of_higher_levels'                   => ['required', 'integer', 'max:255'],
      'number_of_lower_levels'                    => ['required', 'integer', 'max:255'],
    ]);

    Specialization::create($request->all());

    return redirect('/specialization');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $data = Specialization::findOrfail($id);
    return view('dashboard.specializations/show', compact('data'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $special = Specialization::findOrfail($id);
    $sections = Section::all();
    $stages   = Stage::all();
    $branches = Branch::Select('id', 'name')->Where('status', 1)->get();
    return view('dashboard.specializations/edit', compact('sections', 'special', 'stages', 'branches'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $specialization = Specialization::findOrfail($id);
    $specialization->update($request->all());

    return redirect('/specialization');
  }

  
  public function getAjaxSpecialization($stage_id)
  {
    $stages = Specialization::Select('id', 'name')->Where('stage_id', $stage_id)->get();
    if($stages == null){
      $stages = 'null';

    }
  }

  public function active ($id){

    $activity = '1';
    Specialization::whereId($id)->update([
      'status' => $activity,
    ]);
  return redirect()->back();
    
  }

  public function unactive ($id){

    $unactivity = '0';
    Specialization::whereId($id)->update([
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
    Specialization::destroy($id);

    return redirect()->back();
  }
  
}

?>