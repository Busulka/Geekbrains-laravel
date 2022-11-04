<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 0; $j < 20; $j++) {
                $data[] = [
                    "category_id" => $i,
                    "title" => fake()->realText(rand(40, 80)),
                    "description" => fake()->realText(rand(200, 400)),
                    "author" => fake()->userName,
                    "text" => fake()->realText(rand(700, 4000)),
                    "image" => "",
                    "is_private" => fake()->boolean(),
                ];
            }
        }

        return $data;
    }
}
