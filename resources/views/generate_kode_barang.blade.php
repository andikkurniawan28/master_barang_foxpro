
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
        let d12 = $('#d12').val() || '00';
        let d14 = $('#d14').val() || '00';
        let d16 = $('#d16').val() || '00';
        let d18 = $('#d18').val() || '00';
        let d20 = $('#d20').val() || '00';
        let d22 = $('#d22').val() || '00';
        let d24 = $('#d24').val() || '00';

        let d2_inner = $('#d2 option:selected').data('keterangan')?.toString() || '-';
        let d3_inner = $('#d3 option:selected').data('keterangan')?.toString() || '-';
        let d4_inner = $('#d4 option:selected').data('keterangan')?.toString() || '-';
        let d5_inner = $('#d5 option:selected').data('keterangan')?.toString() || '-';

        // NAMA BARU DEFAULT dari dropdown
        let nama_baru_default = `${d2_inner} - ${d3_inner} - ${d4_inner} - ${d5_inner}`;

        // CEK APAKAH USER SUDAH MENGEDIT NAMA BARU?
        // Simpan state apakah user sudah mengedit manual
        if (!$('#NAMA_BARU').data('user-edited')) {
            // Jika belum diedit user, isi dengan nilai default
            $('#NAMA_BARU').val(nama_baru_default);
            $('#DISKRIPSI_BARU').val(nama_baru_default);
        }

        // gabungkan kode barang
        let kode = (d1 + d2 + d3 + d4 + d5).padEnd(5, '0') +(d6).padEnd(2, '0') +
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

        console.log('Kode Barang Terbaru:', kode);

        // Ambil nama barang (bisa default atau hasil edit user)
        let nama_baru = $('#NAMA_BARU').val() || '';

        // Ambil data-text dari dropdown
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

        // Gabungkan menjadi deskripsi baru
        let deskripsi_baru = [nama_baru, d6_text, d8_text, d10_text]
            .filter(v => v !== '')
            .join(' ');

        console.log('Deskripsi Baru:', deskripsi_baru);

        // Tampilkan ke UI + hidden input
        $('#deskripsiBarangResult').text(deskripsi_baru);
        $('#deskripsi_barang_hasil_baru').val(deskripsi_baru);
    }

    // --- DETEKSI KETIKA USER MENGEDIT NAMA BARANG ---
    $('#NAMA_BARU').on('input', function() {
        // Tandai bahwa user sudah mengedit manual
        $(this).data('user-edited', true);
        // Generate ulang deskripsi dengan nilai baru
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

        generateKodeBarang();
        console.log('🔄 Semua input & select berhasil di-reset.');
    });
