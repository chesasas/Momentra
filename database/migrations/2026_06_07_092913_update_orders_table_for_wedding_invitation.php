<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // HAPUS KOLOM LAMA
            $table->dropColumn([
                'event_name',
                'bride_name',
                'groom_name',
                'date',
                'time',
                'description',
                'cover_photo',
                'bride_photo',
                'groom_photo',
            ]);

            // DATA MEMPELAI LAKI
            $table->string('nama_panggilan_laki')->after('slug');
            $table->string('nama_lengkap_laki')->after('nama_panggilan_laki');
            $table->string('ayah_laki')->after('nama_lengkap_laki');
            $table->string('ibu_laki')->after('ayah_laki');
            $table->string('foto_laki')->nullable()->after('ibu_laki');

            // DATA MEMPELAI PEREMPUAN
            $table->string('nama_panggilan_perempuan')->after('foto_laki');
            $table->string('nama_lengkap_perempuan')->after('nama_panggilan_perempuan');
            $table->string('ayah_perempuan')->after('nama_lengkap_perempuan');
            $table->string('ibu_perempuan')->after('ayah_perempuan');
            $table->string('foto_perempuan')->nullable()->after('ibu_perempuan');

            // ACARA
            $table->string('hari')->after('foto_perempuan');
            $table->date('tanggal')->after('hari');
            $table->time('jam_mulai')->after('tanggal');
            $table->time('jam_selesai')->nullable()->after('jam_mulai');

            // REKENING
            $table->string('bank1')->nullable()->after('google_maps');
            $table->string('norek_bank1')->nullable()->after('bank1');
            $table->string('atasnama_bank1')->nullable()->after('norek_bank1');

            $table->string('bank2')->nullable()->after('atasnama_bank1');
            $table->string('norek_bank2')->nullable()->after('bank2');
            $table->string('atasnama_bank2')->nullable()->after('norek_bank2');

            // FOTO STATIS
            $table->string('foto_cover')->nullable()->after('atasnama_bank2');
            $table->string('foto_acara')->nullable()->after('foto_cover');
            $table->string('foto_bukutamu')->nullable()->after('foto_acara');
            $table->string('foto_gift')->nullable()->after('foto_bukutamu');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'nama_panggilan_laki',
                'nama_lengkap_laki',
                'ayah_laki',
                'ibu_laki',
                'foto_laki',

                'nama_panggilan_perempuan',
                'nama_lengkap_perempuan',
                'ayah_perempuan',
                'ibu_perempuan',
                'foto_perempuan',

                'hari',
                'tanggal',
                'jam_mulai',
                'jam_selesai',

                'bank1',
                'norek_bank1',
                'atasnama_bank1',

                'bank2',
                'norek_bank2',
                'atasnama_bank2',

                'foto_cover',
                'foto_acara',
                'foto_bukutamu',
                'foto_gift',
            ]);

            // Kembalikan kolom lama jika rollback
            $table->string('event_name');
            $table->string('bride_name');
            $table->string('groom_name');
            $table->date('date');
            $table->time('time');
            $table->longText('description')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('bride_photo')->nullable();
            $table->string('groom_photo')->nullable();
        });
    }
};