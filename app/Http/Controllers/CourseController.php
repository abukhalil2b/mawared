<?php

namespace App\Http\Controllers;

use App\Course;
use App\Coursedetail;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;

class CourseController extends Controller {

	public function index() {
		$courses = Course::all();
		return view('course.index', compact('courses'));
	}

	public function show($id) {
		$course = Course::find($id);
		if (!$course) {
			return;
		}

		$teacher = Teacher::find($course->teacher_id);
		$details = Coursedetail::where('course_id', $id)->get();

		if (auth::check()) {
			$user = auth::user();
			if ($user->userType == 'student') {
				$student = $user->student;
				$isSubscribed = $course->whereHas('students', function ($query) use ($student, $course) {
					$query->where(['student_course.student_id' => $student->id, 'student_course.course_id' => $course->id]);
				})->count();
				return view('course.show', compact('course', 'details', 'teacher', 'isSubscribed'));
			}

			if ($user->userType == 'teacher') {
				$isSubscribed = 1;
				return view('course.show', compact('course', 'details', 'teacher', 'isSubscribed'));
			}
		}

		return view('course.show', compact('course', 'details', 'teacher'));

	}

	public function courseSubscribe(Request $request) {
		//check course is not active
		$course = Course::where(['id' => $request->course_id, 'active' => 1, 'status' => 'coming'])->first();
		if ($course) {
			$id = Auth::user()->student->id;
			$course->students()->syncWithoutDetaching([$id => ['free' => $course->free]]);
			return redirect()->route('home');
		}
		return redirect()->back()->with(['msg' => 'لايمكن الإشتراك']);

	}

}
