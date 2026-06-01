<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            // hubungan ke user login
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            // status pendaftaran
            $table->enum('status', [
                'pending',
                'diterima',
                'ditolak'
            ])->default('pending');

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropColumn('status');
        });
    }
};