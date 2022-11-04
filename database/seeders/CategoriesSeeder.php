<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $title = fake()->jobTitle();

            $data[] = [
                "title" => $title,
                "slug" => Str::slug($title, '-'),

            ];
        }

return $data;
}
}
