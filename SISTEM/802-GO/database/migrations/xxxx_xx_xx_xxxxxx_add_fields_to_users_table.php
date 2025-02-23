<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name');
            }
            if (!Schema::hasColumn('users', 'middle_name')) {
                $table->string('middle_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender');
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age');
            }
            if (!Schema::hasColumn('users', 'birthdate')) {
                $table->date('birthdate');
            }
            if (!Schema::hasColumn('users', 'block_street')) {
                $table->string('block_street');
            }
            if (!Schema::hasColumn('users', 'barangay')) {
                $table->string('barangay');
            }
            if (!Schema::hasColumn('users', 'district')) {
                $table->string('district');
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city');
            }
            if (!Schema::hasColumn('users', 'civil_status')) {
                $table->string('civil_status');
            }
            if (!Schema::hasColumn('users', 'religion')) {
                $table->string('religion')->nullable();
            }
            if (!Schema::hasColumn('users', 'spouse_name')) {
                $table->string('spouse_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'siblings_name')) {
                $table->string('siblings_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'children_name')) {
                $table->string('children_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'valid_id')) {
                $table->string('valid_id');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique();
            }

            // Add timestamps if they are missing
            if (!Schema::hasColumn('users', 'created_at') || !Schema::hasColumn('users', 'updated_at')) {
                $table->timestamps();
            }
        });
    }

    public function down(): void
    {
        // Add back the 'name' column
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
        });

        // Remove the fields we added in the up method
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'first_name',
                'middle_name',
                'last_name',
                'gender',
                'age',
                'birthdate',
                'block_street',
                'barangay',
                'district',
                'city',
                'civil_status',
                'religion',
                'spouse_name',
                'siblings_name',
                'children_name',
                'valid_id',
                'email',  // Remove email
                'created_at', // Remove timestamp fields
                'updated_at',
            ]);
        });
    }
};
