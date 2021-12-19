@extends ('layouts.main')

@section ('title', 'Bangunan Baru')
@section ('titlepage', 'Bangunan Baru')

@push ('js')
    <script>
        $(function () {
            $('#btn-proses').on('click', function (e) {
                e.preventDefault();

                let el = $(this);
                let form = $('#form-cipta');

                if (form[0].checkValidity()) {
                    el.attr('disabled', 'disabled');

                    $.ajax({
                        method: 'POST',
                        url: '{{ route("api.ciptakarya.gedung") }}',
                        data: form.serializeArray(),
                    }).done(function (response) {
                        $('#table-item').html(response.html);
                    }).always(function () {
                        el.removeAttr('disabled');
                    });
                } else {
                    form[0].reportValidity();
                }
            });

            $('body').on('click', '.btn-simpan', function (e) {
                e.preventDefault();

                let el = $(this);
                let form = $('#form-cipta');

                if (form[0].checkValidity()) {
                    el.attr('disabled', 'disabled');

                    form.submit();
                } else {
                    form[0].reportValidity();
                }
            });

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
        });
    </script>
@endpush

@section ('content')

    @include ('layouts.components.flash')

    <form action="{{ route('ciptakaryabaru.store') }}" method="POST" id="form-cipta" enctype="multipart/form-data">
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
        
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Gedung Negara</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="jenis" value="gedung">

                <div class="form-group">
                    <label for="">Gedung</label>
                    <select class="form-control" name="tipe" required>
                        @foreach ($gedungs as $gedungId => $gedungValue)
                            <option value="{{ $gedungId }}">{{ $gedungValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Luas (m^2)</label>
                    <input type="text" class="form-control numeral1" name="lebar" required>
                </div>

                <div class="form-group">
                    <label for="">Pagar Depan/T: 1,5M (m)</label>
                    <input type="text" class="form-control numeral2" name="panjang_depan" required>
                </div>

                <div class="form-group">
                    <label for="">Pagar Belakang/T: 3M (m)</label>
                    <input type="text" class="form-control numeral3" name="panjang_belakang" required>
                </div>

                <div class="form-group">
                    <label for="">Pagar Samping/T: 2M (m)</label>
                    <input type="text" class="form-control numeral4" name="panjang_samping" required>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="btn-proses">Perhitungan</button>
                </div>

                <div id="table-item"></div>
            </div>
        </div>
        
        <div class="card">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection