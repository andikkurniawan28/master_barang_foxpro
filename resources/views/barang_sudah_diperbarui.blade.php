@extends('template')

@section('barang_sudah_diperbarui')
{{ "active" }}
@endsection

@section('content')
<div class="container-fluid py-0 px-0">
    <h1 class="h3 mb-3"><strong>Barang Sudah Diperbarui</strong></h1>

    <div class="d-flex justify-content-between align-roles-center mb-3">
        <a href="{{ route('daftar_barang') }}" class="btn btn-primary">
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
                            <th>KD_BRG</th>
                            <th>NAMA_BARU</th>
                            <th>NM_ALIAS</th>
                            <th>NM_BRG</th>
                            <th>DISKRIPSI BARU</th>
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
            ajax: "{{ route('barang_sudah_diperbarui') }}",
            order: [[1, 'asc']],
            columns: [
                // { data: 'ID', name: 'ID' },
                // { data: 'KDBRG', name: 'KDBRG' },
                // { data: 'NAMA', name: 'NAMA' },
                { data: 'KD_BRG', name: 'KD_BRG' },
                { data: 'NAMA_BARU', name: 'NAMA_BARU' },
                { data: 'NM_ALIAS', name: 'NM_ALIAS' },
                { data: 'NM_BRG', name: 'NM_BRG' },
                { data: 'DISKRIPSI_BARU', name: 'DISKRIPSI_BARU' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
