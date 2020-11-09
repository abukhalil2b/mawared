<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('descriptions', function (Blueprint $table) {
			$table->id();
			$table->integer('course_id')->unsigned();
			$table->boolean('isHeading')->default(0);
			$table->string('icon')->nullable();
			$table->string('title')->nullable();
			$table->integer('parent')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('descriptions');
	}
}
