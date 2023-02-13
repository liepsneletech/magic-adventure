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
            'role' => '3',
            'email' => 'monika@gmail.com',
            'password' => Hash::make('monika123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Simona',
            'role' => '1',
            'email' => 'simona@gmail.com',
            'password' => Hash::make('simona123'),
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Makedonija',
            'season_start' => '2023-02-05',
            'season_end' => '2023-08-11',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Brazilija',
            'season_start' => '2023-06-14',
            'season_end' => '2023-12-14',
        ]);

        DB::table('countries')->insert([
            'country_name' => 'Portugalija',
            'season_start' => '2023-05-20',
            'season_end' => '2023-11-14',
        ]);

        DB::table('hotels')->insert([
            'title' => 'Consequuntur molesti',
            'desc' => 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',
            'image' => '/uploads/hotels/villa-qsqsqscasa-casuarina-unique-494706.jpg',
            'country_id' => '2'
        ]);

        DB::table('hotels')->insert([
            'title' => 'Odit molestiae',
            'desc' => 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh.',
            'image' => '/uploads/hotels/v8-hotel-unsqqsqique-400732.jpg',
            'country_id' => '3'
        ]);

        DB::table('hotels')->insert([
            'title' => 'Deleniti accusantium',
            'desc' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'image' => '/uploads/hotels/memoriqssqes-aicha-luxury-camp-unique-628872.jpg',
            'country_id' => '1'
        ]);

        DB::table('hotels')->insert([
            'title' => 'Amet dolores harum',
            'desc' => 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            'image' => '/uploads/hotels/pioneertown-motesql-unique-890297.jpg',
            'country_id' => '1'
        ]);

        DB::table('hotels')->insert([
            'title' => 'Vivamus tortor',
            'desc' => 'Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
            'image' => '/uploads/hotels/memoriqssqes-aicha-luxury-camp-unique-628872.jpg',
            'country_id' => '2'
        ]);

        DB::table('hotels')->insert([
            'title' => 'Consectetur andera',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat.',
            'image' => '/uploads/hotels/pioneertown-motesql-unique-890297.jpg',
            'country_id' => '3'
        ]);

        DB::table('offers')->insert([
            'title' => 'Consectetur andera',
            'travel_start' => '2023-05-20',
            'travel_end' => '2023-05-26',
            'country_id' => '3',
            'hotel_id' => '3',
            'price' => '2000',
        ]);

        DB::table('offers')->insert([
            'title' => 'Gargantiua hannsen',
            'travel_start' => '2023-06-20',
            'travel_end' => '2023-07-03',
            'country_id' => '2',
            'hotel_id' => '2',
            'price' => '3600',
        ]);

        DB::table('offers')->insert([
            'title' => 'Kutura svanellia',
            'travel_start' => '2023-08-20',
            'travel_end' => '2023-08-26',
            'country_id' => '1',
            'hotel_id' => '1',
            'price' => '1750',
        ]);

        DB::table('offers')->insert([
            'title' => 'Mauris blandit',
            'travel_start' => '2023-07-20',
            'travel_end' => '2023-08-02',
            'country_id' => '2',
            'hotel_id' => '2',
            'price' => '2200',
        ]);
    }
}
