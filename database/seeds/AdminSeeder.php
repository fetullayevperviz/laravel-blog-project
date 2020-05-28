<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'fullname'=>'Perviz Fetullayev',
            'email'=>'pervizfetulla@gmail.com',
            'password'=>bcrypt(1994)
        ]);
    }
}
