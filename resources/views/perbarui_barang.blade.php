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
                                        <option value="{{ $ka->D1 }}" data-ka="{{ $ka->KA }}"
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
                            <div class="col-md-9">
                                <select name="D2" id="d2" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Sub Kelompok Utama --</option>
                                    @foreach ($kb_data as $kb)
                                        <option value="{{ $kb->D2 }}" data-kb="{{ $kb->KB }}"
                                            {{ ($barang->D2 == $kb->KB && $barang->K2 == $kb->KET) ? 'selected' : '' }}>
                                            {{ $kb->KB }} | {{ $kb->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- D3 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Kategori</div>
                            <div class="col-md-9">
                                <select name="D3" id="d3" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kc_data as $kc)
                                        <option value="{{ $kc->D3 }}" data-kc="{{ $kc->KC }}"
                                            {{ ($barang->D3 == $kc->KC && $barang->K3 == $kc->KET) ? 'selected' : '' }}>
                                            {{ $kc->KC }} | {{ $kc->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- D4 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Sub Kategori</div>
                            <div class="col-md-9">
                                <select name="D4" id="d4" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Sub Kategori --</option>
                                    @foreach ($kd_data as $kd)
                                        <option value="{{ $kd->D4 }}" data-kd="{{ $kd->KD }}"
                                            {{ ($barang->D4 == $kd->KD && $barang->K4 == $kd->KET) ? 'selected' : '' }}>
                                            {{ $kd->KD }} | {{ $kd->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- D5 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Turunan Sub Kategori</div>
                            <div class="col-md-9">
                                <select name="D5" id="d5" class="form-select form-select-sm select2">
                                    <option value="">-- Pilih Turunan Sub Kategori --</option>
                                    @foreach ($ke_data as $ke)
                                        <option value="{{ $ke->D5 }}" data-ke="{{ $ke->KE }}"
                                            {{ ($barang->D5 == $ke->KE && $barang->K5 == $ke->KET) ? 'selected' : '' }}>
                                            {{ $ke->KE }} | {{ $ke->KET }}
                                        </option>
                                    @endforeach
                                </select>
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
                                <textarea class="form-control" name="DISKRIPSI_BARU">{{ $barang->DISKRIPSI_BARU ?? $barang->DISKRIPSI }}</textarea>
                            </div>
                        </div>

                        <!-- D6 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Ukuran / Warna / Tipe / Seri</div>
                            <div class="col-md-5">
                                <select class="form-select form-select-sm select2" name="D6" id="d6">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                    @foreach ($d6_data as $d6)
                                        <option value="{{ $d6->D6 }}" data-text="{{ $d6->KET }}"
                                            {{ ($barang->D6 == $d6->D6 && $barang->K6 == $d6->KET) ? 'selected' : '' }}>
                                            {{ $d6->D6 }} | {{ $d6->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d6_text"
                                    placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD6">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D8 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Volume / Kapasitas / Daya</div>
                            <div class="col-md-5">
                                <select class="form-select form-select-sm select2" name="D8" id="d8">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                    @foreach ($d8_data as $d8)
                                        <option value="{{ $d8->D8 }}" data-text="{{ $d8->KET }}"
                                            {{ ($barang->D8 == $d8->D8 && $barang->K8 == $d8->KET) ? 'selected' : '' }}>
                                            {{ $d8->D8 }} | {{ $d8->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d8_text"
                                    placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD8">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D10 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Merk / Material</div>
                            <div class="col-md-5">
                                <select class="form-select form-select-sm select2" name="D10" id="d10">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                    @foreach ($d10_data as $d10)
                                        <option value="{{ $d10->D10 }}" data-text="{{ $d10->KET }}"
                                            {{ ($barang->D10 == $d10->D10 && $barang->K10 == $d10->KET) ? 'selected' : '' }}>
                                            {{ $d10->D10 }} | {{ $d10->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d10_text"
                                    placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD10">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- D12 -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-3">Keterangan</div>
                            <div class="col-md-5">
                                <select class="form-select form-select-sm select2" name="D12" id="d12">
                                    <option value="">-- Pilih atau ketik baru --</option>
                                    @foreach ($d12_data as $d12)
                                        <option value="{{ $d12->D12 }}" data-text="{{ $d12->KET }}"
                                            {{ ($barang->D12 == $d12->D12 && $barang->K12 == $d12->KET) ? 'selected' : '' }}>
                                            {{ $d12->D12 }} | {{ $d12->KET }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="d12_text"
                                    placeholder="Input baru...">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm w-100" id="simpanD12">
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

            // --- Button Simpan D6 ---
            $('#simpanD6').click(function() {
                let keterangan = $('#d6_text').val(); // ambil teks input D6
                let kodeHasil = $('#kode_barang_hasil').val() || '';
                let d5 = kodeHasil.substring(0, 5); // ambil 5 digit pertama sebagai D5

                console.log('📦 Data yang akan dikirim ke API:');
                console.log('➡️ D5:', d5);
                console.log('➡️ Keterangan:', keterangan);

                if (!d5 || d5 === '00000') {
                    alert('D1–D5 belum lengkap, tidak bisa menyimpan data D6!');
                    return;
                }

                if (!keterangan) {
                    alert('Keterangan tidak boleh kosong!');
                    return;
                }

                $.ajax({
                    url: '/api_simpan_spesifikasi/d6',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                        'content'), // ← tambahkan CSRF di sini
                        d5: d5,
                        keterangan: keterangan,
                    },
                    success: function(response) {
                        console.log('✅ Berhasil simpan D6:', response);
                        alert('Data D6 berhasil disimpan! Kode berikutnya: ' + response.nextD6);

                        // Optional: langsung tambah ke dropdown D6
                        $('#d6').append(
                            $('<option>', {
                                value: response.nextD6,
                                text: response.nextD6 + ' | ' + keterangan,
                                'data-text': keterangan,
                            })
                        ).trigger('change.select2');
                    },
                    error: function(xhr) {
                        console.error('❌ Gagal simpan D6:', xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data D6.');
                    }
                });
            });

            // --- Button Simpan D8 ---
            $('#simpanD8').click(function() {
                let keterangan = $('#d8_text').val(); // ambil teks input D8
                let kodeHasil = $('#kode_barang_hasil').val() || '';
                let d5 = kodeHasil.substring(0, 5); // ambil 5 digit pertama sebagai D5

                console.log('📦 Data yang akan dikirim ke API:');
                console.log('➡️ D5:', d5);
                console.log('➡️ Keterangan:', keterangan);

                if (!d5 || d5 === '00000') {
                    alert('D1–D5 belum lengkap, tidak bisa menyimpan data D8!');
                    return;
                }

                if (!keterangan) {
                    alert('Keterangan tidak boleh kosong!');
                    return;
                }

                $.ajax({
                    url: '/api_simpan_spesifikasi/d8',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                        'content'), // ← tambahkan CSRF di sini
                        d5: d5,
                        keterangan: keterangan,
                    },
                    success: function(response) {
                        console.log('✅ Berhasil simpan D8:', response);
                        alert('Data D8 berhasil disimpan! Kode berikutnya: ' + response.nextD8);

                        // Optional: langsung tambah ke dropdown D8
                        $('#d8').append(
                            $('<option>', {
                                value: response.nextD8,
                                text: response.nextD8 + ' | ' + keterangan,
                                'data-text': keterangan,
                            })
                        ).trigger('change.select2');
                    },
                    error: function(xhr) {
                        console.error('❌ Gagal simpan D8:', xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data D8.');
                    }
                });
            });

            // --- Button Simpan D10 ---
            $('#simpanD10').click(function() {
                let keterangan = $('#d10_text').val(); // ambil teks input D10
                let kodeHasil = $('#kode_barang_hasil').val() || '';
                let d5 = kodeHasil.substring(0, 5); // ambil 5 digit pertama sebagai D5

                console.log('📦 Data yang akan dikirim ke API:');
                console.log('➡️ D5:', d5);
                console.log('➡️ Keterangan:', keterangan);

                if (!d5 || d5 === '00000') {
                    alert('D1–D5 belum lengkap, tidak bisa menyimpan data D10!');
                    return;
                }

                if (!keterangan) {
                    alert('Keterangan tidak boleh kosong!');
                    return;
                }

                $.ajax({
                    url: '/api_simpan_spesifikasi/d10',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                        'content'), // ← tambahkan CSRF di sini
                        d5: d5,
                        keterangan: keterangan,
                    },
                    success: function(response) {
                        console.log('✅ Berhasil simpan D10:', response);
                        alert('Data D10 berhasil disimpan! Kode berikutnya: ' + response
                            .nextD10);

                        // Optional: langsung tambah ke dropdown D10
                        $('#d10').append(
                            $('<option>', {
                                value: response.nextD10,
                                text: response.nextD10 + ' | ' + keterangan,
                                'data-text': keterangan,
                            })
                        ).trigger('change.select2');
                    },
                    error: function(xhr) {
                        console.error('❌ Gagal simpan D10:', xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data D10.');
                    }
                });
            });

            // --- Button Simpan D12 ---
            $('#simpanD12').click(function() {
                let keterangan = $('#d12_text').val(); // ambil teks input D12
                let kodeHasil = $('#kode_barang_hasil').val() || '';
                let d5 = kodeHasil.substring(0, 5); // ambil 5 digit pertama sebagai D5

                console.log('📦 Data yang akan dikirim ke API:');
                console.log('➡️ D5:', d5);
                console.log('➡️ Keterangan:', keterangan);

                if (!d5 || d5 === '00000') {
                    alert('D1–D5 belum lengkap, tidak bisa menyimpan data D12!');
                    return;
                }

                if (!keterangan) {
                    alert('Keterangan tidak boleh kosong!');
                    return;
                }

                $.ajax({
                    url: '/api_simpan_spesifikasi/d12',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                        'content'), // ← tambahkan CSRF di sini
                        d5: d5,
                        keterangan: keterangan,
                    },
                    success: function(response) {
                        console.log('✅ Berhasil simpan D12:', response);
                        alert('Data D12 berhasil disimpan! Kode berikutnya: ' + response
                            .nextD12);

                        // Optional: langsung tambah ke dropdown D12
                        $('#d12').append(
                            $('<option>', {
                                value: response.nextD12,
                                text: response.nextD12 + ' | ' + keterangan,
                                'data-text': keterangan,
                            })
                        ).trigger('change.select2');
                    },
                    error: function(xhr) {
                        console.error('❌ Gagal simpan D12:', xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data D12.');
                    }
                });
            });

            // --- Tombol Reset ---
            $('#reset').click(function(e) {
                console.log('reset');

                e.preventDefault(); // cegah reset default form agar kita kontrol manual

                // 1. Kosongkan semua input yang tidak readonly
                $('input:not([readonly])').val('');

                // 2. Kosongkan semua textarea yang tidak readonly
                $('textarea:not([readonly])').val('');

                // 3. Reset semua select yang tidak disabled
                $('select:not([readonly]):not([disabled])').val('').trigger('change');

                // 4. Kalau pakai Select2, reset juga
                $('select').each(function() {
                    if ($(this).hasClass('select2-hidden-accessible')) {
                        $(this).val(null).trigger('change');
                    }
                });

                // 5. Kosongkan output tampilan
                $('#kodeBarangResult').text('');
                $('#deskripsiBarangResult').text('');

                // 6. Kosongkan hidden input hasil (kalau ada)
                $('#kode_barang_hasil').val('');
                $('#deskripsi_barang_hasil_baru').val('');

                generateKodeBarang();

                console.log('🔄 Semua input & select berhasil di-reset.');
            });

            // --- Generate Kode Barang ---
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

                // gabungkan kode barang
                let kode = (d1 + d2 + d3 + d4 + d5).padEnd(5, '0') +
                    (d6).padEnd(2, '0') +
                    (d8).padEnd(2, '0') +
                    (d10).padEnd(2, '0') +
                    (d12).padEnd(1, '0');

                $('#kodeBarangResult').text(kode);
                $('#kode_barang_hasil').val(kode);

                console.log('Kode Barang Terbaru:', kode);

                // -------------------------------
                // Ambil nama baru dari input
                // -------------------------------
                let nama_baru = $('#NAMA_BARU').val() || '';

                // -------------------------------
                // Ambil data-text dari dropdown
                // -------------------------------
                let d6_text = $('#d6 option:selected').data('text') || '';
                let d8_text = $('#d8 option:selected').data('text') || '';
                let d10_text = $('#d10 option:selected').data('text') || '';

                // -------------------------------
                // Gabungkan menjadi deskripsi baru
                // -------------------------------
                let deskripsi_baru = [nama_baru, d6_text, d8_text, d10_text]
                    .filter(v => v !== '') // hilangkan yang kosong
                    .join(' '); // separator

                console.log('Deskripsi Baru:', deskripsi_baru);

                // -------------------------------
                // Tampilkan ke UI + hidden input
                // -------------------------------
                $('#deskripsiBarangResult').text(deskripsi_baru);
                $('#deskripsi_barang_hasil_baru').val(deskripsi_baru);
            }

            // --- D1 → D2 ---
            $('#d1').change(function() {
                let ka = $(this).val();
                // Reset D2-D5 setiap D1 berubah
                $('#d2, #d3, #d4, #d5')
                    .empty().append('<option value="">-- Pilih --</option>')
                    .trigger('change.select2');
                if (ka) {
                    $.ajax({
                        url: '/api_dropdown_d2/' + ka,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let d2Select = $('#d2');
                            d2Select.empty().append(
                                '<option value="">-- Pilih Sub Kelompok Utama --</option>');
                            if (response && response.length > 0) {
                                response.forEach(function(item) {
                                    // d2Select.append('<option value="'+item.D2+'">'+item.KB+' | '+item.KET+'</option>');
                                    d2Select.append('<option value="' + item.D2 +
                                        '" data-kb="' + item.KB + '">' + item.KB +
                                        ' | ' + item.KET + '</option>');
                                });
                            } else {
                                d2Select.append(
                                    '<option value="">-- Tidak ada data --</option>');
                            }
                            d2Select.trigger('change.select2');
                        },
                        error: function() {
                            // alert('Resource tidak ditemukan untuk D2.');
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

                if (kb) {
                    $.ajax({
                        url: '/api_dropdown_d3/' + kb,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let d3Select = $('#d3');
                            d3Select.empty().append(
                                '<option value="">-- Pilih Kategori --</option>');
                            if (response && response.length > 0) {
                                response.forEach(function(item) {
                                    // d3Select.append('<option value="'+item.D3+'">'+item.KC+' | '+item.KET+'</option>');
                                    d3Select.append('<option value="' + item.D3 +
                                        '" data-kc="' + item.KC + '">' + item.KC +
                                        ' | ' + item.KET + '</option>');
                                });
                            } else {
                                d3Select.append(
                                    '<option value="">-- Tidak ada data --</option>');
                            }
                            d3Select.trigger('change.select2');
                        },
                        error: function() {
                            // alert('Resource tidak ditemukan untuk D3.');
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

                if (kc) {
                    $.ajax({
                        url: '/api_dropdown_d4/' + kc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let d4Select = $('#d4');
                            d4Select.empty().append(
                                '<option value="">-- Pilih Sub Kategori --</option>');
                            if (response && response.length > 0) {
                                response.forEach(function(item) {
                                    // d4Select.append('<option value="'+item.D4+'">'+item.KD+' | '+item.KET+'</option>');
                                    d4Select.append('<option value="' + item.D4 +
                                        '" data-kd="' + item.KD + '">' + item.KD +
                                        ' | ' + item.KET + '</option>');
                                });
                            } else {
                                d4Select.append(
                                    '<option value="">-- Tidak ada data --</option>');
                            }
                            d4Select.trigger('change.select2');
                        },
                        error: function() {
                            // alert('Resource tidak ditemukan untuk D4.');
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

                if (kd) {
                    $.ajax({
                        url: '/api_dropdown_d5/' + kd,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            let d5Select = $('#d5');
                            d5Select.empty().append(
                                '<option value="">-- Pilih Turunan Sub Kategori --</option>'
                            );
                            if (response && response.length > 0) {
                                response.forEach(function(item) {
                                    // d5Select.append('<option value="'+item.D5+'">'+item.KE+' | '+item.KET+'</option>');
                                    d5Select.append('<option value="' + item.D5 +
                                        '" data-ke="' + item.KE + '">' + item.KE +
                                        ' | ' + item.KET + '</option>');
                                });
                            } else {
                                d5Select.append(
                                    '<option value="">-- Tidak ada data --</option>');
                            }
                            d5Select.trigger('change.select2');
                        },
                        error: function() {
                            // alert('Resource tidak ditemukan untuk D5.');
                        }
                    });
                }
            });

            // --- Dropdown D1 → D12 ---
            $('#d1, #d2, #d3, #d4, #d5, #d6, #d8, #d10, #d12').change(function() {
                generateKodeBarang();
            });

            // Trigger awal jika ada selected value
            // if ($('#d1').val()) {
            //     $('#d1').trigger('change');
            // }
            // if ($('#d2').val()) {
            //     $('#d2').trigger('change');
            // }
            // if ($('#d3').val()) {
            //     $('#d3').trigger('change');
            // }
            // if ($('#d4').val()) {
            //     $('#d4').trigger('change');
            // }
            // if ($('#d5').val()) {
            //     $('#d5').trigger('change');
            // }
            // if ($('#d6').val()) {
            //     $('#d6').trigger('change');
            // }
            // if ($('#d8').val()) {
            //     $('#d8').trigger('change');
            // }
            // if ($('#d10').val()) {
            //     $('#d10').trigger('change');
            // }
            // if ($('#d12').val()) {
            //     $('#d12').trigger('change');
            // }


            let kodeHasil = $('#kode_barang_hasil').val() || '';
            let lastKodePrefix = kodeHasil.substring(0, 5);
            console.log(lastKodePrefix);

            setInterval(function() {
                let kodeHasil = $('#kode_barang_hasil').val() || '';
                let d1sampaid5 = kodeHasil.substring(0, 5);

                if (!d1sampaid5 || d1sampaid5 === '00000') {
                    console.warn('⚠️ D1–D5 belum lengkap, lewati refresh kali ini.');
                    return;
                }

                // ✅ Hanya fetch kalau beda dari sebelumnya
                if (d1sampaid5 === lastKodePrefix) return;
                lastKodePrefix = d1sampaid5;

                console.log('🔄 Fetch baru karena D1–D5 berubah:', d1sampaid5);

                $.ajax({
                    url: '/api_dropdown_d6/' + d1sampaid5,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (!response) return;

                        updateSelect($('#d6'), response.d6, '-- Tidak ada data D6 --');
                        updateSelect($('#d8'), response.d8, '-- Tidak ada data D8 --');
                        updateSelect($('#d10'), response.d10, '-- Tidak ada data D10 --');
                        console.log('✅ D6, D8, D10 diperbarui.');
                    },
                    error: function(xhr) {
                        console.error('❌ Gagal ambil data:', xhr.responseText);
                    },
                });
            }, 2000); // cek setiap 2 detik, tapi fetch hanya jika berubah

            function updateSelect($el, data, emptyText) {
                let selectedValue = $el.val(); // simpan pilihan user sebelumnya
                $el.empty();
                if (data && data.length > 0) {
                    $.each(data, function(i, item) {
                        $el.append(
                            $('<option>', {
                                value: item.D6 ?? item.D8 ?? item.D10 ??
                                '', // ambil nilai yang tersedia
                                text: (item.D6 ?? item.D8 ?? item.D10 ?? '') + ' | ' + (item.KET ??
                                    ''), // hindari undefined
                                'data-text': item.KET ?? '',
                            })
                        );
                    });
                } else {
                    $el.append('<option value="">' + emptyText + '</option>');
                }
                $el.val(selectedValue); // kembalikan pilihan user jika masih ada
                $el.trigger('change.select2');
            }
        });
    </script>
@endsection
