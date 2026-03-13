let kodeHasil = $('#kode_barang_hasil').val() || '';
let lastKodePrefix = kodeHasil.substring(0, 5);
console.log(lastKodePrefix);

setInterval(function () {
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
        url: '/master_barang_foxpro/public/index.php/api_dropdown_d6/' + d1sampaid5,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (!response) return;

            updateSelect($('#d6'), response.d6, '-- Tidak ada data D6 --');
            updateSelect($('#d8'), response.d8, '-- Tidak ada data D8 --');
            updateSelect($('#d10'), response.d10, '-- Tidak ada data D10 --');
            console.log('✅ D6, D8, D10 diperbarui.');
        },
        error: function (xhr) {
            console.error('❌ Gagal ambil data:', xhr.responseText);
        },
    });
}, 2000); // cek setiap 2 detik, tapi fetch hanya jika berubah

function updateSelect($el, data, emptyText) {
    let selectedValue = $el.val(); // simpan pilihan user sebelumnya
    $el.empty();
    if (data && data.length > 0) {
        $.each(data, function (i, item) {
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
