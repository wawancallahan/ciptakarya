<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css" media="all">
        .table-container {
            table-layout: fixed; 
            width: 100%;
        }

        .table-container td .kop { max-width: none; width: 100% }

        .table-100 {
            width: 100%;
        }

        th, td {
            font-size: 15pt;
            padding: 5px;
            vertical-align: top;
        }

        .fonts{
            font-family: Tahoma, sans-serif;
        }

        hr.first {
            border-top: 1px solid black;
            margin: 0px;
        }
        hr.second {
            border-top: 1px solid black;
            margin-bottom: 10px;
        }

        @page {
            size: A4 portrait;
            margin: 5%;
        }
    </style>
</head>
<body>
    <main>
        <table class="table-container">
            <tr>
                <td>
                    <img class="kop" src="{{ asset('gambar/kop.png') }}" alt="kop">
                </td>
            </tr>
            <tr>
                <td>
                    <div style="text-align: left;">
                        <h2><strong class="fonts"><center>Cipta Karya</center></strong></h2>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table-container">
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <th>Tipe</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Bangunan {{ ucwords($item->jenis) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->nama_bangunan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->jenis_bangunan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->no_telepon }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Bangun</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->tahun_bangun }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <th>Lat/Long</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->lat_long }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Koordinat DMS</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->koordinat_dms }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Koordinator UTM</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->koordinat_utm }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        Data bangunan diatas telah melewati verifikasi dengan hasil <strong>{{ $item->rekomendasi_format }}</strong> serta memiliki klasifikasi <strong>{{ $item->klasifikasi }}</strong>, dan data bangunan diatas
                        <strong>{{ $item->rekomendasi === 'rekomendasi' ? 'Layak' : 'Belum Layak' }} untuk mengajukan Sertifikat Laik Fungsi (SLF)</strong>
                    </div>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>
