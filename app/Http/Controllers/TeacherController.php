<?php

namespace App\Http\Controllers;

use App\Teacher;

class TeacherController extends Controller {

	public function show($id) {
		$teacher = Teacher::find($id);
		if (!$teacher) {
			return;
		}
		return view('teacher.show', compact('teacher'));

	}

}
