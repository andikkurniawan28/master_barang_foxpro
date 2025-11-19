@extends('template')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-1"><strong>Detail Data Barang</strong></h1>
        <div class="card shadow-sm p-4">

            <div class="row">

                <!-- DATA LAMA -->
                <div class="col-md-12">
                    <h5 class="fw-bold mt-0 mb-2">Data Lama</h5>

                    <h6 class="fw-bold text-primary mb-1">
                        Kode Barang Lama:
                        <span class="text-dark">{{ $barang->DEFAULT_CO }}</span>
                    </h6>

                    <h6 class="fw-bold text-primary mb-1">
                        Nama Barang Lama:
                        <span class="text-dark">{{ $barang->NAMA }}</span>
                    </h6>

                    <small class="text-secondary d-block mb-2">
                        Diskripsi Barang Lama:
                        <span class="text-dark">{{ $barang->DISKRIPSI }}</span>
                    </small>
                </div>

                <!-- DATA BARU -->
                <div class="col-md-12 mt-3">
                    <h5 class="fw-bold mb-2">Data Baru</h5>

                    <h6 class="fw-bold text-primary mb-1">
                        Kode Barang Baru:
                        <span class="text-dark">{{ $barang->KD_BRG }}</span>
                    </h6>

                    <small class="text-secondary d-block mb-2">
                        Diskripsi Barang Baru:
                        <span class="text-dark">{{ $barang->NM_BRG }}</span>
                    </small>

                    <!-- Famili -->
                    <h5 class="fw-bold mt-4 mb-2">Famili / Kelompok Besar</h5>

                    <!-- D1 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Kelompok Utama</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->K1 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D2 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Sub Kelompok Utama</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->K2 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D3 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->K3 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D4 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Sub Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->K4 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D5 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Turunan Sub Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->K5 ?? '' }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- SPESIFIKASI BARANG -->
                <div class="col-md-12 mt-3">
                    <h5 class="fw-bold mb-2">Spesifikasi Barang</h5>

                    <!-- Nama -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3"><label class="fw-semibold mb-0">Nama Barang</label></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->NAMA_BARU ?: $barang->NAMA }}" readonly>
                        </div>
                    </div>

                    <!-- Alias -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3"><label class="fw-semibold mb-0">Istilah Lapangan</label></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->NM_ALIAS }}" readonly>
                        </div>
                    </div>

                    <!-- Diskripsi -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3"><label class="fw-semibold mb-0">Diskripsi</label></div>
                        <div class="col-md-9">
                            <textarea class="form-control" readonly>{{ $barang->DISKRIPSI_BARU ?? $barang->DISKRIPSI }}</textarea>
                        </div>
                    </div>

                    <!-- D6 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Ukuran / Warna / Tipe / Seri</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->K6 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D8 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Volume / Kapasitas / Daya</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->K8 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D10 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Merk / Material</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->K10 ?? '' }}" readonly>
                        </div>
                    </div>

                    <!-- D12 -->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Keterangan</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->K12 ?? '' }}" readonly>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
