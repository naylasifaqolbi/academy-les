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
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('kelas_les_id')
              ->constrained('kelas_les')
              ->onDelete('cascade');

        $table->string('nama_siswa');

        $table->integer('umur');

        $table->string('nama_orang_tua');

        $table->text('alamat');

        $table->string('nomor_hp');

        $table->enum('status', [
            'pending',
            'diterima',
            'ditolak'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
