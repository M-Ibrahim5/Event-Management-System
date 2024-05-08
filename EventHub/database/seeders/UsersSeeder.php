<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* DB::table('users')->insert([
            'f_name' => 'irfan',
            'l_name' => 'afifi',
            'email' => 'irfan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('abc123'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'f_name' => 'mirza',
            'l_name' => 'haziq',
            'email' => 'mirza@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('abc123'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'f_name' => 'ibrahim',
            'l_name' => 'bin',
            'email' => 'ibrahim@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('abc'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]); */
        DB::table('users')->insert([
            'f_name' => 'Event',
            'l_name' => 'Hub',
            'email' => 'EventHub@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('abc'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
