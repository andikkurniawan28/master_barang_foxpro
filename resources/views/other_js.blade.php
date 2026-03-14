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

            {{-- updateSelect($('#d6'), response.d6, '-- Tidak ada data D6 --');
            updateSelect($('#d8'), response.d8, '-- Tidak ada data D8 --');
            updateSelect($('#d10'), response.d10, '-- Tidak ada data D10 --');
            console.log('✅ D6, D8, D10 diperbarui.'); --}}

            updateSelect($('#d6'), response.d6, '-- Tidak ada data D6 --');
            updateSelect($('#d8'), response.d8, '-- Tidak ada data D8 --');
            updateSelect($('#d10'), response.d10, '-- Tidak ada data D10 --');
            updateSelect($('#d12'), response.d12, '-- Tidak ada data D12 --');
            updateSelect($('#d14'), response.d14, '-- Tidak ada data D14 --');
            updateSelect($('#d16'), response.d16, '-- Tidak ada data D16 --');
            updateSelect($('#d18'), response.d18, '-- Tidak ada data D18 --');
            updateSelect($('#d20'), response.d20, '-- Tidak ada data D20 --');
            updateSelect($('#d22'), response.d22, '-- Tidak ada data D22 --');
            updateSelect($('#d24'), response.d24, '-- Tidak ada data D24 --');

            console.log('✅ D6 s/d D24 diperbarui.');
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
                    value: item.D6 ?? item.D8 ?? item.D10 ?? item.D12 ?? item.D14 ?? item.D16 ?? item.D18 ?? item.D20 ?? item.D22 ?? item.D24 ??
                        '', // ambil nilai yang tersedia
                    text: (item.D6 ?? item.D8 ?? item.D10 ?? item.D12 ?? item.D14 ?? item.D16 ?? item.D18 ?? item.D20 ?? item.D22 ?? item.D24 ??
                        '') + ' | ' + (item.KET ??
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


