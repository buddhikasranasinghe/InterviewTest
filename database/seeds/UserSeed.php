<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sample user',
            'email' => 'test@gmail.com',
            'password' => Hash::make('testuser'),
        ]);
    }
}
