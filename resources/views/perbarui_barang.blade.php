@extends('template')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-1"><strong>Perbarui Data Barang</strong></h1>
        <div class="card shadow-sm p-4">
            <form id="formMasterBarang" action="{{ route('perbarui_barang.process', $id) }}" method="POST">
                @csrf
                <input type="hidden" name="ID" value="{{ $id }}">

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
                            <span id="kodeBarangResult" class="text-dark">{{ $barang->KD_BRG }}</span>
                            <input type="hidden" name="KD_BRG" id="kode_barang_hasil" value="{{ $barang->KD_BRG ?? "00000" }}">
                        </h6>

                        <small class="text-secondary d-block mb-2">
                            Diskripsi Barang Baru:
                            <span id="deskripsiBarangResult" class="text-dark">{{ $barang->NM_BRG }}</span>
                            <input type="hidden" name="NM_BRG" id="deskripsi_barang_hasil_baru" value="{{ $barang->NM_BRG }}">
                        </small>

                        <!-- Famili -->
                        <h5 class="fw-bold mt-4 mb-2">Famili / Kelompok Besar</h5>

                        <!-- D1 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Kelompok Utama</div>
                            <div class="col-md-9">
                                <select name="D1" id="d1" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Kelompok Utama --</option>
                                    @foreach ($ka_data as $ka)
                                        <option value="{{ $ka->KA }}" data-ka="{{ $ka->KA }}" data-keterangan="{{ $ka->KET }}"
                                            {{ $barang->D1 == $ka->KA ? 'selected' : '' }}>
                                            {{ $ka->KA }} | {{ $ka->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- D2 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Sub Kelompok Utama</div>
                            <div class="col-md-5">
                                <select name="D2" id="d2" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Sub Kelompok Utama --</option>
                                    @foreach ($kb_data as $kb)
                                        <option value="{{ $kb->KB }}" data-kb="{{ $kb->KB }}" data-keterangan="{{ $kb->KET }}"
                                            {{ ($barang->D2 == $kb->KB && $barang->D1 == $kb->D2) ? 'selected' : '' }}>
                                            {{ $kb->KB }} | {{ $kb->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d2_text" placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD2">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D3 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Kategori</div>
                            <div class="col-md-5">
                                <select name="D3" id="d3" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kc_data as $kc)
                                        <option value="{{ $kc->KC }}" data-kc="{{ $kc->KC }}" data-keterangan="{{ $kc->KET }}"
                                            {{ (($barang->D3 == $kc->KC) && ($d1sampaid2 == $kc->D3)) ? 'selected' : '' }}>
                                            {{ $kc->KC }} | {{ $kc->KET }} | {{ $kc->D3 }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d3_text" placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD3">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D4 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Sub Kategori</div>
                            <div class="col-md-5">
                                <select name="D4" id="d4" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Sub Kategori --</option>
                                    @foreach ($kd_data as $kd)
                                        <option value="{{ $kd->KD }}" data-kd="{{ $kd->KD }}" data-keterangan="{{ $kd->KET }}"
                                            {{ (($barang->D4 == $kd->KD) && ($d1sampaid3 == $kd->D4)) ? 'selected' : '' }}>
                                            {{ $kd->KD }} | {{ $kd->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d4_text" placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD4">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D5 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Turunan Sub Kategori</div>
                            <div class="col-md-5">
                                <select name="D5" id="d5" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Turunan Sub Kategori --</option>
                                    @foreach ($ke_data as $ke)
                                        <option value="{{ $ke->KE }}" data-ke="{{ $ke->KE }}" data-keterangan="{{ $ke->KET }}"
                                            {{ (($barang->D5 == $ke->KE) && ($d1sampaid4 == $ke->D5)) ? 'selected' : '' }}>
                                            {{ $ke->KE }} | {{ $ke->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d5_text" placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD5">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- SPESIFIKASI BARANG -->
                    <div class="col-md-12 mt-3">
                        <h5 class="fw-bold mb-2">Spesifikasi Barang</h5>

                        <!-- Nama -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Nama Barang</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="NAMA_BARU" id="NAMA_BARU"
                                    value="{{ empty(trim($barang->NAMA_BARU)) ? $barang->NAMA : $barang->NAMA_BARU }}" placeholder="Masukkan nama barang...">
                            </div>
                        </div>

                        <!-- Alias -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Istilah Lapangan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="NM_ALIAS" id="NM_ALIAS"
                                    placeholder="Masukkan istilah lapangan..." value="{{ $barang->NM_ALIAS }}">
                            </div>
                        </div>

                        <!-- Diskripsi -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">
                                <label class="fw-semibold mb-0">Diskripsi</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" id="DISKRIPSI_BARU" name="DISKRIPSI_BARU">{{ $barang->DISKRIPSI_BARU ?? $barang->DISKRIPSI }}</textarea>
                            </div>
                        </div>

                        @include('form_spesifikasi_edit')

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
