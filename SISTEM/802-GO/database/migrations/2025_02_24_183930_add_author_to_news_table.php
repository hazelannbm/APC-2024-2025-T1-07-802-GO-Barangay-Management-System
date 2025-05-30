<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('author')->after('image'); // Add the author column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('author'); // Remove the author column
        });
    }
};
