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
        Schema::create('pengajuan_ops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('master_companies');
            $table->string('nomor_pengajuan', 50)->unique();
            $table->foreignId('bendahara_user_id')->constrained('users');
            $table->date('tanggal_pengajuan');
            $table->decimal('total_nominal', 15, 2);
            $table->foreignId('kas_bank_sumber_id')->nullable()->constrained('kas_banks');
            $table->enum('status', ['draft', 'submitted', 'approved', 'rejected'])->default('draft');
            $table->text('catatan_direktur')->nullable();
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_ops');
    }
};
