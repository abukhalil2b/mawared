<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('details', function (Blueprint $table) {
			$table->id();
			$table->boolean('ishead')->default(0);
			$table->string('icon')->nullable();
			$table->string('title');
			$table->integer('course_id')->unsigned();
			$table->integer('detail_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('details');
	}
}
