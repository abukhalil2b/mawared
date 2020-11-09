<?php

namespace App\Http\Controllers;

use App\Course;
use Auth;
use Illuminate\Http\Request;

class CourseController extends Controller {
	public function index() {
		$courses = Course::all();
		return view('course.index', compact('courses'));
	}
	public function show($id) {
		$course = Course::find($id);
		if (auth::check()) {
			$user = auth::user();
			if ($user->userType == 'student') {
				$student = $user->student;
				$isSubscribed = $course->whereHas('students', function ($query) use ($student, $course) {
					$query->where(['student_course.student_id' => $student->id, 'student_course.course_id' => $course->id]);
				})->count();
				return view('course.show', compact('course', 'isSubscribed'));
			}

			if ($user->userType == 'teacher') {
				$isSubscribed = 1;
				return view('course.show', compact('course', 'isSubscribed'));
			}
		}
		return view('course.show', compact('course'));

	}
	public function courseSubscribe(Request $request) {
		//check course is not active
		$course = Course::where(['id' => $request->course_id, 'active' => 1])->first();
		if ($course) {
			$course->students()->syncWithoutDetaching(Auth::user()->student);
			return redirect()->route('home');
		}
		return Auth::user()->student;

	}

}
