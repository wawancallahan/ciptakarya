@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-tiga', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Jarak Antar Bangunan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jarak Depan</label>
                            <input type="text" name="jarak_depan" class="form-control" value="{{ $item->jarak_depan }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jarak Belakang</label>
                            <input type="text" name="jarak_belakang" class="form-control" value="{{ $item->jarak_belakang }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jarak Kiri</label>
                            <input type="text" name="jarak_kiri" class="form-control" value="{{ $item->jarak_kiri }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jarak Kanan</label>
                            <input type="text" name="jarak_kanan" class="form-control" value="{{ $item->jarak_kanan }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_jarak" class="form-control" value="{{ $item->keterangan_jarak }}">
                </div>
            </div>
        </div>
        
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ketinggian Langit-langit</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Tinggi</label>
                    <input type="text" name="tinggi_ll" class="form-control" value="{{ $item->tinggi_ll }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_ll" class="form-control" value="{{ $item->keterangan_ll }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ketinggian Bangunan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Tinggi</label>
                    <input type="text" name="tinggi_bangunan" class="form-control" value="{{ $item->tinggi_bangunan }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_tb" class="form-control" value="{{ $item->keterangan_tb }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pagar Halaman</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status_pagar" class="form-control" value="{{ $item->status_pagar }}">
                </div>

                <div class="form-group">
                    <label>Panjang x Lebar</label>
                    <input type="text" name="pl_pagar" class="form-control" value="{{ $item->pl_pagar }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_pagar" class="form-control" value="{{ $item->kondisi_pagar }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_pagar" class="form-control" value="{{ $item->keterangan_pagar }}">
                </div>
            </div>
        </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection