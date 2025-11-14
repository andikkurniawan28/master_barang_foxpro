@extends('template')

@section('barang_belum_diperbarui')
{{ "active" }}
@endsection

@section('content')
<div class="container-fluid py-0 px-0">
    <h1 class="h3 mb-3"><strong>Barang Belum Diperbarui</strong></h1>

    <div class="d-flex justify-content-between align-roles-center mb-3">
        <a href="{{ route('tambah_barang.index') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="barangTable" class="table table-bordered table-hover table-striped w-100 text-center">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            {{-- <th>KODE LAMA</th>
                            <th>NAMA LAMA</th> --}}
                            <th>DEFAULT_CO</th>
                            <th>NAMA</th>
                            <th>DISKRIPSI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('#barangTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('barang_belum_diperbarui') }}",
            order: [[1, 'asc']],
            columns: [
                // { data: 'ID', name: 'ID' },
                { data: 'DEFAULT_CO', name: 'DEFAULT_CO' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'DISKRIPSI', name: 'DISKRIPSI' },
                // { data: 'KD_BRG', name: 'KD_BRG' },
                // { data: 'NAMA_BARU', name: 'NAMA_BARU' },
                // { data: 'DISKRIPSI_BARU', name: 'DISKRIPSI_BARU' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
