@extends('template')

@section('tambah_barang')
    {{ 'active' }}
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-1"><strong>Tambah Data Barang</strong></h1>
        <div class="card shadow-sm p-4">
            <form id="formMasterBarang" action="{{ route('tambah_barang.process') }}" method="POST">
                @csrf

                <div class="row">

                    <!-- DATA BARU -->
                    <div class="col-md-12">
                        <h5 class="fw-bold mb-2">Data Baru</h5>

                        <h6 class="fw-bold text-primary mb-1">
                            Kode Barang Baru:
                            <span id="kodeBarangResult" class="text-dark">000000000000</span>
                            <input type="hidden" name="KD_BRG" id="kode_barang_hasil" value="{{ '00000' }}">
                        </h6>

                        <small class="text-secondary d-block mb-2">
                            Diskripsi Barang Baru:
                            <span id="deskripsiBarangResult" class="text-dark"></span>
                            <input type="hidden" name="NM_BRG" id="deskripsi_barang_hasil_baru" value="">
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
                                        <option value="{{ $ka->KA }}" data-ka="{{ $ka->KA }}">
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

                        <!-- D6 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 6-7</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D6" id="d6">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d6_value" name="K6" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d6_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD6">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D8 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 8-9</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D8" id="d8">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d8_value" name="K8" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d8_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD8">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D10 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 10-11</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D10" id="d10">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d10_value" name="K10" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d10_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD10">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D12 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 12-13</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D12" id="d12">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d12_value" name="K12" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d12_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD12">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D14 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 14-15</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D14" id="d14">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d14_value" name="K14" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d14_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD14">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D16 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 16-17</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D16" id="d16">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d16_value" name="K16" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d16_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD16">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D18 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 18-19</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D18" id="d18">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d18_value" name="K18" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d18_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD18">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D20 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 20-21</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D20" id="d20">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d20_value" name="K20" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d20_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD20">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D22 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 22-23</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D22" id="d22">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d22_value" name="K22" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d22_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD22">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D24 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Digit 24-25</div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm select2" name="D24" id="d24">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d24_value" name="K24" placeholder="Nilai......">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d24_text" placeholder="Masukkan keterangan...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD24">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

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
