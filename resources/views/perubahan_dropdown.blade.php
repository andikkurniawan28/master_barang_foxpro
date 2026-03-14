// --- D1 → D2 ---
$('#d1').change(function () {
    let ka = $(this).val();
    console.log('ka:' + ka);
    // Reset D2-D5 setiap D1 berubah
    $('#d2, #d3, #d4, #d5')
        .empty().append('<option value="">-- Pilih --</option>')
        .trigger('change.select2');
    if (ka) {
        $.ajax({
            url: '/master_barang_foxpro/public/index.php/api_dropdown_d2/' + ka,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let d2Select = $('#d2');
                d2Select.empty().append(
                    '<option value="">-- Pilih Sub Kelompok Utama --</option>');
                if (response && response.length > 0) {
                    response.forEach(function (item) {
                        // d2Select.append('<option value="'+item.D2+'">'+item.KB+' | '+item.KET+'</option>');
                        d2Select.append('<option value="' + item.KB +
                            '" data-keterangan="' + item.KET +
                            '" data-kb="' + item.KB + '">' + item.KB +
                            ' | ' + item.KET + '</option>');
                    });
                } else {
                    d2Select.append(
                        '<option value="">-- Tidak ada data --</option>');
                }
                d2Select.trigger('change.select2');
            },
            error: function () {
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
$('#d2').change(function () {
    let kb = $(this).val(); // value dari d2
    let ka = $('#d1').val();
    let params = `${ka}${kb}`;
    console.log('kb:' + params);
    // Reset D3-D5 setiap D2 berubah
    $('#d3, #d4, #d5')
        .empty().append('<option value="">-- Pilih --</option>')
        .trigger('change.select2');

    if (kb) {
        $.ajax({
            url: '/master_barang_foxpro/public/index.php/api_dropdown_d3/' + params,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let d3Select = $('#d3');
                d3Select.empty().append(
                    '<option value="">-- Pilih Kategori --</option>');
                if (response && response.length > 0) {
                    response.forEach(function (item) {
                        // d3Select.append('<option value="'+item.D3+'">'+item.KC+' | '+item.KET+'</option>');
                        d3Select.append('<option value="' + item.KC +
                            '" data-keterangan="' + item.KET +
                            '" data-kc="' + item.KC + '">' + item.KC +
                            ' | ' + item.KET + '</option>');
                    });
                } else {
                    d3Select.append(
                        '<option value="">-- Tidak ada data --</option>');
                }
                d3Select.trigger('change.select2');
            },
            error: function () {
                // alert('Resource tidak ditemukan untuk D3.');
            }
        });
    }
});

// --- D3 → D4 ---
$('#d3').change(function () {
    let kc = $(this).val();
    let ka = $('#d1').val();
    let kb = $('#d2').val();
    let params = `${ka}${kb}${kc}`;
    console.log('kc:' + params);
    // Reset D4-D5 setiap D3 berubah
    $('#d4, #d5')
        .empty().append('<option value="">-- Pilih --</option>')
        .trigger('change.select2');

    if (kc) {
        $.ajax({
            url: '/master_barang_foxpro/public/index.php/api_dropdown_d4/' + params,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let d4Select = $('#d4');
                d4Select.empty().append(
                    '<option value="">-- Pilih Sub Kategori --</option>');
                if (response && response.length > 0) {
                    response.forEach(function (item) {
                        // d4Select.append('<option value="'+item.D4+'">'+item.KD+' | '+item.KET+'</option>');
                        d4Select.append('<option value="' + item.KD +
                            '" data-keterangan="' + item.KET +
                            '" data-kd="' + item.KD + '">' + item.KD +
                            ' | ' + item.KET + '</option>');
                    });
                } else {
                    d4Select.append(
                        '<option value="">-- Tidak ada data --</option>');
                }
                d4Select.trigger('change.select2');
            },
            error: function () {
                // alert('Resource tidak ditemukan untuk D4.');
            }
        });
    }
});

// --- D4 → D5 ---
$('#d4').change(function () {
    let kd = $(this).val();
    let ka = $('#d1').val();
    let kb = $('#d2').val();
    let kc = $('#d3').val();
    let params = `${ka}${kb}${kc}${kd}`;
    console.log('kd:' + params);
    // Reset D5 setiap D4 berubah
    $('#d5')
        .empty().append('<option value="">-- Pilih Turunan Sub Kategori --</option>')
        .trigger('change.select2');

    if (kd) {
        $.ajax({
            url: '/master_barang_foxpro/public/index.php/api_dropdown_d5/' + params,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let d5Select = $('#d5');
                d5Select.empty().append(
                    '<option value="">-- Pilih Turunan Sub Kategori --</option>'
                );
                if (response && response.length > 0) {
                    response.forEach(function (item) {
                        // d5Select.append('<option value="'+item.D5+'">'+item.KE+' | '+item.KET+'</option>');
                        d5Select.append('<option value="' + item.KE +
                            '" data-keterangan="' + item.KET +
                            '" data-ke="' + item.KE + '">' + item.KE +
                            ' | ' + item.KET + '</option>');
                    });
                } else {
                    d5Select.append(
                        '<option value="">-- Tidak ada data --</option>');
                }
                d5Select.trigger('change.select2');
            },
            error: function () {
                // alert('Resource tidak ditemukan untuk D5.');
            }
        });
    }
});

// --- Dropdown D1 → D12 ---
$('#d1, #d2, #d3, #d4, #d5, #d6, #d8, #d10, #d12, #d14, #d16, #d18, #d20, #d22, #d24, #NAMA_BARU, #DISKRIPSI_BARU').change(function () {
    generateKodeBarang();
});
