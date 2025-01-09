<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an instance of Faker to generate fake data
        $faker = Faker::create();
        
        // Get the current timestamp using Carbon (used for created_at and updated_at)
        $currentTimestamp = Carbon::now();

        // Insert two records into the 'users' table
        DB::table('users')->insert([
            [
                // The 'name' field is manually populated for clarity
                'name' => 'John Doe',  // Full name for display purposes

                // Individual user details
                'first_name' => 'John',  // First name
                'middle_name' => 'A.',   // Middle name
                'last_name' => 'Doe',    // Last name
                'gender' => 'Male',      // Gender
                'age' => 30,             // Age
                'birthdate' => '1993-01-15', // Birthdate
                'address' => '123 Main St',  // Address
                'civil_status' => 'Single',  // Civil status
                'religion' => 'Christian',  // Religion
                'spouse_name' => null,       // No spouse name
                'siblings_name' => 'Jane Doe', // Sibling(s) name
                'children_name' => null,     // No children
                'valid_id' => 'ID123456',    // Example valid ID
                'password' => Hash::make('password123'), // Hashing the password for security
                'email' => $faker->unique()->safeEmail,  // Generating a unique email using Faker

                // Timestamps for record creation and update
                'created_at' => $currentTimestamp,  // Timestamp for creation
                'updated_at' => $currentTimestamp,  // Timestamp for last update
            ],
            [
                'name' => 'Jane Smith',  // Full name for display purposes

                // Individual user details
                'first_name' => 'Jane',  // First name
                'middle_name' => null,   // No middle name
                'last_name' => 'Smith',  // Last name
                'gender' => 'Female',    // Gender
                'age' => 28,             // Age
                'birthdate' => '1995-03-10', // Birthdate
                'address' => '456 Elm St',  // Address
                'civil_status' => 'Married', // Civil status
                'religion' => 'Catholic',  // Religion
                'spouse_name' => 'John Smith',  // Spouse name
                'siblings_name' => null,  // No siblings
                'children_name' => 'Anna Smith, Emily Smith', // Children’s names
                'valid_id' => 'ID789012',  // Example valid ID
                'password' => Hash::make('password456'), // Hashing the password for security
                'email' => $faker->unique()->safeEmail,  // Generating a unique email using Faker

                // Timestamps for record creation and update
                'created_at' => $currentTimestamp,  // Timestamp for creation
                'updated_at' => $currentTimestamp,  // Timestamp for last update
            ],
        ]);
    }
}
