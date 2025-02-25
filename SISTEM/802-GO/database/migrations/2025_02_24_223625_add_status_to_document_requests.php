<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('document_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('document_requests', 'status')) {  // ✅ Check if column exists
                $table->string('status')->default('pending');
            }
        });
    }

    public function down()
    {
        Schema::table('document_requests', function (Blueprint $table) {
            if (Schema::hasColumn('document_requests', 'status')) {  // ✅ Check before dropping
                $table->dropColumn('status');
            }
        });
    }
};
