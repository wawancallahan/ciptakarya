@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-empat', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Parkir Kendaraan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="parkir_kendaraan_unit" class="form-control" value="{{ $item->parkir_kendaraan_unit }}">
                </div>

                <div class="form-group">
                    <label>Panjang x Lebar</label>
                    <input type="text" name="parkir_kendaraan_pl" class="form-control" value="{{ $item->parkir_kendaraan_pl }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="parkir_kendaraan_kondisi" class="form-control" value="{{ $item->parkir_kendaraan_kondisi }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="parkir_kendaraan_keterangan" class="form-control" value="{{ $item->parkir_kendaraan_keterangan }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Drainase</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="drainase_unit" class="form-control" value="{{ $item->drainase_unit }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="drainase_kondisi" class="form-control" value="{{ $item->drainase_kondisi }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="drainase_keterangan" class="form-control" value="{{ $item->drainase_keterangan }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pembuangan Sampah</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="sampah_unit" class="form-control" value="{{ $item->sampah_unit }}">
                </div>

                <div class="form-group">
                    <label>Panjang x Lebar</label>
                    <input type="text" name="sampah_pl" class="form-control" value="{{ $item->sampah_pl }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="sampah_kondisi" class="form-control" value="{{ $item->sampah_kondisi }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="sampah_keterangan" class="form-control" value="{{ $item->sampah_keterangan }}">
                </div>
            </div>
        </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection