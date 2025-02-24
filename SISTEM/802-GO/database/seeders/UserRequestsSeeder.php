<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_requests')->insert([
            'user_id' => 1,
            'request_type' => 'Barangay Clearance',
            'details' => 'Requesting for a barangay clearance for job application.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
