<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mark;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller {

	public function index() {
		$teachers = Teacher::all();
		return view('admin.teacher.index', compact('teachers'));
	}

	public function create() {
		return view('admin.teacher.create');
	}
	public function show($id) {
		$teacher = Teacher::find($id);
		return view('admin.teacher.show', compact('teacher'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'password' => 'required',
			'email' => 'required',
			'name' => 'required',
		]);
		$user = User::create([
			'userType' => 'teacher',
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		$teacher = new Teacher;
		$teacher->phone = $request->phone;
		$teacher->nationalId = $request->nationalId;
		$teacher->user_id = $user->id;
		$teacher->save();
		return redirect()->route('admin.user.teacher.show', ['id' => $teacher->id]);
	}

	public function studentIndex($courseId, $teacherId) {
		$course = Course::find($courseId);
		$students = $course->students()->get();
		return view('teacher.student-index', compact('students', 'courseId', 'teacherId'));
	}

	public function studentShow($courseId, $teacherId, $studentId) {
		$student = Student::find($studentId);
		$course = Course::find($courseId);
		$marks = Mark::where(['student_id' => $studentId, 'course_id' => $courseId])->get();
		return view('teacher.student-show', compact('student', 'course', 'teacherId', 'marks'));
	}

}
