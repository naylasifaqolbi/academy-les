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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();

        $table->string('nama_anak');
        $table->string('nama_orang_tua');

        $table->text('alamat');

        $table->string('jenjang');
        $table->string('mata_pelajaran');

        $table->enum('jenis_kelamin', [
            'Laki-laki',
            'Perempuan'
        ]);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
