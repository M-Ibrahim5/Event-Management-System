<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sponsorships')->insert([
 
            'sponsorName' => 'Petronas',
            'sponsorDescription' => 'Sponsor Technology Events',
            'sponsorAmount' => '30000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'HOT FM',
            'sponsorDescription' => 'Sponsor Concerts and Festivals',
            'sponsorAmount' => '25000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'PUMA',
            'sponsorDescription' => 'Sponsor Sporting tools',
            'sponsorAmount' => '50000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'KACIP FATIMAH',
            'sponsorDescription' => 'Sponsor Energy Drinks',
            'sponsorAmount' => '12000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'DELL',
            'sponsorDescription' => 'Sponsor Laptops for Education events',
            'sponsorAmount' => '100000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'GUCCI',
            'sponsorDescription' => 'Sponsor any related Art events',
            'sponsorAmount' => '10000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('sponsorships')->insert([
            'sponsorName' => 'ASTRO',
            'sponsorDescription' => 'Sponsor Sound System tools',
            'sponsorAmount' => '14000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
