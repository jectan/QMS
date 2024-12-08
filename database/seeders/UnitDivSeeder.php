<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UnitDivSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Division')->insert([
            ['divName' => 'Administrative and Finance Division', 'status' => true],
            ['divName' => 'Technical Operations Division', 'status' => true],
            ['divName' => 'Office of the Regional Director', 'status' => true],
        ]);

        DB::table('Unit')->insert([
            ['unitName' => 'ILCD', 'divID' => '2', 'status' => true],
            ['unitName' => 'Finance', 'divID' => '1', 'status' => true],
            ['unitName' => 'Records', 'divID' => '1', 'status' => true],
            ['unitName' => 'ORD', 'divID' => '3', 'status' => true],
            ['unitName' => 'Administrator', 'divID' => '1', 'status' => true],
        ]);
    }
}
/* cybersecurity
drrm
egov
f4wa
govnet
iid
ilcd
nipps
pnpki */
