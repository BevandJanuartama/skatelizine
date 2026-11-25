<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk')->unique(); // NIS atau NIP
            $table->string('nama');
            $table->string('kelas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('jk')->nullable();
            $table->string('wali_kelas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('password');
            $table->string('level')->default('siswa');
            $table->rememberToken();
            $table->timestamps();
        });

        // Kolom reset password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('no_induk')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel sessions, jika dibutuhkan
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
