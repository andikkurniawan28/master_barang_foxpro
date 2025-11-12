@extends('template')

@section('content')
<div class="container-fluid py-0 px-0">
    <h1 class="h3 mb-3"><strong>Daftar Barang</strong></h1>

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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
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
            order: [[0, 'asc']],
            columns: [
                { data: 'KDBRG', name: 'KDBRG' },
                { data: 'NAMA', name: 'NAMA' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
