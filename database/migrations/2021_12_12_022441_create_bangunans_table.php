<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama_bangunan')->nullable();
            $table->string('jenis_bangunan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('tahun_bangun')->nullable();
            $table->string('lat_long')->nullable();
            $table->string('koordinat_dms')->nullable();
            $table->string('koordinat_utm')->nullable();
            $table->string('skb')->nullable();
            $table->string('dokumen_teknis')->nullable();
            $table->string('gambar_ded')->nullable();
            $table->string('imb')->nullable();
            $table->string('slf')->nullable();
            $table->string('spakb')->nullable();
            $table->string('pbb')->nullable();
            $table->string('jenis_surat_tanah')->nullable();
            $table->string('nomor_surat_tanah')->nullable();
            $table->string('jarak_depan')->nullable();
            $table->string('jarak_belakang')->nullable();
            $table->string('jarak_kiri')->nullable();
            $table->string('jarak_kanan')->nullable();
            $table->text('keterangan_jarak')->nullable();
            $table->string('tinggi_ll')->nullable();
            $table->text('keterangan_ll')->nullable();
            $table->string('tinggi_bangunan')->nullable();
            $table->text('keterangan_tb')->nullable();
            $table->string('status_pagar')->nullable();
            $table->string('pl_pagar')->nullable();
            $table->string('kondisi_pagar')->nullable();
            $table->text('keterangan_pagar')->nullable();
            $table->string('parkir_kendaraan_unit')->nullable();
            $table->string('parkir_kendaraan_pl')->nullable();
            $table->string('parkir_kendaraan_kondisi')->nullable();
            $table->text('parkir_kendaraan_keterangan')->nullable();
            $table->string('drainase_unit')->nullable();
            $table->string('drainase_kondisi')->nullable();
            $table->text('drainase_keterangan')->nullable();
            $table->string('sampah_unit')->nullable();
            $table->string('sampah_pl')->nullable();
            $table->string('sampah_kondisi')->nullable();
            $table->text('sampah_keterangan')->nullable();
            $table->string('jenis_rangka_atap')->nullable();
            $table->string('pl_rangka_atap')->nullable();
            $table->string('kondisi_rangka_atap')->nullable();
            $table->text('keterangan_rangka_atap')->nullable();
            $table->string('jenis_kemiringan_a')->nullable();
            $table->string('kondisi_kemiringan_a')->nullable();
            $table->text('keterangan_kemiringan_a')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bangunans');
    }
}
