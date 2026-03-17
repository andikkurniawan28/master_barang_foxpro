// --- Generate Kode Barang ---
function generateKodeBarang() {
    // Ambil nilai kode dari dropdown (untuk digit)
    let d1 = $('#d1 option:selected').data('ka')?.toString() || '0';
    let d2 = $('#d2 option:selected').data('kb')?.toString() || '0';
    let d3 = $('#d3 option:selected').data('kc')?.toString() || '0';
    let d4 = $('#d4 option:selected').data('kd')?.toString() || '0';
    let d5 = $('#d5 option:selected').data('ke')?.toString() || '0';

    // Ambil nilai dari input D6-D24 (kode digit)
    let d6 = $('#d6_value').val() || '00';
    let d8 = $('#d8_value').val() || '00';
    let d10 = $('#d10_value').val() || '00';
    let d12 = $('#d12_value').val() || '00';
    let d14 = $('#d14_value').val() || '00';
    let d16 = $('#d16_value').val() || '00';
    let d18 = $('#d18_value').val() || '00';
    let d20 = $('#d20_value').val() || '00';
    let d22 = $('#d22_value').val() || '00';
    let d24 = $('#d24_value').val() || '00';

    // Ambil keterangan dari D2-D5 (untuk nama barang)
    let d2_inner = $('#d2 option:selected').data('keterangan')?.toString() || '';
    let d3_inner = $('#d3 option:selected').data('keterangan')?.toString() || '';
    let d4_inner = $('#d4 option:selected').data('keterangan')?.toString() || '';
    let d5_inner = $('#d5 option:selected').data('keterangan')?.toString() || '';

    // GABUNGKAN KODE DIGIT (untuk kode barang)
    let kode = (d1 + d2 + d3 + d4 + d5).padEnd(5, '0') +
               (d6).padEnd(2, '0') +
               (d8).padEnd(2, '0') +
               (d10).padEnd(2, '0') +
               (d12).padEnd(2, '0') +
               (d14).padEnd(2, '0') +
               (d16).padEnd(2, '0') +
               (d18).padEnd(2, '0') +
               (d20).padEnd(2, '0') +
               (d22).padEnd(2, '0') +
               (d24).padEnd(2, '0');

    $('#kodeBarangResult').text(kode);
    $('#kode_barang_hasil').val(kode);
    {{-- console.log('📟 Kode Barang:', kode); --}}

    // Ambil nama barang dari input user (jika ada)
    let nama_baru = $('#NAMA_BARU').val() || '';

    // Ambil keterangan dari dropdown D6-D24 (untuk deskripsi)
    let d6_text = $('#d6 option:selected').data('text') || '';
    let d8_text = $('#d8 option:selected').data('text') || '';
    let d10_text = $('#d10 option:selected').data('text') || '';
    let d12_text = $('#d12 option:selected').data('text') || '';
    let d14_text = $('#d14 option:selected').data('text') || '';
    let d16_text = $('#d16 option:selected').data('text') || '';
    let d18_text = $('#d18 option:selected').data('text') || '';
    let d20_text = $('#d20 option:selected').data('text') || '';
    let d22_text = $('#d22 option:selected').data('text') || '';
    let d24_text = $('#d24 option:selected').data('text') || '';

    // Ambil keterangan dari dropdown D6-D24 (untuk deskripsi)
    let d6_value = $('#d6_value option:selected').data('text') || '';
    let d8_value = $('#d8_value option:selected').data('text') || '';
    let d10_value = $('#d10_value option:selected').data('text') || '';
    let d12_value = $('#d12_value option:selected').data('text') || '';
    let d14_value = $('#d14_value option:selected').data('text') || '';
    let d16_value = $('#d16_value option:selected').data('text') || '';
    let d18_value = $('#d18_value option:selected').data('text') || '';
    let d20_value = $('#d20_value option:selected').data('text') || '';
    let d22_value = $('#d22_value option:selected').data('text') || '';
    let d24_value = $('#d24_value option:selected').data('text') || '';

    // Gabungkan text dan value untuk masing-masing D
    let d6_all = d6_text + (d6_value ? ' ' + d6_value : '');
    let d8_all = d8_text + (d8_value ? ' ' + d8_value : '');
    let d10_all = d10_text + (d10_value ? ' ' + d10_value : '');
    let d12_all = d12_text + (d12_value ? ' ' + d12_value : '');
    let d14_all = d14_text + (d14_value ? ' ' + d14_value : '');
    let d16_all = d16_text + (d16_value ? ' ' + d16_value : '');
    let d18_all = d18_text + (d18_value ? ' ' + d18_value : '');
    let d20_all = d20_text + (d20_value ? ' ' + d20_value : '');
    let d22_all = d22_text + (d22_value ? ' ' + d22_value : '');
    let d24_all = d24_text + (d24_value ? ' ' + d24_value : '');

    // FILTER: Hanya ambil keterangan yang tidak kosong
    let semuaKeterangan = [
        d6_all, d8_all, d10_all, d12_all,
        d14_all, d16_all, d18_all, d20_all, d22_all, d24_all
    ].filter(v => v.trim() !== '');

    // GABUNGKAN DESKRIPSI BARU (untuk tampilan)
    let deskripsi_baru = semuaKeterangan.join(' · '); // Pakai · sebagai pemisah

    // NAMA BARANG DEFAULT: D4 + D5 + DESKRIPSI (TANPA REPEAT)
    let nama_baru_default = [d4_inner, d5_inner, ...semuaKeterangan]
        .filter(v => v.trim() !== '')
        .join(' ');

    // CEK APAKAH USER SUDAH MENGEDIT NAMA BARU?
    if (!$('#NAMA_BARU').data('user-edited')) {
        // Jika belum diedit user, isi dengan nilai default
        $('#NAMA_BARU').val(nama_baru_default);
        $('#DISKRIPSI_BARU').val(nama_baru_default);
    }

    {{-- console.log('📝 Nama Baru Default:', nama_baru_default);
    console.log('📋 Deskripsi Baru:', deskripsi_baru); --}}

    // Tampilkan deskripsi ke UI
    $('#deskripsiBarangResult').text(deskripsi_baru);
    $('#deskripsi_barang_hasil_baru').val(deskripsi_baru);
}

// --- DETEKSI KETIKA USER MENGEDIT NAMA BARANG ---
$('#NAMA_BARU').on('input', function() {
    // Tandai bahwa user sudah mengedit manual
    $(this).data('user-edited', true);
    // Generate ulang kode (tanpa mengubah nama)
    generateKodeBarang();
});

// --- RESET STATE KETIKA FORM DIRESET ---
$('#reset').click(function(e) {
    e.preventDefault();

    // Reset semua input
    $('input:not([readonly])').val('');
    $('textarea:not([readonly])').val('');
    $('select:not([readonly]):not([disabled])').val('').trigger('change');

    // Reset Select2
    $('select').each(function() {
        if ($(this).hasClass('select2-hidden-accessible')) {
            $(this).val(null).trigger('change');
        }
    });

    // Reset flag user-edited
    $('#NAMA_BARU').data('user-edited', false);

    // Kosongkan output
    $('#kodeBarangResult').text('');
    $('#deskripsiBarangResult').text('');
    $('#kode_barang_hasil').val('');
    $('#deskripsi_barang_hasil_baru').val('');

    // Generate ulang kode (akan kosong)
    generateKodeBarang();
    {{-- console.log('🔄 Semua input & select berhasil di-reset.'); --}}
});
