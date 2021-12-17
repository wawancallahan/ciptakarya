@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-catatan', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Catatan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Catatan</label>
                    <textarea name="catatan" id="" class="form-control" rows="4">{{ $item->catatan }}</textarea>
                </div>
            </div>
        </div>
        
        
        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection