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




Route::get('c-panel', 'HomeController@index')->name('c-panel');



//Route::Post(bran/{id}/active, 'Dashboard\BrancheController@active');


Route::resource('user', 'UserController');
Route::post('uactive/{uactive}', 'UserController@active')->name('user.active');
Route::post('uunactive/{uunactive}', 'UserController@unactive')->name('user.unactive');


Route::resource('branche', 'Dashboard\BrancheController');
Route::post('active/{active}', 'Dashboard\BrancheController@active')->name('branche.active');
Route::post('unactive/{unactive}', 'Dashboard\BrancheController@unactive')->name('branche.unactive');
Route::resource('section', 'Dashboard\SectionController');
Route::resource('specialization', 'Dashboard\SpecializationController');
Route::post('sactive/{sactive}', 'Dashboard\SpecializationController@active')->name('specialization.active');
Route::post('sunactive/{sunactive}', 'Dashboard\SpecializationController@unactive')->name('specialization.unactive');
Route::resource('specializationplan', 'Dashboard\SpecializationPlanController');
Route::resource('material', 'Dashboard\MaterialController');
Route::resource('stage', 'Dashboard\StageController');

Route::resource('studentclass', 'StudentClassController');
Route::resource('semester', 'SemesterController');
Route::resource('class', 'ClassController');
Route::resource('year', 'YearController');




Route::resource('studentmark', 'Dashboard\StudentMarkController');
Route::resource('studentmaterial', 'Dashboard\StudentMaterialController');
Route::resource('student', 'Dashboard\StudentController');
Route::post('stuactive/{stuactive}', 'Dashboard\StudentController@active')->name('student.active');
Route::post('stuunactive/{stuunactive}', 'Dashboard\StudentController@unactive')->name('student.unactive');
Route::get('student/download/avatar/{id}', 'Dashboard\StudentController@downloadAvatar')->name('avatar.download');
Route::get('student/download/qualification/{id}', 'Dashboard\StudentController@downloadQualification')->name('qualification.download');
Route::get('student/download/passport/{id}', 'Dashboard\StudentController@downloadPassport')->name('passport.download');


Route::resource('teacher', 'Dashboard\TeacherController');
Route::post('tuactive/{tuactive}', 'Dashboard\TeacherController@active')->name('teacher.active');
Route::post('tuunactive/{tuunactive}', 'Dashboard\TeacherController@unactive')->name('teacher.unactive');
Route::post('stuunactive/{stuunactive}', 'Dashboard\TeacherController@unactive')->name('student.unactive');
Route::get('teacher/download/tavatar/{id}', 'Dashboard\TeacherController@downloadAvatar')->name('avatar.teacher');
Route::get('teacher/download/tqualification/{id}', 'Dashboard\TeacherController@downloadQualification')->name('qualification.teacher');
Route::get('teacher/download/tpassport/{id}', 'Dashboard\TeacherController@downloadPassport')->name('passport.teacher');




Route::resource('teachermaterial', 'Dashboard\TeacherMateriasController');
Route::resource('marktype', 'Dashboard\MarkTypeController');
Route::resource('schedule', 'Dashboard\ScheduleController');





Route::resource('student-profile','StudentProfile\StudentController');
Route::get('student-plan','StudentProfile\StudentController@studentPlan')->name('student-plan');
Route::get('student-semester/{semester}/materials','StudentProfile\StudentController@studentSemesterMaterials')->name('student-semester-materials');
Route::get('student-semesters','StudentProfile\StudentController@studentSemesters')->name('student-semesters');
Route::get('student-shwo-marks','StudentProfile\StudentController@studentShowMarks')->name('student-shwo-marks');
Route::get('student-shwo-materials','StudentProfile\StudentController@studentShowMaterials')->name('student-shwo-materials');


Route::get('student-login',function(){

    return view('student-profile.user.login');
})->name('student-login');












/*********************************************/
/*********************************************/
/**********the start of teacher part**********/
/*********************************************/
/*********************************************/
/*********************************************/
Route::get('teacher-profile-assign-course','TeacherProfile\CourseAssignController@assignCourse')->name('teacher-profile-assign-course');
Route::get('assign-course/{id}','TeacherProfile\CourseAssignController@showCoursesToAssign')->name('assign.course');
Route::post('assign-student-to-course','TeacherProfile\CourseAssignController@assignStudentToCourses')->name('assign.student-to.course');
Route::resource('teacher-profile','TeacherProfile\TeacherController');
Route::resource('news-announcements','TeacherProfile\NewsAnnouncementController');
Route::resource('teacher-profile-students','TeacherProfile\TeacherProfileStudentController');
Route::resource('student-home-work','TeacherProfile\StudentHomeWorkController');
Route::get('follow-up-homework','TeacherProfile\StudentHomeWorkController@followUpHomework')->name('follow-up-homework');
Route::resource('lectures','TeacherProfile\LectureAttendanceController');
Route::get('lecture-attendance','TeacherProfile\LectureAttendanceController@studentAttendance')->name('lecture-attendance');
Route::get('lecture/download/about/{id}', 'TeacherProfile\LectureAttendanceController@downloadAbout')->name('about.download');
Route::resource('marks','TeacherProfile\MarkController');
Route::get('add-homework-marks','TeacherProfile\MarkController@addHomeworkMarks')->name('add-homework-marks');
Route::get('add-attendance-marks','TeacherProfile\MarkController@addAttendanceMarks')->name('add-attendance-marks');
Route::get('add-mid-exam-marks','TeacherProfile\MarkController@addMidExamMarks')->name('add-mid-exam-marks');
Route::get('add-final-exam-marks','TeacherProfile\MarkController@addFinalExamMarks')->name('add-final-exam-marks');

/*********************************************/
/*********************************************/
/**********the end of teacher part**********/
/*********************************************/
/*********************************************/
/*********************************************/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*********************************************/
/*********************************************/
/**********the start of login part**********/
/*********************************************/
/*********************************************/
/*********************************************/

Route::get('login-teacher-portal', 'Auth\Teacher\LoginController@loginTeacherPortal')->name('teacher.login');
Route::post('login-teacher-portal', 'Auth\Teacher\LoginController@teacherLogin')->name('teacher.login.submit');
Route::get('login-student-portal', 'Auth\Student\LoginController@loginStudentPortal')->name('student.login');
Route::post('login-student-portal', 'Auth\Student\LoginController@studentLogin')->name('student.login.submit');


/*********************************************/
/*********************************************/
/**********the end of login part**********/
/*********************************************/
/*********************************************/
/*********************************************/


/*********************************************/
/*********************************************/
/**********the start of ajax part**********/
/*********************************************/
/*********************************************/
/*********************************************/

/********** Assign Student Course ************/
Route::get('getSpecializations/{stage_id}', 'Dashboard\SpecializationController@getSpecializations');


/************ Student attendance ************/
Route::get('getSections/{stageID}', 'Dashboard\SectionController@getSections');
Route::get('get-Students', 'TeacherProfile\TeacherAjaxController@getStudents')->name('get-students');
// Route::get('get-stages', function(){
//     $stages = DB::table('stages')->Where('id', )->get();

//     return compact('stages');
// });
Route::get('get-stage-specialization/{stage_id}', 'Dashboard\SpecializationController@getAjaxSpecializationsFromStageID');
Route::get('get-stages/{branch_id}', 'Dashboard\StageController@getAjaxStages');
Route::get('get-section/{stage_id}', 'Dashboard\SectionController@getAjaxSections');
Route::get('get-specialization/{section_id}', 'Dashboard\SpecializationController@getAjaxSpecializations');
Route::get('get-material/{specialization_id}', 'Dashboard\MaterialController@getAjaxMaterial');

/***************************/
/*****Student Attendence****/
/***************************/

//Route::get('get-section/{stage_id}', 'Dashboard\SpecializationController@getAjaxSpecialization');
//Route::get('get-specialization/{section_id}', 'Dashboard\SpecializationController@getAjaxSpecializations');
//Route::get('get-material/{specialization_id}', 'Dashboard\MaterialController@getAjaxMaterial');
/*********************************************/
/*********************************************/
/**********the end of ajax part**********/
/*********************************************/
/*********************************************/
/*********************************************/