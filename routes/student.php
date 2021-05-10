<?php 

Route::group(['middleware' => 'preventBackHistory'], function()
{
    

Route::get('student-login',function(){

    return view('student-profile.user.login');
    
})->name('student-login');


Route::resource('student-profile','StudentProfile\StudentController');
Route::post('get-in-class','StudentProfile\StudentController@getInClass')->name('get-in-class');
Route::get('student-plan','StudentProfile\StudentController@studentPlan')->name('student-plan');
Route::get('student-semester/{semester}/materials','StudentProfile\StudentController@studentSemesterMaterials')->name('student-semester-materials');
Route::get('student-semesters','StudentProfile\StudentController@studentSemesters')->name('student-semesters');
Route::get('student-shwo-marks','StudentProfile\StudentController@studentShowMarks')->name('student-shwo-marks');
Route::get('student-shwo-materials','StudentProfile\StudentController@studentShowMaterials')->name('student-shwo-materials');


});