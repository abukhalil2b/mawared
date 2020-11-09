<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Course::create(
			[
				'title' => 'مقدمة في الفن الإسلامي',
				'imgurl' => 'http://127.0.0.1:8000/img/logo1.png',
				'shortDescription' => 'مقدمة في الفن الإسلامي هو مساق مجاني',
				'longDescription' => 'مقدمة في الفن الإسلامي هو مساق مجاني يهدف لتعريف المتعلمين بأبعاده الثقافية والفكرية المختلفة، من خلال التركيز على الرؤية المعرفية والتعريفات ...',
				'startAt' => '2020-11-09',
				'endAt' => '2020-11-30',
				'startTime' => '06:00:00',
				'duration' => '1',
				'registerStartAt' => '2020-11-02',
				'registerEndAt' => '2020-11-08',
				'weekDays' => 'Sun Wed',
				'requireNumber' => '20',
				'status' => 'future',
				'isPaid' => '1',
				'price' => '5.5',
				'language' => 'ar',
				'level' => '1',
				'deliveryMeans' => 'whatsapp',
				'active' => '1',
				'teacher_id' => '1',
				'cate_id' => '1',

			]
		);
	}
}
