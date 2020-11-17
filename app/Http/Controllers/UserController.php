<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function dashboard() {
		return view('admin.dashboard');
	}

	/** Student */
	public function studentIndex() {
		$students = Student::all();
		return view('admin.student.index', compact('students'));
	}

	/** Course */
	public function courseIndex() {
		$courses = Course::all();
		return view('admin.course.index', compact('courses'));
	}

	public function courseCreate() {

	}

	public function courseStore(Request $request) {

	}

	public function shiftaccountToStudent() {
		$user = Auth::user();
		$student = Student::where('user_id', $user->id)->first();
		if (!$student) {
			Student::create(['user_id' => $user->id]);
		}
		$user->update(['userType' => 'student']);
		return redirect()->back();
	}

	public function shiftaccountToTeacher() {
		$user = Auth::user();
		$teacher = Teacher::where('user_id', $user->id)->first();
		if (!$teacher) {
			return redirect()->back()->with(['status' => 'هذا الحساب اطلبه من الإدارة']);
		}
		$user->update(['userType' => 'teacher']);
		return redirect()->back();
	}

}
