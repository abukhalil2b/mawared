<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentCourse extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('student_course', function (Blueprint $table) {
			$table->id();
			$table->integer('student_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->boolean('ispaid')->default(0);
			$table->boolean('free')->default(0);
			$table->double('fee')->default(0.0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('student_course');
	}
}
