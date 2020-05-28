<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
             'title'=>'Blog Site',
             'created_at'=>now(),
             'updated_at'=>now()
        ]);
    }
}
