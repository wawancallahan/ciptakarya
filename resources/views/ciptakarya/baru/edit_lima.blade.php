@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-lima', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Rangka Atap</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Jenis Bahan</label>
                    <input type="text" name="jenis_rangka_atap" class="form-control" value="{{ $item->jenis_rangka_atap }}">
                </div>

                <div class="form-group">
                    <label>Panjang x Lebar</label>
                    <input type="text" name="pl_rangka_atap" class="form-control" value="{{ $item->pl_rangka_atap }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_rangka_atap" class="form-control" value="{{ $item->kondisi_rangka_atap }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_rangka_atap" class="form-control" value="{{ $item->keterangan_rangka_atap }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kemiringan Atap</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Jenis Kemiringan Atap</label>
                    <input type="text" name="jenis_kemiringan_a" class="form-control" value="{{ $item->jenis_kemiringan_a }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_kemiringan_a" class="form-control" value="{{ $item->kondisi_kemiringan_a }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_kemiringan_a" class="form-control" value="{{ $item->keterangan_kemiringan_a }}">
                </div>
            </div>
        </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection