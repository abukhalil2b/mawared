<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {
	protected $fillable = [
		'title',
		'imgurl',
		'shortDescription',
		'longDescription',
		'startAt',
		'endAt',
		'startTime',
		'duration',
		'registerStartAt',
		'registerEndAt',
		'weekDays',
		'requireNumber',
		'status',
		'free',
		'price',
		'language',
		'level',
		'deliveryMeans',
		'active',
		'teacher_id',
		'cate_id',
	];

	public function students() {
		return $this->belongsToMany(Student::class, 'student_course', 'course_id', 'student_id');
	}

	public function teacher() {
		return $this->belongsTo(Teacher::class);
	}

	public function marks() {
		return $this->hasMany(Mark::class);
	}

	public function details() {
		return $this->hasMany(Coursedetail::class);
	}

	public function subscribers() {
		return $this->belongsToMany(Student::class, 'student_course', 'course_id', 'student_id')
			->withPivot(['ispaid', 'free', 'fee']);
	}

}
