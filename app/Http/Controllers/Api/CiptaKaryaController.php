<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CiptaKaryaController extends Controller
{
    public function rumah(Request $request)
    {
        $rumah = $request->tipe;
        $lebar = str_replace(',', '', $request->lebar);
        $panjang_depan = str_replace(',', '', $request->panjang_depan);
        $panjang_belakang = str_replace(',', '', $request->panjang_belakang);
        $panjang_samping = str_replace(',', '', $request->panjang_samping);
        
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
        $total_pagar_depan = $panjang_depan * $depan;
        $total_pagar_belakang = $panjang_belakang * $belakang;
        $total_pagar_samping = $panjang_samping * $samping;

        $total_non_standar = $harga_rumah_non_standar * $lebar;
        $total_pagar_depan_non_standar = $panjang_depan * $depan_non_standar;
        $total_pagar_belakang_non_standar = $panjang_belakang * $belakang_non_standar;
        $total_pagar_samping_non_standar = $panjang_samping * $samping_non_standar;

        $html = view('ciptakarya.baru.rumah_total', [
            'total' => $total,
            'total_pagar_depan' => $total_pagar_depan,
            'total_pagar_belakang' => $total_pagar_belakang,
            'total_pagar_samping' => $total_pagar_samping,
            'total_non_standar' => $total_non_standar,
            'total_pagar_depan_non_standar' => $total_pagar_depan_non_standar,
            'total_pagar_belakang_non_standar' => $total_pagar_belakang_non_standar,
            'total_pagar_samping_non_standar' => $total_pagar_samping_non_standar
        ])->render();

        return response()->json([
            'html' => $html
        ], 200);
    }

    public function gedung(Request $request)
    {
        $gedung = $request->tipe;
        $lebar = str_replace(',', '', $request->lebar);
        $panjang_depan = str_replace(',', '', $request->panjang_depan);
        $panjang_belakang = str_replace(',', '', $request->panjang_belakang);
        $panjang_samping = str_replace(',', '', $request->panjang_samping);
        
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

        $html = view('ciptakarya.baru.gedung_total', [
            'total' => $total,
            'total_pagar_depan' => $total_pagar_depan,
            'total_pagar_belakang' => $total_pagar_belakang,
            'total_pagar_samping' => $total_pagar_samping,
            'total_non_standar' => $total_non_standar,
            'total_pagar_depan_non_standar' => $total_pagar_depan_non_standar,
            'total_pagar_belakang_non_standar' => $total_pagar_belakang_non_standar,
            'total_pagar_samping_non_standar' => $total_pagar_samping_non_standar
        ])->render();

        return response()->json([
            'html' => $html
        ], 200);
    }
}
