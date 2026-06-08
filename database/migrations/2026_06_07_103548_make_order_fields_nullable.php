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
        Schema::table('orders', function (Blueprint $table) {

            $table->string('nama_panggilan_laki')->nullable()->change();
            $table->string('nama_lengkap_laki')->nullable()->change();
            $table->string('ayah_laki')->nullable()->change();
            $table->string('ibu_laki')->nullable()->change();

            $table->string('nama_panggilan_perempuan')->nullable()->change();
            $table->string('nama_lengkap_perempuan')->nullable()->change();
            $table->string('ayah_perempuan')->nullable()->change();
            $table->string('ibu_perempuan')->nullable()->change();

            // ACARA
            $table->string('hari')->nullable()->change();
            $table->date('tanggal')->nullable()->change();
            $table->time('jam_mulai')->nullable()->change();
            $table->time('jam_selesai')->nullable()->change();
    
            // REKENING
            $table->string('bank1')->nullable()->change();
            $table->string('norek_bank1')->nullable()->change();
            $table->string('atasnama_bank1')->nullable()->change();
    
            $table->string('bank2')->nullable()->change();
            $table->string('norek_bank2')->nullable()->change();
            $table->string('atasnama_bank2')->nullable()->change();
    
            // FOTO STATIS
            $table->string('foto_cover')->nullable()->change();
            $table->string('foto_acara')->nullable()->change();
            $table->string('foto_bukutamu')->nullable()->change();
            $table->string('foto_gift')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
