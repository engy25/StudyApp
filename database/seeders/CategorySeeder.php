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
          'name' => "Study",
          'icon' => "Study.png",
          'created_at'=>now()

        ]);

        Category::create([
          'id' => 2,
          'name' => "Focus",
          'icon' => "Focus.png",
          'created_at'=>now()

        ]);

        Category::create([
          'id' => "3",
          'name' => "SelfCare",
          'icon' => "Focus.png",
          'created_at'=>now()

        ]);
    }
}
