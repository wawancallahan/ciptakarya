@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-rekomendasi', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Klasifikasi</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Rekomendasi</label>
                    <select name="rekomendasi" id="" class="form-control" required>
                        <option value="rekomendasi" {{ $item->rekomendasi === 'rekomendasi' ? 'selected' : null }}>Rekomendasi</option>
                        <option value="tidak_rekomendasi" {{ $item->rekomendasi === 'tidak_rekomendasi' ? 'selected' : null }}>Tidak Rekomendasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Klasifikasi</label>
                    <input type="text" name="klasifikasi" class="form-control" value="{{ $item->klasifikasi ?? '' }}" required>
                </div>
            </div>
        </div>
        
        
        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection