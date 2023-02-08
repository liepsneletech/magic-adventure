<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Monika',
            'role' => '2',
            'email' => 'monika@gmail.com',
            'password' => Hash::make('monika123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Simona',
            'role' => '0',
            'email' => 'simona@gmail.com',
            'password' => Hash::make('simona123'),
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Makedonija',
            'season_start' => '2023-02-05',
            'season_end' => '2023-02-11',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Brazilija',
            'season_start' => '2023-06-14',
            'season_end' => '2023-07-14',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Portugalija',
            'season_start' => '2023-05-20',
            'season_end' => '2023-09-14',
        ]);

        DB::table('hotels')->insert([
            'country_name' => 'Portugalija',
        ]);

        DB::table('hotels')->insert([
            'country_name' => 'Makedonija',
        ]);

        DB::table('hotels')->insert([
            'country_name' => 'Portugalija',
        ]);

        DB::table('hotels')->insert([
            'country_name' => 'Brazilija',
        ]);
    }
}
