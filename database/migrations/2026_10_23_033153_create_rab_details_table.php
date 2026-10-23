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
        Schema::create('rab_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rab_id')->constrained('rabs')->onDelete('cascade');
            $table->string('kategori_pekerjaan', 100);
            $table->string('uraian_item', 200);
            $table->enum('tipe_komponen', ['bahan', 'upah', 'alat']);
            $table->decimal('volume', 10, 2);
            $table->string('satuan', 20);
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('total_harga', 15, 2);
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_details');
    }
};
