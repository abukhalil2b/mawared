<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	protected $fillable = ['user_id', 'avatar'];
	public function user() {
		return $this->belongsTo(User::class);
	}

	public function courses() {
		return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id');
	}

	public function marks() {
		return $this->hasMany(Mark::class);
	}

	public function payments() {
		return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id')
			->as('payment')
			->withPivot('ispaid');
	}

	public function course($id) {
		return Course::find($id);
	}
}
