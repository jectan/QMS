<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Role')->insert([
            ['roleDesc' => 'Administrator', 'status' => '1'],
            ['roleDesc' => 'Quality Management Representative', 'status' => '1'],
            ['roleDesc' => 'Document Management Team', 'status' => '1'],
            ['roleDesc' => 'Project Staff', 'status' => '1'],
        ]);
    }
}
