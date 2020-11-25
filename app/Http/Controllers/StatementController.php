<?php

namespace App\Http\Controllers;
use App\Course;
use App\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller {
	public function store(Request $request) {
		$this->validate($request, [
			'amount' => 'required',
		]);

		$date = $request->date;
		$state = $request->state;
		$course_id = $request->course_id;
		$amount = $state == 'income' ? $request->amount : -($request->amount);
		Statement::create(['date' => $date, 'state' => $state, 'amount' => $amount, 'course_id' => $course_id]);
		return redirect()->back();
	}

	public function create() {
		$courses = Course::limit(20)->get();
		$months = Statement::selectRaw("MONTH(date) as month , date")->distinct()->get();

		return view('admin.statement.create', compact('courses', 'months'));
	}

	public function details($date) {
		$statements = Statement::where('date', $date)->get();
		return view('admin.statement.details', compact('statements'));
	}
}
