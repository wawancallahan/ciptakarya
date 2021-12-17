<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiptaKarya extends Model
{
    use HasFactory;

    protected $table = 'ciptakaryas';

    protected $fillable = [
        'jenis',
        'tipe',
        'lebar',
        'pagar_depan',
        'pagar_belakang',
        'pagar_samping',
        'bangunan_id'
    ];

    public function getTipeFormatAttribute()
    {
        switch ($this->jenis) {
            case 'gedung':
                $gedung = [
                    1 => 'Tidak Sederhana',
                    2 => 'Sederhana'
                ];

                return $gedung[$this->tipe] ?? $this->tipe;
                break;
            case 'rumah':
                $rumah = [
                    1 => 'Tipe A',
                    2 => 'Tipe B',
                    3 => 'Tipe C',
                    4 => 'Tipe D',
                    5 => 'Tipe E'
                ];

                return $rumah[$this->tipe] ?? $this->tipe;
                break;
        }

        return $this->tipe;
    }

    public function getTotalFormatAttribute()
    {
        switch ($this->jenis) {
            case 'gedung':
                $gedung = $this->tipe;
                $lebar = str_replace(',', '', $this->lebar ?? 0);
                $panjang_depan = str_replace(',', '', $this->pagar_depan ?? 0);
                $panjang_belakang = str_replace(',', '', $this->pagar_belakang ?? 0);
                $panjang_samping = str_replace(',', '', $this->pagar_samping ?? 0);
                
                $gedungs = [
                    1 => 7000000,
                    2 => 5940000
                ];
        
                $depan = 2940000;
                $depan_non_standar = $depan + (($depan * 150) / 100);
                $belakang = 2640000;
                $belakang_non_standar = $belakang + (($belakang * 150) / 100);
                $samping = 2510000;
                $samping_non_standar = $samping + (($samping * 150) / 100);
        
                $harga_gedung = $gedungs[$gedung];
                $harga_gedung_non_standar = $harga_gedung + (($harga_gedung * 150) / 100);
        
                $total = $harga_gedung * $lebar;
                $total_pagar_depan = $panjang_depan * $depan;
                $total_pagar_belakang = $panjang_belakang * $belakang;
                $total_pagar_samping = $panjang_samping * $samping;

                $total_non_standar = $harga_gedung_non_standar * $lebar;
                $total_pagar_depan_non_standar = $panjang_depan * $depan_non_standar;
                $total_pagar_belakang_non_standar = $panjang_belakang * $belakang_non_standar;
                $total_pagar_samping_non_standar = $panjang_samping * $samping_non_standar;

                return [
                    'total' => $total,
                    'total_pagar_depan' => $total_pagar_depan,
                    'total_pagar_belakang' => $total_pagar_belakang,
                    'total_pagar_samping' => $total_pagar_samping,
                    'total_non_standar' => $total_non_standar,
                    'total_pagar_depan_non_standar' => $total_pagar_depan_non_standar,
                    'total_pagar_belakang_non_standar' => $total_pagar_belakang_non_standar,
                    'total_pagar_samping_non_standar' => $total_pagar_samping_non_standar
                ];
                break;
            case 'rumah':
                $rumah = $this->tipe;
                $lebar = str_replace(',', '', $this->lebar ?? 0);
                $pagar_depan = str_replace(',', '', $this->pagar_depan ?? 0);
                $pagar_belakang = str_replace(',', '', $this->pagar_belakang ?? 0);
                $pagar_samping = str_replace(',', '', $this->pagar_samping ?? 0);
                
                $rumahs = [
                    1 => 6990000,
                    2 => 6900000,
                    3 => 5300000,
                    4 => 5300000,
                    5 => 5300000
                ];

                $depan = 2680000;
                $depan_non_standar = $depan + (($depan * 150) / 100);
                $belakang = 1670000;
                $belakang_non_standar = $belakang + (($belakang * 150) / 100);
                $samping = 1570000;
                $samping_non_standar = $samping + (($samping * 150) / 100);

                $harga_rumah = $rumahs[$rumah];
                $harga_rumah_non_standar = $harga_rumah + (($harga_rumah * 150) / 100);

                $total = $harga_rumah * $lebar;
                $total_pagar_depan = $pagar_depan * $depan;
                $total_pagar_belakang = $pagar_belakang * $belakang;
                $total_pagar_samping = $pagar_samping * $samping;

                $total_non_standar = $harga_rumah_non_standar * $lebar;
                $total_pagar_depan_non_standar = $panjang_depan * $depan_non_standar;
                $total_pagar_belakang_non_standar = $panjang_belakang * $belakang_non_standar;
                $total_pagar_samping_non_standar = $panjang_samping * $samping_non_standar;

                return [
                    'total' => $total,
                    'total_pagar_depan' => $total_pagar_depan,
                    'total_pagar_belakang' => $total_pagar_belakang,
                    'total_pagar_samping' => $total_pagar_samping,
                    'total_non_standar' => $total_non_standar,
                    'total_pagar_depan_non_standar' => $total_pagar_depan_non_standar,
                    'total_pagar_belakang_non_standar' => $total_pagar_belakang_non_standar,
                    'total_pagar_samping_non_standar' => $total_pagar_samping_non_standar
                ];
                break;
        }

        return [
            'total' => 0,
            'total_pagar_depan' => 0,
            'total_pagar_belakang' => 0,
            'total_pagar_samping' => 0
        ];
    }

    public function bangunan() {
        return $this->belongsTo(Bangunan::class, 'bangunan_id');
    }
}
