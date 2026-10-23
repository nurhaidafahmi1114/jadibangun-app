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
        Schema::create('master_companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama_company', 100);
            $table->string('kode_company', 20)->unique();
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 30)->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_companies');
    }
};
