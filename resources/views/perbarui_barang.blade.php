@extends('template')

@section('content')
    <div class="container-fluid">
    <h1 class="h3 mb-3"><strong>Perbarui Barang</strong></h1>

        <div class="card shadow-sm p-4">
            <form id="formMasterBarang">

                {{-- Kode dan Kategori --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Kode Barang</label>
                        <input type="text" class="form-control form-control-sm" name="kode_barang"
                            value="{{ $barang->DEFAULT_CO }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control form-control-sm" name="kategori"
                            value="{{ $barang->KATEGORI }}" readonly>
                    </div>
                </div>

                {{-- Nama Barang --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" class="form-control form-control-sm" name="nama_barang"
                        value="{{ $barang->NAMA }}" readonly>
                </div>

                <hr>

                <div class="mb-3 text-center">
                    <h5 class="fw-bold text-primary mb-0">
                        Kode Barang:
                        <span id="kodeBarangResult" class="text-dark">{{ $barang->KD_BRG ?? 000000000000 }}</span>
                        <input type="hidden" name="kode_barang_hasil" id="kode_barang_hasil">
                    </h5>

                    <small class="text-secondary">
                        Diskripsi Barang:
                        <span id="deskripsiBarangResult" class="text-dark"></span>
                        <input type="hidden" name="deskripsi_barang_hasil" id="deskripsi_barang_hasil">
                    </small>
                </div>

                {{-- Famili / Kelompok Besar --}}
                {{-- D1–D5 --}}
                <div class="mt-4">
                    <h5 class="fw-bold text-decoration-underline mb-3"><strong>Famili / Kelompok Besar</strong></h5>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <span class="text-danger fw-bold">D1</span> Kelompok Utama
                        </div>
                        <div class="col-md-8">
                            <select name="d1" id="d1" class="form-select form-select-sm select2" required>
                                <option value="">-- Pilih Kelompok Utama --</option>
                                @foreach ($ka_data as $ka)
                                    <option data-ka="{{ $ka->KA }}" value="{{ $ka->D1 }}" {{ $barang->D1 == $ka->KA ? 'selected' : '' }}>
                                        {{ $ka->KA }} | {{ $ka->KET }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <span class="text-danger fw-bold">D2</span> Sub Kelompok Utama
                        </div>
                        <div class="col-md-8">
                            <select name="d2" id="d2" class="form-select form-select-sm select2" required>
                                <option value="">-- Pilih Sub Kelompok Utama --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <span class="text-danger fw-bold">D3</span> Kategori
                        </div>
                        <div class="col-md-8">
                            <select name="d3" id="d3" class="form-select form-select-sm select2" required>
                                <option value="">-- Pilih Kategori --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <span class="text-danger fw-bold">D4</span> Sub Kategori
                        </div>
                        <div class="col-md-8">
                            <select name="d4" id="d4" class="form-select form-select-sm select2" required>
                                <option value="">-- Pilih Sub Kategori --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <span class="text-danger fw-bold">D5</span> Turunan Sub Kategori
                        </div>
                        <div class="col-md-8">
                            <select name="d5" id="d5" class="form-select form-select-sm select2" required>
                                <option value="">-- Pilih Turunan Sub Kategori --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">
                <h5 class="fw-bold mb-3"><strong>Spesifikasi Barang</strong></h5>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold mb-0">Nama Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm" name="nama_barang" id="nama_barang"
                            placeholder="Masukkan nama barang...">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold mb-0">Istilah Lapangan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm" name="istilah_lapangan"
                            id="istilah_lapangan" placeholder="Masukkan istilah lapangan...">
                    </div>
                </div>

                {{-- D6–D12 --}}
                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <span class="text-danger fw-bold">D6-7</span> Ukuran / Warna / Tipe / Seri
                    </div>
                    <div class="col-md-4">
                        <select class="form-select form-select-sm select2" name="d6" id="d6">
                            <option value="">-- Pilih atau ketik baru --</option>
                            @foreach ($d6_data as $item)
                                <option value="{{ $item->D6 }}">{{ $item->D6 }} | {{ $item->KET }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" name="d6_text" id="d6_text"
                            placeholder="Input baru...">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm btn-success w-100" id="simpanD6">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <span class="text-danger fw-bold">D8-9</span> Volume / Kapasitas / Daya
                    </div>
                    <div class="col-md-4">
                        <select class="form-select form-select-sm select2" name="d8" id="d8">
                            <option value="">-- Pilih atau ketik baru --</option>
                            @foreach ($d8_data as $item)
                                <option value="{{ $item->D8 }}">{{ $item->D8 }} | {{ $item->KET }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" name="d8_text" id="d8_text"
                            placeholder="Input baru...">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm btn-success w-100" id="simpanD8">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <span class="text-danger fw-bold">D10-11</span> Merk / Material
                    </div>
                    <div class="col-md-4">
                        <select class="form-select form-select-sm select2" name="d10" id="d10">
                            <option value="">-- Pilih atau ketik baru --</option>
                            @foreach ($d10_data as $item)
                                <option value="{{ $item->D10 }}">{{ $item->D10 }} | {{ $item->KET }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" name="d10_text" id="d10_text"
                            placeholder="Input baru...">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm btn-success w-100" id="simpanD10">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <span class="text-danger fw-bold">D12</span> Keterangan
                    </div>
                    <div class="col-md-4">
                        <select class="form-select form-select-sm select2" name="d12" id="d12">
                            <option value="">-- Pilih atau ketik baru --</option>
                            @foreach ($d12_data as $item)
                                <option value="{{ $item->D12 }}">{{ $item->D12 }} | {{ $item->KET }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" name="d12_text" id="d12_text"
                            placeholder="Input baru...">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm btn-success w-100" id="simpanD12">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    {{-- <button type="reset" class="btn btn-secondary px-4">
                        <i class="bi bi-arrow-counterclockwise"></i> Bersihkan
                    </button> --}}
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
$(document).ready(function() {

    // --- D1 → D2 ---
    $('#d1').change(function() {
        let ka = $(this).val();
        // Reset D2-D5 setiap D1 berubah
        $('#d2, #d3, #d4, #d5')
            .empty().append('<option value="">-- Pilih --</option>')
            .trigger('change.select2');
        if(ka) {
            $.ajax({
                url: '/api_dropdown_d2/' + ka,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let d2Select = $('#d2');
                    d2Select.empty().append('<option value="">-- Pilih Sub Kelompok Utama --</option>');
                    if(response && response.length > 0){
                        response.forEach(function(item){
                            // d2Select.append('<option value="'+item.D2+'">'+item.KB+' | '+item.KET+'</option>');
                            d2Select.append('<option value="'+item.D2+'" data-kb="'+item.KB+'">'+item.KB+' | '+item.KET+'</option>');
                        });
                    } else {
                        d2Select.append('<option value="">-- Tidak ada data --</option>');
                    }
                    d2Select.trigger('change.select2');
                },
                error: function() {
                    alert('Resource tidak ditemukan untuk D2.');
                }
            });
        } else {
            $('#d2, #d3, #d4, #d5')
                .empty().append('<option value="">-- Pilih --</option>')
                .trigger('change.select2');
        }
    });

    // --- D2 → D3 ---
    $('#d2').change(function() {
        let kb = $(this).val();
        // Reset D3-D5 setiap D2 berubah
        $('#d3, #d4, #d5')
            .empty().append('<option value="">-- Pilih --</option>')
            .trigger('change.select2');

        if(kb) {
            $.ajax({
                url: '/api_dropdown_d3/' + kb,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let d3Select = $('#d3');
                    d3Select.empty().append('<option value="">-- Pilih Kategori --</option>');
                    if(response && response.length > 0){
                        response.forEach(function(item){
                            // d3Select.append('<option value="'+item.D3+'">'+item.KC+' | '+item.KET+'</option>');
                            d3Select.append('<option value="'+item.D3+'" data-kc="'+item.KC+'">'+item.KC+' | '+item.KET+'</option>');
                        });
                    } else {
                        d3Select.append('<option value="">-- Tidak ada data --</option>');
                    }
                    d3Select.trigger('change.select2');
                },
                error: function() {
                    alert('Resource tidak ditemukan untuk D3.');
                }
            });
        }
    });

    // --- D3 → D4 ---
    $('#d3').change(function() {
        let kc = $(this).val();
        // Reset D4-D5 setiap D3 berubah
        $('#d4, #d5')
            .empty().append('<option value="">-- Pilih --</option>')
            .trigger('change.select2');

        if(kc) {
            $.ajax({
                url: '/api_dropdown_d4/' + kc,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let d4Select = $('#d4');
                    d4Select.empty().append('<option value="">-- Pilih Sub Kategori --</option>');
                    if(response && response.length > 0){
                        response.forEach(function(item){
                            // d4Select.append('<option value="'+item.D4+'">'+item.KD+' | '+item.KET+'</option>');
                            d4Select.append('<option value="'+item.D4+'" data-kd="'+item.KD+'">'+item.KD+' | '+item.KET+'</option>');
                        });
                    } else {
                        d4Select.append('<option value="">-- Tidak ada data --</option>');
                    }
                    d4Select.trigger('change.select2');
                },
                error: function() {
                    alert('Resource tidak ditemukan untuk D4.');
                }
            });
        }
    });

    // --- D4 → D5 ---
    $('#d4').change(function() {
        let kd = $(this).val();
        // Reset D5 setiap D4 berubah
        $('#d5')
            .empty().append('<option value="">-- Pilih Turunan Sub Kategori --</option>')
            .trigger('change.select2');

        if(kd) {
            $.ajax({
                url: '/api_dropdown_d5/' + kd,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let d5Select = $('#d5');
                    d5Select.empty().append('<option value="">-- Pilih Turunan Sub Kategori --</option>');
                    if(response && response.length > 0){
                        response.forEach(function(item){
                            // d5Select.append('<option value="'+item.D5+'">'+item.KE+' | '+item.KET+'</option>');
                            d5Select.append('<option value="'+item.D5+'" data-ke="'+item.KE+'">'+item.KE+' | '+item.KET+'</option>');
                        });
                    } else {
                        d5Select.append('<option value="">-- Tidak ada data --</option>');
                    }
                    d5Select.trigger('change.select2');
                },
                error: function() {
                    alert('Resource tidak ditemukan untuk D5.');
                }
            });
        }
    });

    // Trigger awal jika ada selected
    if($('#d1').val()) { $('#d1').trigger('change'); }
    if($('#d2').val()) { $('#d2').trigger('change'); }
    if($('#d3').val()) { $('#d3').trigger('change'); }
    if($('#d4').val()) { $('#d4').trigger('change'); }

    // --- Button Simpan D6 ---
    $('#simpanD6').click(function() {
        let d6Value = $('#d6_text').val();
        console.log('D6 Text:', d6Value);
    });

    // --- Button Simpan D8 ---
    $('#simpanD8').click(function() {
        let d8Value = $('#d8_text').val();
        console.log('D8 Text:', d8Value);
    });

    // --- Button Simpan D10 ---
    $('#simpanD10').click(function() {
        let d10Value = $('#d10_text').val();
        console.log('D10 Text:', d10Value);
    });

    // --- Button Simpan D12 ---
    $('#simpanD12').click(function() {
        let d12Value = $('#d12_text').val();
        console.log('D12 Text:', d12Value);
    });

    function generateKodeBarang() {
        let d1 = $('#d1 option:selected').data('ka')?.toString() || '0';
        let d2 = $('#d2 option:selected').data('kb')?.toString() || '0';
        let d3 = $('#d3 option:selected').data('kc')?.toString() || '0';
        let d4 = $('#d4 option:selected').data('kd')?.toString() || '0';
        let d5 = $('#d5 option:selected').data('ke')?.toString() || '0';
        let d6 = $('#d6').val() || '00';
        let d8 = $('#d8').val() || '00';
        let d10 = $('#d10').val() || '00';
        let d12 = $('#d12').val() || '0';

        // gabungkan sesuai urutan digit
        let kode = (d1 + d2 + d3 + d4 + d5).padEnd(5,'0') +
                   (d6).padEnd(2,'0') +
                   (d8).padEnd(2,'0') +
                   (d10).padEnd(2,'0') +
                   (d12).padEnd(1,'0');

        $('#kodeBarangResult').text(kode);
        $('#kode_barang_hasil').val(kode);

        console.log('Kode Barang Terbaru:', d1);
    }

    // --- Dropdown D1 → D5 ---
    $('#d1, #d2, #d3, #d4, #d5, #d6, #d8, #d10, #d12').change(function() {
        generateKodeBarang();
    });

    // Trigger awal jika ada selected value
    if($('#d1').val()) { $('#d1').trigger('change'); }
    if($('#d2').val()) { $('#d2').trigger('change'); }
    if($('#d3').val()) { $('#d3').trigger('change'); }
    if($('#d4').val()) { $('#d4').trigger('change'); }
    if($('#d5').val()) { $('#d5').trigger('change'); }
    if($('#d6').val()) { $('#d6').trigger('change'); }
    if($('#d8').val()) { $('#d8').trigger('change'); }
    if($('#d10').val()) { $('#d10').trigger('change'); }
    if($('#d12').val()) { $('#d12').trigger('change'); }

});
</script>
@endsection



