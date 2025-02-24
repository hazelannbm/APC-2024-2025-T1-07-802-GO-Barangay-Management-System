<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe Smith', // Provide a value for the 'name' field
            'first_name' => 'John',
            'middle_name' => 'Doe',
            'last_name' => 'Smith',
            'gender' => 'male',
            'age' => 30,
            'birthdate' => '1991-01-01',
            'block_street' => '123 Main St',
            'barangay' => 'Barangay 802',
            'district' => 'Sta Ana',
            'city' => 'Manila',
            'civil_status' => 'single',
            'religion' => 'Christianity',
            'spouse_name' => null,
            'siblings_name' => null,
            'children_name' => null,
            'valid_id' => 'valid-ids/sample-id.jpg',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
