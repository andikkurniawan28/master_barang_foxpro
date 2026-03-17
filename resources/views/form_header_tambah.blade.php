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
