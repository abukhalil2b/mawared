<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	protected $fillable = ['user_id', 'phone', 'nationalId'];
	public function user() {
		return $this->belongsTo(User::class);
	}

	public function courses() {
		return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id');
	}

	public function marks() {
		return $this->hasMany(Mark::class);
	}
}
