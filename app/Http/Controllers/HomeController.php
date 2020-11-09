<?php

namespace App\Http\Controllers;
use App\Course;
use App\Mark;
use App\Student;

class HomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$Auth = Auth()->user();

		//admin account
		if ($Auth->userType == 'admin') {
			return view('admin.dashboard');
		}

		//teacher account
		if ($Auth->userType == 'teacher') {
			$teacher = $Auth->teacher()->first();
			$myComingCourses = Course::where(['teacher_id' => $teacher->id, 'status' => 'coming'])->get();
			$myNowCourses = Course::where(['teacher_id' => $teacher->id, 'status' => 'now'])->get();
			$myPastCourses = Course::where(['teacher_id' => $teacher->id, 'status' => 'past'])->get();

			return view('teacher.dashboard', compact('myComingCourses', 'myNowCourses', 'myPastCourses', 'Auth', 'teacher'));
		}

		//student account
		if ($Auth->userType == 'student') {
			//Get a student who linkend with this user.
			$user = $Auth->whereHas('student', function ($query) use ($Auth) {
				$query->where('students.user_id', $Auth->id);
			})->first();

			$totalMarks = 0;
			$myComingCourses = [];
			$myNowCourses = [];
			$myPastCourses = [];
			if ($user) {
				$student = $user->student()->first();
				$totalMarks = Mark::where(['student_id' => $student->id])->sum('point');
				$myComingCourses = Course::whereHas('students', function ($query) use ($student) {
					$query->where('student_course.student_id', $student->id)
						->where('status', 'coming');
				})->get();

				$myNowCourses = Student::whereHas('courses', function ($query) use ($student) {
					$query->where('student_course.student_id', $student->id)
						->where('status', 'now');;
				})->get();

				$myPastCourses = Student::whereHas('courses', function ($query) use ($student) {
					$query->where('student_course.student_id', $student->id)
						->where('status', 'past');;
				})->get();
			}
			// return $myNewCourses;
			return view('student.dashboard', compact('student', 'myComingCourses', 'myNowCourses', 'myPastCourses', 'user', 'totalMarks'));

		}

	}
}
