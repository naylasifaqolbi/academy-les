<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('kelas_les', function (Blueprint $table) {
        $table->id();

        $table->string('nama_program');
        $table->enum('jenjang', [
            'TK',
            'SD',
            'SMP'
        ]);

        $table->string('mata_pelajaran');

        $table->integer('harga');

        $table->text('deskripsi')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_les');
    }
};
