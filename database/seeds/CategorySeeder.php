<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["General","Riyaziyyat","Kimya","Fizika","Biologiya","Azərbaycan Tarixi","Coğrafiya"];
        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'category_name'=>$category,
                'slug'=>Str::slug($category),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
