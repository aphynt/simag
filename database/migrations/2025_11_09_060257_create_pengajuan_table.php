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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id');
            $table->string('uuid')->index();
            $table->boolean('statusenabled')->default(1);
            $table->date('tanggal_pengajuan')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('alasan_magang')->nullable();
            $table->string('kompetensi_ilmu')->nullable();
            $table->string('jenis_magang')->nullable();
            $table->string('file_pendukung')->nullable();
            $table->boolean('setuju')->default(1);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
