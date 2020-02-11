<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //dd($data);

        $avatarneme = '';
        if(request()->hasFile('avatar')){

            $avatar = request()->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/avatars/' . $filename));
            $avatarneme = $filename;

        }

        //dd($data);
         User::create([
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'lastName' => $data['lastName'],
            'email'=> $data['email'],
            'phoneNumber'=> $data['phoneNumber'],
            'avatar'=> $avatarneme,
            'branche_id'=> $data['branche_id'],
            'status'=> $data['status'],
            'password' => Hash::make($data['password']),
        ]);
        
        $users = User::all();
        
        return view('auth.index', compact('users'));
    }
}
