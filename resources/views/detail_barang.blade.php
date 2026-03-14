@extends('template')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-1"><strong>Detail Data Barang</strong></h1>

        <div class="card shadow-sm p-4">

            <div class="row">

                {{-- ================= DATA LAMA ================= --}}
                <div class="col-md-12">

                    <h5 class="fw-bold mt-0 mb-2">Data Lama</h5>

                    <h6 class="fw-bold text-primary mb-1">
                        Kode Barang Lama :
                        <span class="text-dark">{{ $barang?->DEFAULT_CO }}</span>
                    </h6>

                    <h6 class="fw-bold text-primary mb-1">
                        Nama Barang Lama :
                        <span class="text-dark">{{ $barang?->NAMA }}</span>
                    </h6>

                    <small class="text-secondary d-block mb-2">
                        Diskripsi Barang Lama :
                        <span class="text-dark">{{ $barang?->DISKRIPSI }}</span>
                    </small>

                </div>


                {{-- ================= DATA BARU ================= --}}
                <div class="col-md-12 mt-3">

                    <h5 class="fw-bold mb-2">Data Baru</h5>

                    <h6 class="fw-bold text-primary mb-1">
                        Kode Barang Baru :
                        <span class="text-dark">{{ $barang?->KD_BRG }}</span>
                    </h6>

                    <small class="text-secondary d-block mb-2">
                        Diskripsi Barang Baru :
                        <span class="text-dark">{{ $barang?->NM_BRG }}</span>
                    </small>

                    {{-- ================= FAMILI ================= --}}
                    <h5 class="fw-bold mt-4 mb-2">Famili / Kelompok Besar</h5>


                    {{-- D1 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Kelompok Utama</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->D1 }} | {{ $k1->KET ?? '-' }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D2 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Sub Kelompok Utama</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->D2 }} | {{ $k2->KET ?? '-' }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D3 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->D3 }} | {{ $k3->KET ?? '-' }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D4 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Sub Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->D4 }} | {{ $k4->KET ?? '-' }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D5 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Turunan Sub Kategori</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang->D5 }} | {{ $k5->KET ?? '-' }}"
                                readonly>
                        </div>
                    </div>

                </div>


                {{-- ================= SPESIFIKASI BARANG ================= --}}
                <div class="col-md-12 mt-3">

                    <h5 class="fw-bold mb-2">Spesifikasi Barang</h5>


                    {{-- Nama --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">
                            <label class="fw-semibold mb-0">Nama Barang</label>
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang?->NAMA_BARU ?: $barang?->NAMA }}"
                                readonly>
                        </div>
                    </div>


                    {{-- Alias --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">
                            <label class="fw-semibold mb-0">Istilah Lapangan</label>
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $barang?->NM_ALIAS }}" readonly>
                        </div>
                    </div>


                    {{-- Diskripsi --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">
                            <label class="fw-semibold mb-0">Diskripsi</label>
                        </div>

                        <div class="col-md-9">
                            <textarea class="form-control" readonly>{{ $barang?->DISKRIPSI_BARU ?? $barang?->DISKRIPSI }}</textarea>
                        </div>
                    </div>

                    {{-- D6 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 6-7</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D6 }} | {{ $barang->K6 ?? ($k6->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D8 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 8-9</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D8 }} | {{ $barang->K8 ?? ($k8->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D10 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 10-11</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D10 }} | {{ $barang->K10 ?? ($k10->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D12 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 12-13</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D12 }} | {{ $barang->K12 ?? ($k12->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D14 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 14-15</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D14 }} | {{ $barang->K14 ?? ($k14->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D16 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 16-17</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D16 }} | {{ $barang->K16 ?? ($k16->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D18 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 18-19</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D18 }} | {{ $barang->K18 ?? ($k18->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D20 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 20-21</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D20 }} | {{ $barang->K20 ?? ($k20->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D22 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 22-23</div>
                        <div class="col-md-9">

                            <input type="text" class="form-control"
                                value="{{ $barang->D22 }} | {{ $barang->K22 ?? ($k22->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                    {{-- D24 --}}
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-3">Digit 24-25</div>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                value="{{ $barang->D24 }} | {{ $barang->K24 ?? ($k24->KET ?? '-') }}"
                                readonly>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
