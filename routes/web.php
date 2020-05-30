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
// Route::resource('specializationplan', 'Dashboard\SpecializationPlanController');
Route::resource('material', 'Dashboard\MaterialController');
Route::resource('stage', 'Dashboard\StageController');


Route::resource('semester', 'Dashboard\SemesterController');
Route::resource('class', 'Dashboard\ClassController');
Route::resource('studentclass', 'Dashboard\StudentClassController');



Route::resource('role', 'RoleController');
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
// Route::resource('schedule', 'Dashboard\ScheduleController');





Route::resource('student-profile','StudentProfile\StudentController');
Route::post('get-in-class','StudentProfile\StudentController@getInClass')->name('get-in-class');
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

Route::post('assign-course','TeacherProfile\CourseAssignController@assignToCourses')->name('assign.course');

Route::post('assign-student-to-course','TeacherProfile\CourseAssignController@assignStudentToCourses')->name('assign.student-to.course');
Route::resource('teacher-profile','TeacherProfile\TeacherController');
Route::resource('news-announcements','TeacherProfile\NewsAnnouncementController');
Route::resource('teacher-profile-students','TeacherProfile\TeacherProfileStudentController');
Route::resource('student-home-work','TeacherProfile\StudentHomeWorkController');

Route::resource('lectures','TeacherProfile\LectureAttendanceController');
Route::get('lecture-attendance','TeacherProfile\LectureAttendanceController@studentAttendance')->name('lecture-attendance');
Route::get('lecture/download/about/{id}', 'TeacherProfile\LectureAttendanceController@downloadAbout')->name('about.download');
Route::resource('marks','TeacherProfile\MarkController');
Route::get('add-homework-marks','TeacherProfile\MarkController@addHomeworkMarks')->name('add-homework-marks');
Route::get('add-attendance-marks','TeacherProfile\MarkController@addAttendanceMarks')->name('add-attendance-marks');
Route::get('add-mid-exam-marks','TeacherProfile\MarkController@addMidExamMarks')->name('add-mid-exam-marks');
Route::get('add-final-exam-marks','TeacherProfile\MarkController@addFinalExamMarks')->name('add-final-exam-marks');

Route::resource('follow-up-homework','TeacherProfile\FollowUpHomeworkController');
Route::put('homework-mark-update/{id}', 'TeacherProfile\FollowUpHomeworkController@markUpdate')->name('homework-mark-update');

Route::post('preparation-student', 'TeacherProfile\LectureAttendanceController@preparation')->name('preparation');

Route::resource('quizze', 'TeacherProfile\QuizzeController');
Route::resource('followupquizze', 'TeacherProfile\FollowUpQuizzeController');
Route::resource('finalexam', 'TeacherProfile\FinalExamController');
Route::resource('followupfinalexam', 'TeacherProfile\FollowUpFinalExamController');

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
// Route::get('get-stages', function(){
//     $stages = DB::table('stages')->Where('id', )->get();

//     return compact('stages');
// });

Route::get('get-stages/{branch_id}', 'Dashboard\StageController@getAjaxStages');
Route::get('get-section/{stage_id}', 'Dashboard\SectionController@getAjaxSections');
Route::get('get-specialization/{section_id}', 'Dashboard\SpecializationController@getAjaxSpecializations');
Route::get('get-material/{specialization_id}', 'Dashboard\MaterialController@getAjaxMaterial');
Route::get('get-student/{specialization_id}', 'Dashboard\StudentController@getAjaxStudent');
Route::get('get-student-class/{class_id}', 'Dashboard\StudentClassController@getAjaxStudentClass');
Route::get('get-class/{section_id}', 'Dashboard\ClassController@getAjaxClass');

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


/*
 * **************************************************
 * ****************Teacher Page Ajaxes***************
 * **************************************************
*/
Route::get('get-stage-section/{stage_id}', 'TeacherProfile\TeacherAjaxController@getAjaxSectionsFromStageID');

Route::get('get-stage-specialization/{section_id}', 'TeacherProfile\TeacherAjaxController@getAjaxSpecializationsFromSctionID');

Route::get('get-stage-semester/{specialization_id}', 'TeacherProfile\TeacherAjaxController@getAjaxSemesterFromSpecializatioID');

Route::get('get-stage-class/{semester_id}', 'TeacherProfile\TeacherAjaxController@getAjaxClassFromSemesterID');
Route::get('get-section-class/{section_id}', 'TeacherProfile\TeacherAjaxController@getAjaxClassFromSectionID');

Route::get('get-stage-lecture/{class_id}', 'TeacherProfile\TeacherAjaxController@getAjaxLectureFromClassID');
Route::get('get-class-quizze/{class_id}', 'TeacherProfile\TeacherAjaxController@getAjaxQuizzeFromClassID');
Route::get('get-class-finalexam/{class_id}', 'TeacherProfile\TeacherAjaxController@getAjaxFinalExamFromClassID');

Route::get('get-lecture-homework/{lecture_id}', 'TeacherProfile\TeacherAjaxController@getAjaxHomeworkFromLectureID');

Route::get('get-Students', 'TeacherProfile\TeacherAjaxController@getStudents')->name('get-students');
Route::post('get-teacher-Students', 'TeacherProfile\TeacherAjaxController@getTeacherStudents')->name('get-teacher-students');
Route::post('get-students-to-attendance', 'TeacherProfile\TeacherAjaxController@getLectureStudents')->name('get-students-to-attendance');
Route::post('follow-up-homework-students', 'TeacherProfile\TeacherAjaxController@getHomeworkStudents')->name('follow-up-homework-students');
Route::post('follow-up-quizze-students', 'TeacherProfile\TeacherAjaxController@getClassStudentsForQuizze')->name('follow-up-quizze-students');
Route::post('follow-up-finalexam-students', 'TeacherProfile\TeacherAjaxController@getClassStudentsForFinalExam')->name('follow-up-finalexam-students');