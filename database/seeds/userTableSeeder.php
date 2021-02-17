<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'zahara',
            'phone' => '081314193345',
            'role' => 'admin',
            'email' => 'zahara@gmail.com',
           'password' => bcrypt('zahara123'),
        ]);

        DB::table('users')->insert([
            'name' => 'ayuk',
            'phone' => '081314193345',
            'role' => 'admin',
            'email' => 'ayuk@gmail.com',
           'password' => bcrypt('ayuk123'),
        ]);

        DB::table('users')->insert([
            'name' => 'wafa',
            'phone' => '081314193345',
            'role' => 'member',
            'email' => 'wafa@gmail.com',
           'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'roy',
            'phone' => '081314193345',
            'role' => 'member',
            'email' => 'roy@gmail.com',
           'password' => bcrypt('12345'),
        ]);
    }
}
