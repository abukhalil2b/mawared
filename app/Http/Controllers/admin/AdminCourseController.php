<?php

namespace App\Http\Controllers\admin;
use App\Course;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class AdminCourseController extends Controller {
	public function index() {
		$courses = Course::all();
		return view('admin.course.index', compact('courses'));
	}
	public function show($id) {
		$course = Course::find($id);
		return view('admin.course.show', compact('course'));
	}
	public function create() {
		$teachers = Teacher::all();
		return view('admin/course/create', compact('teachers'));
	}

	public function store(Request $request) {

		$request['weekDays'] = implode($request->weekDays, ' ');
		$request['status'] = 'future';
		$course = Course::create($request->all());
		return redirect()->route('admin.course.show', ['id' => $course->id]);
	}

	public function edit($id) {
		$course = Course::find($id);
		return view('course.edit', compact('course'));
	}

	public function update(Request $request) {
		return $request->all();
		$course = Course::find($request->id)->update($request->all());
		return redirect()->route('course.show', ['id' => $course->id]);
	}
}