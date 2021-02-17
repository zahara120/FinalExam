<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Beach'
        ]);
        DB::table('categories')->insert([
            'name' => 'Mountain'
        ]);
        DB::table('categories')->insert([
            'name' => 'Forest'
        ]);
    }
}
