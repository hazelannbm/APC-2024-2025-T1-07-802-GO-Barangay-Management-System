<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsAnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_announcements')->insert([
            'title' => 'Community Clean-Up Drive',
            'content' => 'Join us for a community clean-up drive this Saturday at 8 AM. Let\'s keep our barangay clean and green!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
