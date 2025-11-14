@extends('template')

@section('daftar_barang')
{{ "active" }}
@endsection

@section('content')
<div class="container-fluid py-0 px-0">
    <h1 class="h3 mb-3"><strong>Semua Barang</strong></h1>

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
                            <th>KODE_LAMA</th>
                            <th>NAMA_LAMA</th>
                            <th>KET</th>
                            <th>KODE_BARU</th>
                            <th>NAMA_BARU</th>
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
            ajax: "{{ route('daftar_barang') }}",
            order: [[1, 'asc']],
            columns: [
                // { data: 'ID', name: 'ID' },
                { data: 'KDBRG', name: 'KDBRG' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'KET', name: 'KET' },
                { data: 'KD_BRG', name: 'KD_BRG' },
                { data: 'NAMA_BARU', name: 'NAMA_BARU' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
