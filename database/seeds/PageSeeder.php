<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ["HAQQIMIZDA","KARYERA","VİZYONUMUZ","MİSSİYAMIZ"];
        $count = 0;
        foreach($pages as $page)
        {
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>Str::slug($page),
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNcRFQOg33HDJtoLN-86cttpw2p7k5-5_bgR6mfaX0m2WNF5S-&usqp=CAU',
                'content'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus odit accusantium quos 
                            omnis dignissimos facere ratione velit molestiae ullam placeat in rerum reprehenderit animi 
                            nemo consequuntur, rem tenetur illum laboriosam similique laborum cupiditate alias! 
                            Consequuntur optio soluta sit rerum blanditiis vel, nulla incidunt officia! Amet commodi 
                            quia repudiandae aut enim ullam tempora ipsam temporibus exercitationem ducimus quidem unde 
                            quos labore, quibusdam error eligendi, nihil dolor officiis libero. Reiciendis, tempore 
                            eveniet repudiandae deleniti dolorem quia aperiam consequuntur voluptate ipsum quod inventore
                            ipsa asperiores ad dicta facere earum atque eaque? Expedita earum ipsum labore voluptatem 
                            cum dolore alias dolores esse, error repellat!', 
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
