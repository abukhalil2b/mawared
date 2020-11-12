<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	// $comingcourses = App\Course::where('status', 'coming')->get();
	// $nowcourses = App\Course::where('status', 'now')->get();
	// $pastcourses = App\Course::where('status', 'past')->get();
	// return view('welcome', compact('comingcourses', 'nowcourses', 'pastcourses'));
	return view('welcome2');
});

/** ADMIN */
Route::prefix('admin/user')->group(function () {
	Route::get('admin/dashboard', "UserController@dashboard")->name('admin.user.admin.dashboard');
	Route::get('student/index', "StudentController@index")->name('admin.user.student.index');
	Route::get('teacher/index', "TeacherController@index")->name('admin.user.teacher.index');
	Route::get('teacher/create', "TeacherController@create")->name('admin.user.teacher.create');
	Route::get('teacher/{id}/show', "TeacherController@show")->name('admin.user.teacher.show');
	Route::post('teacher/store', "TeacherController@store")->name('admin.user.teacher.store');
});

Route::prefix('admin/course')->group(function () {
	Route::get('index', "admin\AdminCourseController@index")->name('admin.course.index');
	Route::get('create', "admin\AdminCourseController@create")->name('admin.course.create');
	Route::post('store', "admin\AdminCourseController@store")->name('admin.course.store');
	Route::post('update', "admin\AdminCourseController@update")->name('admin.course.update');
	Route::get('{id}/show', "admin\AdminCourseController@show")->name('admin.course.show');
	Route::get('{id}/edit', "admin\AdminCourseController@edit")->name('admin.course.edit');
	Route::get('{id}/detail/title/create', "admin\AdminCourseController@detailTitleCreate")
		->name('admin.course.detail.title.create');
	Route::post('detail/title/store', "admin\AdminCourseController@detailTitleStore")
		->name('admin.course.detail.title.store');
	Route::get('{id}/detail/subtitle/create', "admin\AdminCourseController@detailSubtitleCreate")
		->name('admin.course.detail.subtitle.create');
	Route::post('detail/subtitle/store', "admin\AdminCourseController@detailSubtitleStore")
		->name('admin.course.detail.subtitle.store');
});

Route::prefix('course')->middleware('hasStudentAccount')->group(function () {
	Route::get('{id}/show', "CourseController@show")->name('course.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('register/student', "StudentController@registerStudent")->name('register.student');
Route::post('course/subscribe', "CourseController@courseSubscribe")->name('course.subscribe');

Route::get('course/{courseId}/teacher/{teacherId}/student/index', "TeacherController@studentIndex")
	->name('course.teacher.student.index');
Route::get('course/{courseId}/teacher/{teacherId}/student/{studentId}/show', "TeacherController@studentShow")
	->name('course.teacher.student.show');

Route::post('student/mark/store', "MarkController@store")
	->name('student.mark.store');