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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->constrained('portofolio');
            $table->foreignId('kategori_pengeluaran_id')->constrained('kategori_pengeluaran');
            $table->string('kode');
            $table->date('tanggal');
            $table->text('uraian');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
