<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => "admin",
            'email' => "admin@admin.nl",
            'password' => Hash::make('admin123'),
            'isAdmin' => 1,
        ],
        [
            'name' => "user",
            'email' => "user@user.nl",
            'password' => Hash::make('user123'),
            'isAdmin' => 0,
        ]
        ]);
    }
}
