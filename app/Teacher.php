<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
	protected $fillable = ['phone', 'nationalId'];
	public function user() {
		return $this->belongsTo(User::class);
	}
}
