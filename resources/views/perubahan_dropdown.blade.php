// --- D1 → D2 ---
$('#d1').change(function () {
    let ka = $(this).val();
    {{-- console.log('ka:' + ka); --}}
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
    {{-- console.log('kb:' + params); --}}
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
    {{-- console.log('kc:' + params); --}}
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
    {{-- console.log('kd:' + params); --}}
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

// Event listener untuk D6
$('#d6').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d6_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d6/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d6) {
                let nilaiArray = response.d6.map(item => ({
                    NILAI: item.NILAI,
                    D6: item.D6,
                }));
                updateNilaiDropdownD6($('#d6'), $('#d6_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d6');
                $('#d6_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D6:', xhr.responseText);
            $('#d6_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D8
$('#d8').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d8_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d8/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d8) {
                let nilaiArray = response.d8.map(item => ({
                    NILAI: item.NILAI,
                    D8: item.D8,
                }));
                updateNilaiDropdownD8($('#d8'), $('#d8_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d8');
                $('#d8_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D8:', xhr.responseText);
            $('#d8_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D10
$('#d10').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d10_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d10/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d10) {
                let nilaiArray = response.d10.map(item => ({
                    NILAI: item.NILAI,
                    D10: item.D10,
                }));
                updateNilaiDropdownD10($('#d10'), $('#d10_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d10');
                $('#d10_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D10:', xhr.responseText);
            $('#d10_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D12
$('#d12').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d12_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d12/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d12) {
                let nilaiArray = response.d12.map(item => ({
                    NILAI: item.NILAI,
                    D12: item.D12,
                }));
                updateNilaiDropdownD12($('#d12'), $('#d12_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d12');
                $('#d12_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D12:', xhr.responseText);
            $('#d12_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D14
$('#d14').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d14_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d14/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d14) {
                let nilaiArray = response.d14.map(item => ({
                    NILAI: item.NILAI,
                    D14: item.D14,
                }));
                updateNilaiDropdownD14($('#d14'), $('#d14_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d14');
                $('#d14_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D14:', xhr.responseText);
            $('#d14_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D16
$('#d16').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d16_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d16/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d16) {
                let nilaiArray = response.d16.map(item => ({
                    NILAI: item.NILAI,
                    D16: item.D16,
                }));
                updateNilaiDropdownD16($('#d16'), $('#d16_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d16');
                $('#d16_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D16:', xhr.responseText);
            $('#d16_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D18
$('#d18').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d18_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d18/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d18) {
                let nilaiArray = response.d18.map(item => ({
                    NILAI: item.NILAI,
                    D18: item.D18,
                }));
                updateNilaiDropdownD18($('#d18'), $('#d18_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d18');
                $('#d18_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D18:', xhr.responseText);
            $('#d18_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D20
$('#d20').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d20_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d20/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d20) {
                let nilaiArray = response.d20.map(item => ({
                    NILAI: item.NILAI,
                    D20: item.D20,
                }));
                updateNilaiDropdownD20($('#d20'), $('#d20_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d20');
                $('#d20_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D20:', xhr.responseText);
            $('#d20_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D22
$('#d22').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d22_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d22/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d22) {
                let nilaiArray = response.d22.map(item => ({
                    NILAI: item.NILAI,
                    D22: item.D22,
                }));
                updateNilaiDropdownD22($('#d22'), $('#d22_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d22');
                $('#d22_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D22:', xhr.responseText);
            $('#d22_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// Event listener untuk D24
$('#d24').on('change', function() {
    let d5 = $('#kode_barang_hasil').val()?.substring(0, 5) || '';
    let keterangan = $(this).find('option:selected').data('text') || '';

    if (!d5 || d5 === '00000' || !keterangan) {
        $('#d24_value').empty().append('<option value="">-- Pilih atau ketik baru --</option>');
        return;
    }

    $.ajax({
        url: '/master_barang_foxpro/public/index.php/api_dropdown_nilai_d24/' + d5 + '/' + keterangan,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response && response.d24) {
                let nilaiArray = response.d24.map(item => ({
                    NILAI: item.NILAI,
                    D24: item.D24,
                }));
                updateNilaiDropdownD24($('#d24'), $('#d24_value'), nilaiArray, '-- Tidak ada data nilai --');
            } else {
                console.warn('⚠️ Response tidak mengandung data d24');
                $('#d24_value').empty().append('<option value="">-- Tidak ada data nilai --</option>');
            }
        },
        error: function(xhr) {
            console.error('❌ Gagal fetch D24:', xhr.responseText);
            $('#d24_value').empty().append('<option value="">-- Error mengambil data --</option>');
        }
    });
});

// --- Dropdown D1 → D12 ---
$('#d1, #d2, #d3, #d4, #d5, #d6_value, #d8_value, #d10_value, #d12_value, #d14_value, #d16_value, #d18_value, #d20_value, #d22_value, #d24_value, #NAMA_BARU, #DISKRIPSI_BARU').change(function () {
    generateKodeBarang();
});
