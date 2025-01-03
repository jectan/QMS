<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //bcrypt()
        DB::table('User')->insert([
            ['userLastname' => 'Tan', 'userFirstname' => 'Jec', 'unitID' => '1', 'username' => 'jerico.tan@dict.gov.ph', 'password' => bcrypt('jec'), 'status' => true],
            ['userLastname' => 'Tan', 'userFirstname' => 'Jerico', 'unitID' => '1', 'username' => 'jerico.tan03@gmail.com', 'password' => bcrypt('jec'), 'status' => true],
        ]);
    }
}
