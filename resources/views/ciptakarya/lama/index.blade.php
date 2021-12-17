@extends ('layouts.main')

@section ('title', 'Bangunan Lama')

@section ('titlepage', 'Bangunan Lama')

@section ('content')

    @include ('layouts.components.flash')

    <div class="card">
        <div class="card-body">
            <div>
                <a href="{{ route('ciptakaryalama.create') }}" class="btn btn-primary">Tambah Bangunan</a>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
        </div>
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
                                <a href="{{ route('ciptakaryalama.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="#" data-route="{{ route('ciptakaryalama.destroy', $item->id) }}" class="btn btn-danger btn-sm hapus-item">
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