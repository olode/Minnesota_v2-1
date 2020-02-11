<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Specialization;
class MaterialController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
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
    $datas = Specialization::all();
    return view('dashboard.materials.create', compact('datas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    //dd($request->all());
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'info' => ['required', 'string', 'max:255'],
      'maxMark' => ['required', 'string', 'max:255'],
      'maxStudentNumber' =>['required', 'integer', 'max:255'],
      'specialization_id' =>['required', 'integer', 'max:255'],
    ]);

    //dd($data);
    Material::create($request->all());

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
    $datas = Specialization::all();
    return view('dashboard.materials/edit', compact('material', 'datas'));
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