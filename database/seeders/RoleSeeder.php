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
            ['roleDesc' => 'Administrator', 'status' => true],
            ['roleDesc' => 'Quality Management Representative', 'status' => true],
            ['roleDesc' => 'Document Management Team', 'status' => true],
            ['roleDesc' => 'Project Staff', 'status' => true],
        ]);
    }
}
