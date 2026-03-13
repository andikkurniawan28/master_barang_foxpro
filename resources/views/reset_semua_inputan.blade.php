// --- Tombol Reset ---
$('#reset').click(function (e) {
    console.log('reset');

    e.preventDefault(); // cegah reset default form agar kita kontrol manual

    // 1. Kosongkan semua input yang tidak readonly
    $('input:not([readonly])').val('');

    // 2. Kosongkan semua textarea yang tidak readonly
    $('textarea:not([readonly])').val('');

    // 3. Reset semua select yang tidak disabled
    $('select:not([readonly]):not([disabled])').val('').trigger('change');

    // 4. Kalau pakai Select2, reset juga
    $('select').each(function () {
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
