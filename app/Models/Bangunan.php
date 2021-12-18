<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $table = 'bangunans';

    protected $fillable = [
        'jenis',
        'nama_bangunan',
        'jenis_bangunan',
        'alamat',
        'no_telepon',
        'tahun_bangun',
        'lat_long',
        'koordinat_dms',
        'koordinat_utm',
        'skb',
        'dokumen_teknis',
        'gambar_ded',
        'imb',
        'slf',
        'spakb',
        'pbb',
        'jenis_surat_tanah',
        'nomor_surat_tanah',
        'jarak_depan',
        'jarak_belakang',
        'jarak_kiri',
        'jarak_kanan',
        'keterangan_jarak',
        'tinggi_ll',
        'keterangan_ll',
        'tinggi_bangunan',
        'keterangan_tb',
        'status_pagar',
        'pl_pagar',
        'kondisi_pagar',
        'keterangan_pagar',
        'parkir_kendaraan_unit',
        'parkir_kendaraan_pl',
        'parkir_kendaraan_kondisi',
        'parkir_kendaraan_keterangan',
        'drainase_unit',
        'drainase_kondisi',
        'drainase_keterangan',
        'sampah_unit',
        'sampah_pl',
        'sampah_kondisi',
        'sampah_keterangan',
        'jenis_rangka_atap',
        'pl_rangka_atap',
        'kondisi_rangka_atap',
        'keterangan_rangka_atap',
        'jenis_kemiringan_a',
        'kondisi_kemiringan_a',
        'keterangan_kemiringan_a',
        'luas_lantai_dasar',
        'luas_lahan_tanah_perpetakan',
        'luas_seluruh_lantai',
        'luas_seluruh_ruang_terbuka',
        'luas_tapak_basement',
        'lt_proyeksi',
        'luas_lahan_terbuka',
        'rekomendasi',
        'klasifikasi',
        'catatan'
    ];

    public function getRekomendasiFormatAttribute() {
        switch ($this->rekomendasi) {
            case 'rekomendasi': return 'REKOMENDASI';
            case 'tidak_rekomendasi': return 'TIDAK REKOMENDASI';
        }

        return null;
    }

    public function saranaBangunan() {
        return $this->hasOne(SaranaBangunan::class, 'bangunan_id');
    }

    public function ciptaKarya() {
        return $this->hasOne(CiptaKarya::class, 'bangunan_id');
    }

    public function bangunanUpload() {
        return $this->hasMany(BangunanUpload::Class, 'bangunan_id');
    }
}
