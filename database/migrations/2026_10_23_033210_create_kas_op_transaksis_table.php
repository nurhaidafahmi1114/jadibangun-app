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
        Schema::create('kas_op_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('master_companies');
            $table->foreignId('pengajuan_op_id')->constrained('pengajuan_ops');
            $table->foreignId('proyek_id')->nullable()->constrained('proyeks');
            $table->date('tanggal_transaksi');
            $table->enum('kategori_biaya', ['upah_tukang', 'material_cash', 'pelunasan_tempo', 'operasional_kantor', 'prive_pemilik']);
            $table->decimal('nominal_keluar', 15, 2);
            $table->string('nomor_nota', 100)->nullable();
            $table->string('penerima_bayar', 150);
            $table->string('foto_bukti_path')->nullable();
            $table->timestamps(); // <-- Otomatis membuat created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_op_transaksis');
    }
};
