<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Year;

class SemesterController extends Controller 
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
    $semesters    = Semester::all();
    return view('dashboard.semesters/index', compact('semesters'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $specializations = Specialization::select('name', 'id')->get();
    $years           = Year::all();
    return view('dashboard.semesters/create', compact('specializations', 'years'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $request->validate([
        'title'                        => ['required', 'string', 'max:255'],
        'semester_code'                 => ['required', 'string', 'max:255'],
        'starts_at'                     => ['required', 'date', 'max:255'],
        'end_at'                        => ['required', 'date', 'max:255'],
        'max_courses'                   => ['required', 'integer', 'max:255'],
        'min_courses'                   => ['required', 'integer', 'max:255'],
        'semester_fee'                  => ['required', 'integer', 'max:255'],
        'min_paid'                      => ['required', 'integer', 'max:255'],
        'due_date'                      => ['required', 'date', 'max:255'],
        'year_id'                       => ['required', 'integer', 'max:255'],
        'specialization_id'             => ['required', 'integer', 'max:255'],
      ]);

      Semester::create($request->all());
      return redirect('/semester');

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

    $semester        = Semester::findOrfail($id);
    $specializations = Specialization::select('name', 'id')->get();
    $years           = Year::all();
    return view('dashboard.semesters/edit', compact('specializations', 'years', 'semester'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    // dd($id);
    $semester        = Semester::findOrfail($id);
    $semester->update($request->all());

    return redirect('/semester');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Semester::destroy($id);
    return redirect()->back();
  }
  
}

?>