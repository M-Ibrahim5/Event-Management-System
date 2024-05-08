<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('events')->insert([
            'eventName' => 'Tech Conference',
            'eventDescription' => 'An annual conference for tech enthusiasts.',
            'eventLocation' => 'Convention Center',
            'eventCategory' => 'Technology',
            'eventStartDate' => '2023-04-15',
            'eventEndDate' => '2023-04-17',
            'eventStartTime' => '09:00:00',
            'eventEndTime' => '17:00:00',
            'eventPrice' => 100.00,
            'eventCapacity' => 30,
            'eventStatus' => 'Confirmed',
            'email' => 'irfan@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'Petronas',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'eventName' => 'Music Festival',
            'eventDescription' => 'A weekend of live music performances.',
            'eventLocation' => 'Outdoor Arena',
            'eventCategory' => 'Music',
            'eventStartDate' => '2023-03-10',
            'eventEndDate' => '2023-03-12',
            'eventStartTime' => '18:00:00',
            'eventEndTime' => '23:00:00',
            'eventPrice' => 150.00,
            'eventCapacity' => 50,
            'eventStatus' => 'Confirmed',
            'email' => 'ibrahim@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'HOT FM',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('events')->insert([
            'eventName' => 'Football Match',
            'eventDescription' => 'Exciting football match between top teams.',
            'eventLocation' => 'Stadium',
            'eventCategory' => 'Sports',
            'eventStartDate' => '2024-05-20',
            'eventEndDate' => '2024-05-20',
            'eventStartTime' => '15:00:00',
            'eventEndTime' => '17:00:00',
            'eventPrice' => 50.00,
            'eventCapacity' => 100,
            'eventStatus' => 'Confirmed',
            'email' => 'irfan@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'PUMA',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('events')->insert([
            'eventName' => 'Wedding Ceremony',
            'eventDescription' => 'A beautiful wedding ceremony celebration.',
            'eventLocation' => 'Garden',
            'eventCategory' => 'Wedding',
            'eventStartDate' => '2024-07-15',
            'eventEndDate' => '2024-07-15',
            'eventStartTime' => '11:00:00',
            'eventEndTime' => '14:00:00',
            'eventPrice' => 200.00,
            'eventCapacity' => 50,
            'eventStatus' => 'Confirmed',
            'email' => 'ibrahim@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'KACIP FATIMAH',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('events')->insert([
            'eventName' => 'Programming Workshop',
            'eventDescription' => 'A workshop aimed at enhancing programming skills.',
            'eventLocation' => 'Conference Hall',
            'eventCategory' => 'Education',
            'eventStartDate' => '2024-09-05',
            'eventEndDate' => '2024-09-06',
            'eventStartTime' => '10:00:00',
            'eventEndTime' => '16:00:00',
            'eventPrice' => 80.00,
            'eventCapacity' => 40,
            'eventStatus' => 'Confirmed',
            'email' => 'irfan@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'DELL',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('events')->insert([
            'eventName' => 'Art Exhibition',
            'eventDescription' => 'An exhibition showcasing diverse art forms.',
            'eventLocation' => 'Art Gallery',
            'eventCategory' => 'Art',
            'eventStartDate' => '2024-11-10',
            'eventEndDate' => '2024-11-12',
            'eventStartTime' => '09:00:00',
            'eventEndTime' => '18:00:00',
            'eventPrice' => 20.00,
            'eventCapacity' => 80,
            'eventStatus' => 'Confirmed',
            'email' => 'ibrahim@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'GUCCI',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        DB::table('events')->insert([
            'eventName' => 'BlackMamba Concert',
            'eventDescription' => 'A thrilling concert featuring the famous band BlackMamba.',
            'eventLocation' => 'Concert Hall',
            'eventCategory' => 'Music', // Assuming this should be categorized under Music
            'eventStartDate' => '2024-12-20', // Adjusted start date
            'eventEndDate' => '2024-12-21', // Adjusted end date
            'eventStartTime' => '19:00:00', // Adjusted start time
            'eventEndTime' => '23:00:00', // Adjusted end time
            'eventPrice' => 100.00, // Adjusted price
            'eventCapacity' => 150, // Adjusted capacity
            'eventStatus' => 'Confirmed',
            'email' => 'ibrahim@gmail.com', // Assuming this email exists in the 'users' table
            'imagePath'=>'img\eventoffuture.jpg',
            'sponsor'=>'ASTRO',
            'sponsorStatus'=>'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);        
        
    }
}
