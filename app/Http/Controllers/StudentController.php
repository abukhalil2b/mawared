<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {

	public function index() {
		$students = Student::all();
		return view('admin.student.index', compact('students'));
	}

	public function edit($id) {
		$student = Student::find($id);
		return view('admin.student.edit', compact('student'));
	}

	public function update(Request $request) {

	}

	public function registerStudent(Request $request) {
		Student::create(['phone' => $request->phone, 'nationalId' => $request->nationalId, 'user_id' => $request->user_id]);
	}

}
