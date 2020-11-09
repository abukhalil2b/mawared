<?php

namespace App\Http\Controllers;

use App\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller {
	public function store(Request $request) {
		// return $request->all();
		Mark::create($request->all());
		return redirect()->back();
	}
}
