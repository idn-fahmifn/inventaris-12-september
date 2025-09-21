
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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ruangan')->constrained('ruangan')->cascadeOnDelete();
            $table->string('nama_barang');
            $table->string('merk');
            $table->string('gambar');
            $table->date('tanggal_pembelian');
            $table->text('deskripsi');
            $table->enum('kondisi', ['baik', 'rusak', 'sedang diperbaiki'])->default('baik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
