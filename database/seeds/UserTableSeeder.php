<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder 
{
	public function run()
	{
		DB::table('users')->delete();

		$users = array(
			array(
				'name'     => 'cubeevo',
				'email'    => 'admin@cubeevo.com',
				'password' => Hash::make('cubeevo.1234!'),
			),
		);

		foreach ($users as $user)
		{
			User::create($user);
		}
	}

}