<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Psr7\hash;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ResetController extends Controller
{
    
    public function resetPage(Request $request, $id)
    {
        // $student_email  = Student::findOrfail($id)->email;
        $student_phone  = Student::findOrfail($id)->phone_number;
        $student_password  = Student::findOrfail($id);

        // dd($student_password);
        $student_password->update([
            'password' => Hash::make($student_phone),
        ]);
        
        session()->flash('success','تمت الإستعادة بنجاح');
        return redirect()->back();

        
    }
}
