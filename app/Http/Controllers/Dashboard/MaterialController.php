<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Specialization;
use App\Models\Section;
class MaterialController extends Controller 
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
   public function getAjaxMaterial($specialization_id)
   {
       $materials = Material::Select('id', 'name')->Where('specialization_id', $specialization_id)->get();
 
       if($materials == null){
 
         $materials = 'null';
       }
 
       return  compact('materials');
   }


  public function index()
  {
    $data = Material::all();
    //dd($data);
    return view('dashboard.materials.index',compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $sections = Section::Select('id', 'name')->get();
    return view('dashboard.materials.create', compact('sections'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $idNumber = "IUM" . mt_rand(100000, 999999) . "M";
    //dd($request->all());
    $request->validate([

      'code'                      => ['string', 'max:255'],
      'name'                      => ['required', 'string', 'max:255'],
      'info'                      => ['required', 'string', 'max:255'],
      'max_mark'                  => ['required', 'string', 'max:255'],
      'max_students_number'       => ['required', 'integer', 'max:255'],
      'section_id'                => ['required', 'integer', 'max:255'],
      'specialization_id'         => ['required', 'integer', 'max:255'],
      'optional'                  => ['required', 'integer', 'max:255'],
      'requirement'               => ['required', 'integer', 'max:255'],
    ]);

    //dd($data);
    Material::create([
      'code'                      => $idNumber,
      'name'                      => $request['name'],
      'info'                      => $request['info'],
      'max_mark'                  => $request['max_mark'],
      'max_students_number'       => $request['max_students_number'],
      'section_id'                => $request['section_id'],
      'specialization_id'         => $request['specialization_id'],
      'optional'                  => $request['optional'],
      'requirement'               => $request['requirement'],
    ]);

  return redirect('/material');

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
    $material = Material::findOrfail($id);
    $sections = Section::Select('id', 'name')->get();
    return view('dashboard.materials/edit', compact('material', 'sections'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $material = Material::findOrfail($id);
    $material->update($request->all());

    return redirect('/material');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Material::destroy($id);
    return redirect()->back();
  }
  
}

?>