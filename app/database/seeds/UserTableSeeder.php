<?php


class UserTableSeeder extends Seeder {

	public function run() {

		$hashed = Hash::make('password');
		
		DB::table('users')->insert(
			array('username'=>'James', 'email'=>'james@gmail.com', 'password'=>$hashed),
			array('username'=>'Steve', 'email'=>'stever@yahoo.com', 'password'=>$hashed)
		);
	}
}