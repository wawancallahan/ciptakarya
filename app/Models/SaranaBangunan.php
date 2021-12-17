<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaBangunan extends Model
{
    use HasFactory;

    protected $table = 'sarana_bangunans';

    protected $fillable = [
        'bangunan_id',
        'kondisi_air',
        'keterangan_air',
        'kondisi_air_hujan',
        'keterangan_air_hujan',
        'kondisi_air_kotor',
        'keterangan_air_kotor',
        'kondisi_pembuangan',
        'keterangan_pembuangan',
        'pl_septictank',
        'kondisi_septictank',
        'keterangan_septictank',
        'pln_listrik',
        'generator_listrik',
        'kondisi_listrik',
        'keterangan_listrik',
        'jenis_udara',
        'kondisi_udara',
        'keterangan_udara',
    ];

    public function bangunan() {
        return $this->belongsTo(Bangunan::class, 'bangunan_id');
    }
}
