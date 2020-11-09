<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Student;

class AddStudentAccount {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered  $event
	 * @return void
	 */
	public function handle(UserRegistered $event) {
		Student::create([
			'user_id' => $event->user->id,
		]);
	}
}
