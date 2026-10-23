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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('master_companies');
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 150);
            $table->enum('kategori', ['atk', 'alkes', 'komputer', 'material']);
            $table->string('satuan', 20);
            $table->decimal('harga_beli_default', 15, 2)->default(0);
            $table->decimal('harga_jual_default', 15, 2)->default(0);
            $table->integer('stok_minimum')->default(5);
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
