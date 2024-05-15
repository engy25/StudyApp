<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Category::create([
          'id' => 1,
          'name' => "اقتصادي",
          'image' => "ektesady.png",

        ]);

        Category::create([
          'id' => 2,
          'name' => "بلس",
          'image' => "plus.png",

        ]);

        Category::create([
          'id' => 3,
          'name' => "بريميوم",
          'image' => "premium.png",

        ]);
    }
}
