<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class detail_profile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_profile')->insert([
            'address'=>'Jember',
            'nomor_tlp'=>'0843126312',
            'ttl'=>'2003-07-24',
            'foto'=>'picture.png',
        ]);
    }
}
