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
        Schema::create('kas_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('master_companies');
            $table->string('nama_akun', 100);
            $table->string('nomor_rekening', 50)->nullable();
            $table->decimal('saldo_saat_ini', 15, 2)->default(0);
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_banks');
    }
};
