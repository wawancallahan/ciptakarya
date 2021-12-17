@extends ('layouts.main')

@section ('title', 'Edit Bangunan Lama')
@section ('titlepage', 'Edit Bangunan Lama')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('lama-update-dua', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Teknis</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Surat Kepemilikan Bangunan</label>
                            <input type="text" name="skb" class="form-control" value="{{ $item->skb }}">
                        </div>
                        <div class="form-group">
                            <label>File Surat Kepemilikan Bangunan</label>
                            <input type="file" name="file_surat_kepemilikan_bangunan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Dokumen Teknis</label>
                            <input type="text" name="dokumen_teknis" class="form-control" value="{{ $item->dokumen_teknis }}">
                        </div>
                        <div class="form-group">
                            <label>Gambar DED</label>
                            <input type="text" name="gambar_ded" class="form-control" value="{{ $item->gambar_ded }}">
                        </div>
                        <div class="form-group">
                            <label>File Gambar DED</label>
                            <input type="file" name="file_gambar_ded" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Izin Mendirikan Bangunan (IMB)</label>
                            <input type="text" name="imb" class="form-control" value="{{ $item->imb }}">
                        </div>
                        <div class="form-group">
                            <label>File Izin Mendirikan Bangunan (IMB)</label>
                            <input type="file" name="file_imb" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Sertifikat Laik Fungsi (SLF)</label>
                            <input type="text" name="slf" class="form-control" value="{{ $item->slf }}">
                        </div>
                        <div class="form-group">
                            <label>Surat Perjanjian atas Kegagalan Bangunan</label>
                            <input type="text" name="spakb" class="form-control" value="{{ $item->spakb }}">
                        </div>
                        <div class="form-group">
                            <label>Pajak Bumi Bangunan</label>
                            <input type="text" name="pbb" class="form-control" value="{{ $item->pbb }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Surat Tanah</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Surat Tanah</label>
                            <input type="text" name="jenis_surat_tanah" class="form-control" value="{{ $item->jenis_surat_tanah }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor</label>
                            <input type="text" name="nomor_surat_tanah" class="form-control" value="{{ $item->nomor_surat_tanah }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection