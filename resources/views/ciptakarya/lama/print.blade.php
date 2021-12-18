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
                                        <th>Jenis</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ ucwords($item->jenis) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tipe</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ $item->tipe_format }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lebar</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ number_format($item->lebar) }} m<sup>2</sup>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pagar Depan</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ number_format($item->pagar_depan) }} m
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pagar Belakang</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ number_format($item->pagar_belakang) }} m
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pagar Samping</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            {{ number_format($item->pagar_samping) }} m
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <th>Harga</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Rp. {{ number_format($harga) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Pagar Depan</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Rp. {{ number_format($total_pagar_depan) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Pagar Belakang</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Rp. {{ number_format($total_pagar_belakang) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga Pagar Samping</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Rp. {{ number_format($total_pagar_samping) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Total Harga</th>
                                        <td style="padding-left: 20px"> : </td>
                                        <td style="padding-left: 20px; padding-bottom: 5px">
                                            Rp. {{ number_format($total) }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>
