{{-- // --- Button Simpan D6 ---
$('#simpanD6').click(function () {
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
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d6',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d5: d5,
            keterangan: keterangan,
        },
        success: function (response) {
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
        error: function (xhr) {
            console.error('❌ Gagal simpan D6:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D6.');
        }
    });
});

// --- Button Simpan D8 ---
$('#simpanD8').click(function () {
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
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d8',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d5: d5,
            keterangan: keterangan,
        },
        success: function (response) {
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
        error: function (xhr) {
            console.error('❌ Gagal simpan D8:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D8.');
        }
    });
});

// --- Button Simpan D10 ---
$('#simpanD10').click(function () {
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
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d10',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d5: d5,
            keterangan: keterangan,
        },
        success: function (response) {
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
        error: function (xhr) {
            console.error('❌ Gagal simpan D10:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D10.');
        }
    });
});

// --- Button Simpan D12 ---
$('#simpanD12').click(function () {
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
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d12',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d5: d5,
            keterangan: keterangan,
        },
        success: function (response) {
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
        error: function (xhr) {
            console.error('❌ Gagal simpan D12:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D12.');
        }
    });
}); --}}

// Ini function tambahan baru !!!!
// --- Button Simpan D2 ---
$('#simpanD2').click(function () {
    let keterangan = $('#d2_text').val(); // ambil teks input D2
    let kodeHasil = $('#kode_barang_hasil').val() || '';
    let d1 = kodeHasil.substring(0, 1); // ambil 1 digit pertama sebagai D1

    console.log('📦 Data yang akan dikirim ke API:');
    console.log('➡️ D1:', d1);
    console.log('➡️ Keterangan:', keterangan);

    if (!d1 || d1 === '00000') {
        alert('D1–D1 belum lengkap, tidak bisa menyimpan data D2!');
        return;
    }

    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d2',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d1: d1,
            keterangan: keterangan,
        },
        success: function (response) {
            console.log('✅ Berhasil simpan D2:', response);
            alert('Data D2 berhasil disimpan! Kode berikutnya: ' + response.nextD2);

            // Optional: langsung tambah ke dropdown D2
            $('#d2').append(
                $('<option>', {
                    value: response.nextD2,
                    text: response.nextD2 + ' | ' + keterangan,
                    'data-text': keterangan,
                })
            ).trigger('change.select2');
        },
        error: function (xhr) {
            console.error('❌ Gagal simpan D2:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D2.');
        }
    });
});

// --- Button Simpan D3 ---
$('#simpanD3').click(function () {
    let keterangan = $('#d3_text').val(); // ambil teks input D3
    let kodeHasil = $('#kode_barang_hasil').val() || '';
    let d2 = kodeHasil.substring(0, 2); // ambil 1 digit pertama sebagai D2

    console.log('📦 Data yang akan dikirim ke API:');
    console.log('➡️ D2:', d2);
    console.log('➡️ Keterangan:', keterangan);

    if (!d2 || d2 === '00000') {
        alert('D2–D2 belum lengkap, tidak bisa menyimpan data D3!');
        return;
    }

    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d3',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d2: d2,
            keterangan: keterangan,
        },
        success: function (response) {
            console.log('✅ Berhasil simpan D3:', response);
            alert('Data D3 berhasil disimpan! Kode berikutnya: ' + response.nextD3);

            // Optional: langsung tambah ke dropdown D3
            $('#d3').append(
                $('<option>', {
                    value: response.nextD3,
                    text: response.nextD3 + ' | ' + keterangan,
                    'data-text': keterangan,
                })
            ).trigger('change.select2');
        },
        error: function (xhr) {
            console.error('❌ Gagal simpan D3:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D3.');
        }
    });
});

// --- Button Simpan D4 ---
$('#simpanD4').click(function () {
    let keterangan = $('#d4_text').val(); // ambil teks input D4
    let kodeHasil = $('#kode_barang_hasil').val() || '';
    let d3 = kodeHasil.substring(0, 3); // ambil 1 digit pertama sebagai D3

    console.log('📦 Data yang akan dikirim ke API:');
    console.log('➡️ D3:', d3);
    console.log('➡️ Keterangan:', keterangan);

    if (!d3 || d3 === '00000') {
        alert('D3–D3 belum lengkap, tidak bisa menyimpan data D4!');
        return;
    }

    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d4',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d3: d3,
            keterangan: keterangan,
        },
        success: function (response) {
            console.log('✅ Berhasil simpan D4:', response);
            alert('Data D4 berhasil disimpan! Kode berikutnya: ' + response.nextD4);

            // Optional: langsung tambah ke dropdown D4
            $('#d4').append(
                $('<option>', {
                    value: response.nextD4,
                    text: response.nextD4 + ' | ' + keterangan,
                    'data-text': keterangan,
                })
            ).trigger('change.select2');
        },
        error: function (xhr) {
            console.error('❌ Gagal simpan D4:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D4.');
        }
    });
});

// --- Button Simpan D5 ---
$('#simpanD5').click(function () {
    let keterangan = $('#d5_text').val(); // ambil teks input D5
    let kodeHasil = $('#kode_barang_hasil').val() || '';
    let d4 = kodeHasil.substring(0, 4); // ambil 1 digit pertama sebagai D4

    console.log('📦 Data yang akan dikirim ke API:');
    console.log('➡️ D4:', d4);
    console.log('➡️ Keterangan:', keterangan);

    if (!d4 || d4 === '00000') {
        alert('D4–D4 belum lengkap, tidak bisa menyimpan data D5!');
        return;
    }

    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_simpan_spesifikasi/d5',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr(
                'content'), // ← tambahkan CSRF di sini
            d4: d4,
            keterangan: keterangan,
        },
        success: function (response) {
            console.log('✅ Berhasil simpan D5:', response);
            alert('Data D5 berhasil disimpan! Kode berikutnya: ' + response.nextD5);

            // Optional: langsung tambah ke dropdown D5
            $('#d5').append(
                $('<option>', {
                    value: response.nextD5,
                    text: response.nextD5 + ' | ' + keterangan,
                    'data-text': keterangan,
                })
            ).trigger('change.select2');
        },
        error: function (xhr) {
            console.error('❌ Gagal simpan D5:', xhr.responseText);
            alert('Terjadi kesalahan saat menyimpan data D5.');
        }
    });
});
