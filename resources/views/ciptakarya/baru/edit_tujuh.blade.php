@extends ('layouts.main')

@section ('title', 'Edit Bangunan Baru')
@section ('titlepage', 'Edit Bangunan Baru')

@push ('js')
    <script>
        $(function () {
            new Cleave($('.numeral1'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral2'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral3'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral4'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral5'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral6'), {
                numeral: true,
                numeralPositiveOnly: true
            });
            new Cleave($('.numeral7'), {
                numeral: true,
                numeralPositiveOnly: true
            });
        });
    </script>
@endpush

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('baru-update-tujuh', $item->id) }}" method="POST">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ketentuan Umum</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Luas Lantai Dasar</label>
                    <input type="text" name="luas_lantai_dasar" class="form-control numeral1" value="{{ $item->luas_lantai_dasar ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Luas Lahan Tanah Perpetakan</label>
                    <input type="text" name="luas_lahan_tanah_perpetakan" class="form-control numeral2" value="{{ $item->luas_lahan_tanah_perpetakan ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Luas Seluruh Lantai</label>
                    <input type="text" name="luas_seluruh_lantai" class="form-control numeral3" value="{{ $item->luas_seluruh_lantai ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Luas Seluruh Ruang Terbuka</label>
                    <input type="text" name="luas_seluruh_ruang_terbuka" class="form-control numeral4" value="{{ $item->luas_seluruh_ruang_terbuka ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Luas Tapak Basement</label>
                    <input type="text" name="luas_tapak_basement" class="form-control numeral5" value="{{ $item->luas_tapak_basement ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Lt. Proyeksi</label>
                    <input type="text" name="lt_proyeksi" class="form-control numeral6" value="{{ $item->lt_proyeksi ?? 0 }}" required>
                </div>

                <div class="form-group">
                    <label>Luas Lahan Terbuka</label>
                    <input type="text" name="luas_lahan_terbuka" class="form-control numeral7" value="{{ $item->luas_lahan_terbuka ?? 0 }}" required>
                </div>
            </div>
        </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection