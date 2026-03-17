@extends('template')

@section('tambah_barang')
    {{ 'active' }}
@endsection

@section('content')
    <div class="container-fluid py-0 px-0">
        <h1 class="h3 mb-3"><strong>Tambah Data Barang</strong></h1>

        <div class="card shadow-sm p-4">
            <form id="formMasterBarang" action="{{ route('tambah_barang.process') }}" method="POST">
                @csrf

                <div class="row">

                    @include('form_header_tambah')

                    <!-- SPESIFIKASI BARANG -->
                    <div class="col-md-12 mt-3">
                        <h5 class="fw-bold mb-2">Spesifikasi Barang</h5>

                        <!-- Nama -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Nama Barang</label>
                            </div>
                            <div class="col-md-9">
                                {{-- <input type="text" class="form-control" name="NAMA_BARU" id="NAMA_BARU"
                                    value="" placeholder="Masukkan nama barang..."> --}}
                                <textarea class="form-control" name="NAMA_BARU" id="NAMA_BARU" placeholder="Masukkan nama barang..."></textarea>
                            </div>
                        </div>

                        <!-- Alias -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Istilah Lapangan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="NM_ALIAS" id="NM_ALIAS"
                                    placeholder="Masukkan istilah lapangan..." value="">
                            </div>
                        </div>

                        <!-- Diskripsi -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Diskripsi</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" id="DISKRIPSI_BARU" name="DISKRIPSI_BARU"></textarea>
                            </div>
                        </div>

                        @include('form_spesifikasi_tambah')

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="text-center mt-4">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button class="btn btn-secondary px-4" id="reset">
                        <i class="bi bi-arrow-counterclockwise"></i> Bersihkan
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            @include('button_simpan_samping_dropdown')
            @include('reset_semua_inputan')
            @include('generate_kode_barang')
            @include('perubahan_dropdown')
            @include('other_js')
        });
    </script>
@endsection
