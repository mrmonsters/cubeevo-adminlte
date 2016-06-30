<?php

use Illuminate\Database\Seeder;
use App\Models\JobReviewer;
use App\Models\JobReview;

class JobReviewSeeder extends Seeder
{
	public function run()
	{
		$reviewers = [
			[
				'name'          => 'Denyi Siow',
				'qualification' => 'Multimedia University',
				'date'          => '2013-4-20',
				'type'          => JobReviewer::TYPE_INTERN,
				'reviews'       => [
					JobReview::LOCALE_EN => [
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Why did you choose CUBEevo?',
							'answer'   => "That's true. We practically hold their hands from a to z, coaching, guiding, and sometimes solving their problems. But, sometimes it surprises me when they exhange different views which are useful and mind blowing.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Share about your first impression towards CUBEevo?',
							'answer'   => "Like any parents do, to see them being independent in their own style and open minded when receiving criticism. Be honest and humble enough to continue learning from others. It's our job and duty to make sure they improved after the completion of internship.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'What did you do in CUBEevo?',
							'answer'   => 'Yes. Of course, provided they are fit to keep up with our team. Sometimes, we have crazy working hours and pressure, to be frank.',
						],
					]
				],
			],
			[
				'name'          => 'Li Peng',
				'qualification' => 'Lim Kok Wing University',
				'date'          => '2014-3-15',
				'type'          => JobReviewer::TYPE_INTERN,
				'reviews'       => [
					JobReview::LOCALE_EN => [
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Why did you choose CUBEevo?',
							'answer'   => "That's true. We practically hold their hands from a to z, coaching, guiding, and sometimes solving their problems. But, sometimes it surprises me when they exhange different views which are useful and mind blowing.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Share about your first impression towards CUBEevo?',
							'answer'   => "Like any parents do, to see them being independent in their own style and open minded when receiving criticism. Be honest and humble enough to continue learning from others. It's our job and duty to make sure they improved after the completion of internship.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'What did you do in CUBEevo?',
							'answer'   => 'Yes. Of course, provided they are fit to keep up with our team. Sometimes, we have crazy working hours and pressure, to be frank.',
						],
					]
				],
			],
			[
				'name'          => 'KT Tong',
				'qualification' => 'New Era College',
				'date'          => '2016-4-5',
				'type'          => JobReviewer::TYPE_INTERN,
				'reviews'       => [
					JobReview::LOCALE_EN => [
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Why did you choose CUBEevo?',
							'answer'   => "That's true. We practically hold their hands from a to z, coaching, guiding, and sometimes solving their problems. But, sometimes it surprises me when they exhange different views which are useful and mind blowing.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Share about your first impression towards CUBEevo?',
							'answer'   => "Like any parents do, to see them being independent in their own style and open minded when receiving criticism. Be honest and humble enough to continue learning from others. It's our job and duty to make sure they improved after the completion of internship.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'What did you do in CUBEevo?',
							'answer'   => 'Yes. Of course, provided they are fit to keep up with our team. Sometimes, we have crazy working hours and pressure, to be frank.',
						],
					]
				],
			],
			[
				'name'          => 'Even Goh',
				'qualification' => 'Multimedia University',
				'date'          => '2016-7-1',
				'type'          => JobReviewer::TYPE_INTERN,
				'reviews'       => [
					JobReview::LOCALE_EN => [
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Why did you choose CUBEevo?',
							'answer'   => "That's true. We practically hold their hands from a to z, coaching, guiding, and sometimes solving their problems. But, sometimes it surprises me when they exhange different views which are useful and mind blowing.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'Share about your first impression towards CUBEevo?',
							'answer'   => "Like any parents do, to see them being independent in their own style and open minded when receiving criticism. Be honest and humble enough to continue learning from others. It's our job and duty to make sure they improved after the completion of internship.",
						],
						[
							'locale'   => JobReview::LOCALE_EN,
							'question' => 'What did you do in CUBEevo?',
							'answer'   => 'Yes. Of course, provided they are fit to keep up with our team. Sometimes, we have crazy working hours and pressure, to be frank.',
						],
					]
				],
			]
		];

		foreach ($reviewers as $item) {

			$reviewer = JobReviewer::create([
				'name'          => $item['name'],
				'qualification' => $item['qualification'],
				'date'          => $item['date'],
				'type'          => $item['type'],
			]);

			if ($reviewer->exists) {

				foreach ($item['reviews'][JobReview::LOCALE_EN] as $review) {

					$reviewer->reviews()->create($review);
				}
			}
		}
	}

}