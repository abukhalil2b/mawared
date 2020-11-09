<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model {
	protected $fillable = ['student_id', 'point', 'teacher_id', 'course_id', 'note'];
}
