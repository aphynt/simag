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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();

            // uuid penilaian (unik, index)
            $table->uuid('uuid')->unique();

            // relasi ke pengajuan (uuid_pengajuan disimpan sebagai string)
            $table->uuid('uuid_pengajuan')->index()->nullable();

            // metadata
            $table->boolean('statusenabled')->default(true); // aktif / nonaktif
            $table->unsignedBigInteger('penilai_id')->nullable()->index(); // id user penilai (opsional)
            $table->string('penilai_name')->nullable(); // nama penilai untuk kemudahan tampilan

            // judul / ringkasan evaluasi
            $table->string('judul')->nullable();

            // kriteria penilaian (nilai 1 - 5)
            $table->tinyInteger('kehadiran')->nullable()->unsigned();
            $table->tinyInteger('sikap')->nullable()->unsigned();
            $table->tinyInteger('teknis')->nullable()->unsigned();
            $table->tinyInteger('problem_solving')->nullable()->unsigned();
            $table->tinyInteger('kerja_tim')->nullable()->unsigned();
            $table->tinyInteger('penyelesaian_tugas')->nullable()->unsigned();
            $table->tinyInteger('laporan')->nullable()->unsigned();

            // nilai akhir (rata-rata atau berbobot) - simpan dengan 2 desimal
            $table->decimal('nilai_akhir', 5, 2)->nullable();

            // rekomendasi (Lulus / Perbaikan / Tidak Lulus)
            $table->enum('rekomendasi', ['Lulus','Perbaikan','Tidak Lulus'])->nullable();

            // komentar / catatan pembimbing (text)
            $table->text('komentar')->nullable();

            // file umpan balik / lampiran (path)
            $table->string('file_feedback')->nullable();

            // status draft/final jika diperlukan (0=draft,1=final)
            $table->boolean('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
