<?php

namespace App\Http\Controllers\admin;
use App\Course;
use App\Coursedetail;
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
		return redirect()->route('admin.course.index');
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

	public function statusEdit($id) {
		$course = Course::find($id);
		return view('admin.course.status.edit', compact('course'));
	}

	public function statusUpdate(Request $request) {
		// return $request->all();
		$course = Course::find($request->id);
		$course->update(['status' => $request->status]);
		return redirect()->route('admin.course.index');
	}

	public function detailTitleCreate($id) {
		$course = Course::find($id);
		$details = Coursedetail::where(['course_id' => $id])->get();
		return view('admin.course.detail.create', compact('course', 'details'));
	}

	public function detailTitleStore(Request $request) {
		// return $request->all();
		$this->validate($request, [
			'title' => 'required',
			'ishead' => 'required',
		]);
		if ($request->ishead == 1) {
			$this->validate($request, [
				'icon' => 'required',
			]);
		}
		$course = Course::find($request->course_id);
		Coursedetail::create(
			[
				'ishead' => $request->ishead,
				'icon' => $request->icon,
				'title' => $request->title,
				'course_id' => $request->course_id,
			]);

		return redirect()->route('admin.course.detail.create', ['id' => $course->id]);
	}

}