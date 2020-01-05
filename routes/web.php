<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('c-panel', function () {
    return view('dashboard.index');
})->name('c-panel');



Route::resource('students','Dashboard\StudentController');
Route::resource('teachers','Dashboard\TeacherController');
Route::resource('branches','Dashboard\BrancheController');
Route::resource('sections','Dashboard\SectionController');
Route::resource('materials','Dashboard\MaterialController');


Route::resource('student-profile','StudentProfile\StudentController');
Route::get('student-plan','StudentProfile\StudentController@studentPlan')->name('student-plan');
Route::get('student-semesters','StudentProfile\StudentController@studentSemesters')->name('student-semesters');
Route::get('student-shwo-marks','StudentProfile\StudentController@studentShowMarks')->name('student-shwo-marks');
Route::get('student-shwo-materials','StudentProfile\StudentController@studentShowMaterials')->name('student-shwo-materials');


Route::get('student-login',function(){

    return view('student-profile.user.login');
})->name('student-login');



Route::resource('teacher-profile','TeacherProfile\TeacherController');


Route::resource('news-announcements','TeacherProfile\NewsAnnouncementController');
Route::resource('teacher-profile-students','TeacherProfile\TeacherProfileStudentController');

Route::get('teacher-profile-assign-course','TeacherProfile\TeacherProfileStudentController@assignCourse')->name('teacher-profile-assign-course');


Route::resource('student-home-work','TeacherProfile\StudentHomeWorkController');
Route::get('follow-up-homework','TeacherProfile\StudentHomeWorkController@followUpHomework')->name('follow-up-homework');


Route::resource('lectures','TeacherProfile\LectureAttendanceController');
Route::get('lecture-attendance','TeacherProfile\LectureAttendanceController@studentAttendance')->name('lecture-attendance');


Route::resource('marks','TeacherProfile\MarkController');


Route::get('add-homework-marks','TeacherProfile\MarkController@addHomeworkMarks')->name('add-homework-marks');
Route::get('add-attendance-marks','TeacherProfile\MarkController@addAttendanceMarks')->name('add-attendance-marks');
Route::get('add-mid-exam-marks','TeacherProfile\MarkController@addMidExamMarks')->name('add-mid-exam-marks');
Route::get('add-final-exam-marks','TeacherProfile\MarkController@addFinalExamMarks')->name('add-final-exam-marks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
