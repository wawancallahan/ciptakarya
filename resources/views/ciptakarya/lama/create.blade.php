@extends ('layouts.main')

@section ('title', 'Bangunan Lama')
@section ('titlepage', 'Bangunan Lama')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('ciptakaryalama.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Info Bangunan</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Bangunan</label>
                            <input type="text" name="nama_bangunan" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Bangunan</label>
                            <input type="text" name="jenis_bangunan" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Bangunan</label>
                            <textarea name="alamat" id="" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun Bangun</label>
                            <input type="text" name="tahun_bangun" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label>Foto Bangunan</label>
                            <input type="file" name="foto_bangunan" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Koordinat Lokasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Lat/Long</label>
                            <input type="text" name="lat_long" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Koordinat DMS</label>
                            <input type="text" name="koordinat_dms" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Koordinat UTM</label>
                            <input type="text" name="koordinat_utm" class="form-control" placeholder="">
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