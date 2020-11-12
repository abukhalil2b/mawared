<?php

namespace App\Http\Controllers\admin;
use App\Course;
use App\Detail;
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
		return view('admin.course.create', compact('teachers'));
	}

	public function store(Request $request) {

		$request['weekDays'] = is_array($request->weekDays) ? implode(' ', $request->weekDays) : $request->weekDays;
		$request['status'] = 'coming';
		$course = Course::create($request->all());
		return redirect()->route('admin.course.show', ['id' => $course->id]);
	}

	public function edit($id) {
		$course = Course::find($id);
		$teachers = Teacher::all();
		return view('admin.course.edit', compact('course', 'teachers'));
	}

	public function update(Request $request) {
		return $request->all();
		$course = Course::find($request->id)->update($request->all());
		return redirect()->route('course.show', ['id' => $course->id]);
	}

	public function detailTitleCreate($id) {
		$course = Course::find($id);
		return view('admin.course.detail.title.create', compact('course'));
	}

	public function detailTitleStore(Request $request) {
		$course = Course::find($request->course_id);
		Detail::create(
			[
				'ishead' => 1,
				'icon' => $request->icon,
				'title' => $request->title,
				'course_id' => $request->course_id,
			]);

		return view('admin.course.detail.title.create', compact('course'));
	}

	public function detailSubtitleCreate($id) {
		$detail = Detail::find($id);
		return view('admin.course.detail.subtitle.create', compact('detail'));
	}

	public function detailSubtitleStore(Request $request) {
		$courseId = Detail::find($request->detail_id)->course_id;
		$course = Course::find($courseId);
		Detail::create(
			[
				'ishead' => 0,
				'title' => $request->title,
				'course_id' => $courseId,
				'detail_id' => $request->detail_id,
			]);

		return view('admin.course.detail.title.create', compact('course'));
	}
}