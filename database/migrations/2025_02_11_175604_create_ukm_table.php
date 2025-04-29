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
        Schema::create('ukm', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('logo')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->json('media_sosial')->nullable();
            $table->foreignId('admin_ukm_id')->constrained('users')->onDelete('cascade');
            $table->decimal('saldo', 10, 2);
            $table->timestamps();
        });
        Schema::create('anggota_ukm', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin')->nullable();
            $table->string('jurusan');
            $table->enum('fakultas', ['fkip', 'feb', 'faktek', 'fapetrik', 'fikes', 'fai', 'hukum']);
            $table->string('angkatan');
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->string('nama');
            $table->string('bidang');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['selesai', 'belum selesai',]);
            $table->timestamps();
        });

        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['pemasukan', 'pengeluaran',]);
            $table->decimal('jumlah', 10, 2);
            $table->text('keterangan')->nullable();
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->string('judul');
            $table->enum('jenis_surat', ['masuk', 'keluar']);
            $table->string('file_path');
            $table->timestamps();
        });

        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('dokumentasi')->nullable();
            $table->timestamps();
        });

        Schema::create('pendaftaran_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ukm_id')->constrained('ukm')->onDelete('cascade');
            $table->enum('pendaftaran', ['terbuka', 'tertutup']);
            $table->date('batas_pendaftaran');
            $table->string('brosur');
            $table->text('link_pendaftaran')->nullable();
            $table->string('persyaratan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukm');
    }
};
