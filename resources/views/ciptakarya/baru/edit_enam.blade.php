@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-enam', $bangunan->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Air Bersih</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_air" class="form-control" value="{{ $item->kondisi_air ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_air" class="form-control" value="{{ $item->keterangan_air ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Saluran Air Hujan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_air_hujan" class="form-control" value="{{ $item->kondisi_air_hujan ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_air_hujan" class="form-control" value="{{ $item->keterangan_air_hujan ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pembuangan Air Kotor</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_air_kotor" class="form-control" value="{{ $item->kondisi_air_kotor ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_air_kotor" class="form-control" value="{{ $item->keterangan_air_kotor ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pembuangan Kotoran</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_pembuangan" class="form-control" value="{{ $item->kondisi_pembuangan ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_pembuangan" class="form-control" value="{{ $item->keterangan_pembuangan ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Bak Septictank dan Resapan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Panjang x Lebar</label>
                    <input type="text" name="pl_septictank" class="form-control" value="{{ $item->pl_septictank ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_septictank" class="form-control" value="{{ $item->kondisi_septictank ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_septictank" class="form-control" value="{{ $item->keterangan_septictank ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sumber Daya Listrik</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>PLN</label>
                    <input type="text" name="pln_listrik" class="form-control" value="{{ $item->pln_listrik ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Generator</label>
                    <input type="text" name="generator_listrik" class="form-control" value="{{ $item->generator_listrik ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_listrik" class="form-control" value="{{ $item->kondisi_listrik?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_listrik" class="form-control" value="{{ $item->keterangan_listrik ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tata Udara</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>AC</label>
                    <input type="text" name="jenis_udara" class="form-control" value="{{ $item->jenis_udara ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" name="kondisi_udara" class="form-control" value="{{ $item->kondisi_udara ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan_udara" class="form-control" value="{{ $item->keterangan_udara ?? '' }}">
                </div>
            </div>
        </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection