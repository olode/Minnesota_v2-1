<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Image;
use Auth;
use App\Models\Branche;

class UserController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::all();
    return view('dashboard/user/index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

  /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    }


   /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
      $branches = Branche::all();
        return view('dashboard.user.create', compact('branches'));
    }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    //dd(request()->all());
    $request->validate( [
          'firstName' => ['required', 'string', 'max:255'],
          'secondName' => ['required', 'string', 'max:255'],
          'lastName' => ['required', 'string', 'max:255'],
          'email'=>['required', 'string', 'email', 'max:255'],
          'phoneNumber'=>['required', 'string', 'max:255'],
          'avatar'=>[],
          'password'=>['required'],
          'branche_id'=>['required', 'integer', 'max:255'],
          'status'=>['required', 'integer', 'max:255'],
      ]);

        //dd($data);

        $avatarneme = '';
        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/users/avatars/' . $filename));
            $avatarneme = $filename;

        }

        //dd($data);
         User::create([
            'firstName' => $request['firstName'],
            'secondName' => $request['secondName'],
            'lastName' => $request['lastName'],
            'email'=> $request['email'],
            'phoneNumber'=> $request['phoneNumber'],
            'avatar'=> $avatarneme,
            'branche_id'=> $request['branche_id'],
            'status'=> $request['status'],
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect('/user');
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
    $data = User::find($id);
    //dd($data);
    return view('dashboard/user/edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $user = User::findOrfail($id);
    //dd(request()->all());
    $user->update(request()->all());

    return redirect('/user');
  }


  public function active ($id){

    $activity = '1';
    User::whereId($id)->update([
      'status' => $activity,
    ]);
  return redirect()->back();
    
  }

  public function unactive ($id){

    $unactivity = '0';
    User::whereId($id)->update([
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
    
  }
  
}

?>