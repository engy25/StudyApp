<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $dataEntryRole=DB::table('roles')->insert([
        ['name'=>'Admin','guard_name'=>'web', 'created_at' => now()],
        ['name'=>'User','guard_name'=>'api', 'created_at' => now()],
        ['name' => 'DataEntry','guard_name'=> 'web', 'created_at' => now()],
        // Add more roles as needed
    ]);





    }
}
