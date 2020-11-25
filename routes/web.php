<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	// $comingcourses = App\Course::where('status', 'coming')->get();
	// $nowcourses = App\Course::where('status', 'now')->get();
	// $pastcourses = App\Course::where('status', 'past')->get();
	// return view('welcome', compact('comingcourses', 'nowcourses', 'pastcourses'));
	return view('welcome2');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/courses', function () {
	$comingcourses = App\Course::where('status', 'coming')->get();
	$nowcourses = App\Course::where('status', 'now')->get();
	$pastcourses = App\Course::where('status', 'past')->get();
	return view('courses', compact('comingcourses', 'nowcourses', 'pastcourses'));
});

/** ADMIN */
Route::prefix('admin/user')->group(function () {
	Route::get('admin/dashboard', "UserController@dashboard")->name('admin.user.admin.dashboard');
	Route::get('student/index', "StudentController@index")->name('admin.user.student.index');
	Route::get('teacher/index', "admin\AdminTeacherController@index")->name('admin.user.teacher.index');
	Route::get('teacher/create', "admin\AdminTeacherController@create")->name('admin.user.teacher.create');
	Route::get('teacher/{id}/show', "admin\AdminTeacherController@show")->name('admin.user.teacher.show');
	Route::post('teacher/store', "admin\AdminTeacherController@store")->name('admin.user.teacher.store');
});

Route::prefix('admin/course')->group(function () {
	Route::get('index', "admin\AdminCourseController@index")->name('admin.course.index');
	Route::get('create', "admin\AdminCourseController@create")->name('admin.course.create');
	Route::post('store', "admin\AdminCourseController@store")->name('admin.course.store');
	Route::post('update', "admin\AdminCourseController@update")->name('admin.course.update');
	Route::get('{id}/show', "admin\AdminCourseController@show")->name('admin.course.show');
	Route::get('{id}/edit', "admin\AdminCourseController@edit")->name('admin.course.edit');
	Route::get('{id}/status/edit', "admin\AdminCourseController@statusEdit")->name('admin.course.status.edit');
	Route::post('status/update', "admin\AdminCourseController@statusUpdate")->name('admin.course.status.update');
	Route::get('{id}/detail/create', "admin\AdminCourseController@detailTitleCreate")->name('admin.course.detail.create');
	Route::post('detail/store', "admin\AdminCourseController@detailTitleStore")->name('admin.course.detail.store');

});

Route::prefix('course')->middleware('hasStudentAccount')->group(function () {
	Route::get('{id}/show', "CourseController@show")->name('course.show');
});

Route::prefix('teacher')->middleware('hasStudentAccount')->group(function () {
	Route::get('{id}/show', "TeacherController@show")->name('teacher.show');
});

/** statement */
Route::prefix('admin/statement')->group(function () {
	Route::get('{date}/details', "StatementController@details")->name('admin.statement.details');
	Route::get('create', "StatementController@create")->name('admin.statement.create');
	Route::post('store', "StatementController@store")->name('admin.statement.store');
});

Route::post('register/student', "StudentController@registerStudent")->name('register.student');
Route::post('course/subscribe', "CourseController@courseSubscribe")->name('course.subscribe');

Route::get('course/{courseId}/teacher/{teacherId}/student/index', "admin\AdminTeacherController@studentIndex")
	->name('course.teacher.student.index');
Route::get('course/{courseId}/teacher/{teacherId}/student/{studentId}/show', "admin\AdminTeacherController@studentShow")
	->name('course.teacher.student.show');

Route::post('student/mark/store', "MarkController@store")
	->name('student.mark.store');

Route::get('user/shiftaccount/tostudent', "UserController@shiftaccountToStudent")
	->name('user.shiftaccount.tostudent');
Route::get('user/shiftaccount/toteacher', "UserController@shiftaccountToTeacher")
	->name('user.shiftaccount.toteacher');
