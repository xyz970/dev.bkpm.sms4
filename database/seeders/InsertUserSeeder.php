<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsertUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'Muhammad Adi Saputro',
                'username'=>'mhmmd_adi',
                'email'=>'muhammadxxz@gmail.com',
                'password'=>bcrypt('12345678'),
            ]
        );
    }
}
