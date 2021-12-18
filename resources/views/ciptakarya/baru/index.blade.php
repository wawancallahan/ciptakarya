@extends ('layouts.main')

@section ('title', 'Bangunan Baru')

@section ('titlepage', 'Bangunan Baru')

@section ('content')

    @include ('layouts.components.flash')

    <div class="card">
        <div class="card-body">
            <div>
                <a href="{{ route('ciptakaryabaru.rumah') }}" class="btn btn-primary">Tambah Bangunan Rumah Negara</a>
                <a href="{{ route('ciptakaryabaru.gedung') }}" class="btn btn-primary">Tambah Bangunan Gedung Negara</a>
            </div>
        </div>
    </div>
    
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>No Telepon</th>
                    <th>Tahun Bangun</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_bangunan }}</td>
                            <td>{{ $item->jenis_bangunan }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->tahun_bangun }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('ciptakaryabaru.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="#" data-route="{{ route('ciptakaryabaru.destroy', $item->id) }}" class="btn btn-danger btn-sm hapus-item">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer text-right">                
            {{ $items->links() }}
        </div>
    </div>
@endsection