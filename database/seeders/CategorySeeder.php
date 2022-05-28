<?php

namespace Database\Seeders;

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
        $categories = [
          'Физика' , 'Биология' , 'Химия' , 'Литература' , 'Философия' , 'Информатика' , 'Прочее'
        ];


        foreach ($categories as $category) {
            DB::table('categories')->insert(
                [
                    'category' => $category,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            );
        }

    }
}
