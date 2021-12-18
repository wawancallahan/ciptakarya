@extends ('layouts.main')

@section ('title', 'Bangunan Lama')

@section ('titlepage', 'Bangunan Lama')

@section ('content')

    @include ('layouts.components.flash')

    <div id="modal-maps" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <iframe 
                    width="100%" 
                    height="450" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    src="https://maps.google.com/maps?q={{ $lokasi_maps }}&hl=en&z=16&amp;output=embed"
                >
                </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#satu">
                <h4 class="card-title">
                    Bangunan
                </h4>
                <div class="card-tools">
                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-maps"><i class="fas fa-map-marker"></i> Lokasi</a>
                    <a href="{{ route('lama-edit-satu', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="satu" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                    <label>Info Bangunan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Nama Bangunan</p>
                        <p class="col-sm-8">{{ $item->nama_bangunan }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Jenis Bangunan</p>
                        <p class="col-sm-8">{{ $item->jenis_bangunan }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Alamat Bangunan</p>
                        <p class="col-sm-8">{{ $item->alamat }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">No. Telepon</p>
                        <p class="col-sm-8">{{ $item->no_telepon }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Tahun Bangun</p>
                        <p class="col-sm-8">{{ $item->tahun_bangun }}</p>
                    </div>

                    <label>Koordinat Lokasi</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Latitude/Longtitude</p>
                        <p class="col-sm-8">{{ $item->lat_long }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Koordinat DMS</p>
                        <p class="col-sm-8">{{ $item->koordinat_dms }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Koordinat UTM</p>
                        <p class="col-sm-8">{{ $item->koordinat_utm }}</p>
                    </div>

                    <label>Foto Bangunan</label>
                    <hr>

                    @if ($foto_bangunan !== null && file_exists(public_path() . '/uploads/foto_bangunan/' . $foto_bangunan->file))
                        <img src="{{ asset('uploads/foto_bangunan/' . $foto_bangunan->file) }}" alt="" class="foto_bangunan">
                    @endif
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#dua">
                <h4 class="card-title">
                    Persyaratan Administrasi
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-dua', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="dua" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <label>Dokumen Teknis</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Surat Kepemilikan Bangunan</p>
                        <p class="col-sm-8">
                            {{ $item->skb }}
                            @if ($file_surat_kepemilikan_bangunan !== null && file_exists(public_path() . '/uploads/file_surat_kepemilikan_bangunan/' . $file_surat_kepemilikan_bangunan->file))
                                <a href="{{ public_path() . '/uploads/file_surat_kepemilikan_bangunan/' . $file_surat_kepemilikan_bangunan->file }}" class="btn btn-info btn-xs">Download File</a>
                            @endif
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Dokumen Teknis</p>
                        <p class="col-sm-8">{{ $item->dokumen_teknis }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Gambar DED</p>
                        <p class="col-sm-8">
                            {{ $item->gambar_ded }}
                            @if ($file_gambar_ded !== null && file_exists(public_path() . '/uploads/file_gambar_ded/' . $file_gambar_ded->file))
                                <a href="{{ public_path() . '/uploads/file_gambar_ded/' . $file_gambar_ded->file }}" class="btn btn-info btn-xs" download>Download File</a>
                            @endif
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Izin Mendirikan Bangunan (IMB)</p>
                        <p class="col-sm-8">
                            {{ $item->imb }}
                            @if ($file_imb !== null && file_exists(public_path() . '/uploads/file_imb/' . $file_imb->file))
                                <a href="{{ public_path() . '/uploads/file_imb/' . $file_imb->file }}" class="btn btn-info btn-xs" download>Download File</a>
                            @endif
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Sertifikat Laik Fungsi (SLF)</p>
                        <p class="col-sm-8">{{ $item->slf }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Surat Perjanjian atas Kegagalan Bangunan</p>
                        <p class="col-sm-8">{{ $item->spakb }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Pajak Bumi Bangunan</p>
                        <p class="col-sm-8">{{ $item->pbb }}</p>
                    </div>

                    <label>Surat Tanah</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Jenis Surat Tanah</p>
                        <p class="col-sm-8">{{ $item->jenis_surat_tanah }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Nomor</p>
                        <p class="col-sm-8">{{ $item->nomor_surat_tanah }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#tujuh">
                <h4 class="card-title">
                    Ketentuan Umum
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-tujuh', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="tujuh" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <p class="col-sm-4">Luas Lantai Dasar</p>
                        <p class="col-sm-8">{{ $item->luas_lantai_dasar }}</p>
                    </div>
                    
                    <div class="row">
                        <p class="col-sm-4">Luas Lahan Tanah Perpetakan</p>
                        <p class="col-sm-8">{{ $item->luas_lahan_tanah_perpetakan }}</p>
                    </div>
                    
                    <div class="row">
                        <p class="col-sm-4">Luas Seluruh Lantai </p>
                        <p class="col-sm-8">{{ $item->luas_seluruh_lantai }}</p>
                    </div>
                    
                    <div class="row">
                        <p class="col-sm-4">Luas Seluruh Ruang Terbuka</p>
                        <p class="col-sm-8">{{ $item->luas_seluruh_ruang_terbuka }}</p>
                    </div>
                    
                    <div class="row">
                        <p class="col-sm-4">Luas Tapak Basement</p>
                        <p class="col-sm-8">{{ $item->luas_tapak_basement }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Lt. Proyeksi</p>
                        <p class="col-sm-8">{{ $item->lt_proyeksi }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Luas Lahan Terbuka</p>
                        <p class="col-sm-8">{{ $item->luas_lahan_terbuka }}</p>
                    </div>

                    <label>Hasil</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Koefisien Dasar Bangunan (KDB)</p>
                        <p class="col-sm-8">{{ number_format($total_ketentuan['kdb'] ?? 0) }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Koefisien Lantai Bangunan (KLB)</p>
                        <p class="col-sm-8">{{ number_format($total_ketentuan['klb'] ?? 0) }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Koefisien Daerah Hijau (KDH)</p>
                        <p class="col-sm-8">{{ number_format($total_ketentuan['kdh'] ?? 0) }}</p>
                    </div>

                    <div class="row">
                        <p class="col-sm-4">Koefisien Tapak Basemen (KTB)</p>
                        <p class="col-sm-8">{{ number_format($total_ketentuan['ktb'] ?? 0) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#tiga">
                <h4 class="card-title">
                    Persyaratan Tata Bangunan
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-tiga', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="tiga" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <label>Jarak Antar Bangunan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Jarak Depan</p>
                        <p class="col-sm-8">{{ $item->jarak_depan }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Jarak Belakang</p>
                        <p class="col-sm-8">{{ $item->jarak_belakang }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Jarak Kiri</p>
                        <p class="col-sm-8">{{ $item->jarak_kiri }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Jarak Kanan</p>
                        <p class="col-sm-8">{{ $item->jarak_kanan }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_jarak }}</p>
                    </div>

                    <label>Ketinggian Langit-langit</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Tinggi</p>
                        <p class="col-sm-8">{{ $item->tinggi_ll }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_ll }}</p>
                    </div>

                    <label>Ketinggian Bangunan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Tinggi</p>
                        <p class="col-sm-8">{{ $item->tinggi_bangunan }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_tb }}</p>
                    </div>

                    <label>Pagar Halaman</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Status</p>
                        <p class="col-sm-8">{{ $item->status_pagar }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Panjang x Lebar</p>
                        <p class="col-sm-8">{{ $item->pl_pagar }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->kondisi_pagar }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_pagar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#empat">
                <h4 class="card-title">
                    Kelengkapan Sarana & Prasarana
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-empat', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="empat" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <label>Parkir Kendaraan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Unit</p>
                        <p class="col-sm-8">{{ $item->parkir_kendaraan_unit }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Panjang x Lebar</p>
                        <p class="col-sm-8">{{ $item->parkir_kendaraan_pl }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->parkir_kendaraan_kondisi }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->parkir_kendaraan_keterangan }}</p>
                    </div>

                    <label>Drainase</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Unit</p>
                        <p class="col-sm-8">{{ $item->drainase_unit }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->drainase_kondisi }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->drainase_keterangan }}</p>
                    </div>

                    <label>Pembuangan Sampah</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Unit</p>
                        <p class="col-sm-8">{{ $item->sampah_unit }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Panjang x Lebar</p>
                        <p class="col-sm-8">{{ $item->sampah_pl }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->sampah_kondisi }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->sampah_keterangan }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#lima">
                <h4 class="card-title">
                    Persyaratan Struktur Bangunan
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-lima', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="lima" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <label>Rangka Atap</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Jenis Bahan</p>
                        <p class="col-sm-8">{{ $item->jenis_rangka_atap }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Panjang x Lebar</p>
                        <p class="col-sm-8">{{ $item->pl_rangka_atap }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->kondisi_rangka_atap }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_rangka_atap }}</p>
                    </div>

                    <label>Kemiringan Atap</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Unit</p>
                        <p class="col-sm-8">{{ $item->jenis_kemiringan_a }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->kondisi_kemiringan_a }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->keterangan_kemiringan_a }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#enam">
                <h4 class="card-title">
                    Persyaratan Sarana & Prasarana dalam Bangunan
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-enam', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="enam" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <label>Air Bersih</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_air ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_air ?? '' }}</p>
                    </div>

                    <label>Saluran Air Hujan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_air_hujan ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_air_hujan ?? '' }}</p>
                    </div>

                    <label>Pembuangan Air Kotor</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_air_kotor ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_air_kotor ?? '' }}</p>
                    </div>

                    <label>Pembuangan Kotoran</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_pembuangan ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_pembuangan ?? '' }}</p>
                    </div>

                    <label>Bak Septictank dan Resapan</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">Panjang x Lebar</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->pl_septictank ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_septictank ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_septictank ?? '' }}</p>
                    </div>

                    <label>Sumber Daya Listik</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">PLN</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->pln_listrik ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Generator</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->generator_listrik ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_listrik ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_listrik ?? '' }}</p>
                    </div>

                    <label>Tata Udara</label>
                    <hr>
                    <div class="row">
                        <p class="col-sm-4">AC</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->jenis_udara ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Kondisi</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->kondisi_udara ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->saranaBangunan->keterangan_udara ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#rekomendasi">
                <h4 class="card-title">
                    Klasifikasi
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-rekomendasi', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="rekomendasi" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <p class="col-sm-4">Rekomendasi</p>
                        <p class="col-sm-8">{{ $item->rekomendasi ?? '' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Keterangan</p>
                        <p class="col-sm-8">{{ $item->rekomendasi === 'rekomendasi' ? 'Layak mengajukan Sertifikat Laik Fungsi (SLF)' : '-' }}</p>
                    </div>
                    <div class="row">
                        <p class="col-sm-4">Klasifikasi</p>
                        <p class="col-sm-8">{{ $item->klasifikasi ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header" data-toggle="collapse" data-target="#catatan">
                <h4 class="card-title">
                    Catatan
                </h4>
                <div class="card-tools">
                    <a href="{{ route('lama-edit-catatan', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            
            <div id="catatan" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    {{ $item->catatan ?? '' }}
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="card-title">
                    Print
                </h4>
            </div>

            <div class="card-body">
                <a target="_blank" href="{{ route('lama-print', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Buat Laporan</a>
            </div>
        </div>

    </div>
@endsection