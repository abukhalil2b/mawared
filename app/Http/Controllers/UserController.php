<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Course;

class UserController extends Controller {

	public function dashboard(){
		return view('admin.dashboard');
	}

	/** Student */
	public function studentIndex() {
		$students = Student::all();
		return view('admin.student.index',compact('students'));
	}
	
	/** Course */
	public function courseIndex() {
		$courses = Course::all();
		return view('admin.course.index',compact('courses'));
	}

	public function courseCreate() {

	}

	public function courseStore(Request $request) {

	}
}
