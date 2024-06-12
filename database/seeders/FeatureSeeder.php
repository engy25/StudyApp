<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;
class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Feature::create([
        'id' => 1,
        'name' => "StopWatch Timer",
        'desciption' => "Work Until Your Task is done",
        'created_at'=>now()

      ]);
      Feature::create([
        'id' => 2,
        'name' => "Time block timer",
        'desciption' => "Work gor a set period of time",
        'created_at'=>now()

      ]);
    }
}
