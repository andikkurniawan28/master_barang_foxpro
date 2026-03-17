@extends('template')

@section('kamus_kode')
    {{ 'active' }}
@endsection

@section('content')
    <div class="container-fluid py-0 px-0">
        <h1 class="h3 mb-3"><strong>Kamus Kode</strong></h1>

        <div class="card shadow-sm">
            <div class="card-body">
                @if (empty($data))
                    <div class="alert alert-info mb-0">
                        <i class="bi bi-info-circle"></i> Belum ada data kode.
                    </div>
                @else
                    {{-- Tree container --}}
                    <div id="kamus-tree"></div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Pastikan jQuery sudah ada -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jqTree JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqtree/1.4.2/tree.jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Data dari controller
            const treeData = @json($data);

            if (!treeData || Object.keys(treeData).length === 0) {
                console.log('Data kosong');
                return;
            }

            // Konversi data ke format jqTree dengan struktur barang di setiap level
            function convertToTreeFormat(data) {
                const tree = [];

                Object.keys(data).forEach(d1Key => {
                    const d1Item = data[d1Key];

                    // Node D1
                    const d1Node = {
                        label: `${d1Item.d1?.KA || ''} - ${d1Item.d1?.KET || '-'}`,
                        children: []
                    };

                    // Tambahkan barang langsung di level D1 jika ada
                    if (d1Item.barang && d1Item.barang.length > 0) {
                        d1Item.barang.forEach(barang => {
                            d1Node.children.push({
                                label: `📦 ${barang.kd_brg} - ${barang.nama_baru}`,
                                type: 'barang'
                            });
                        });
                    }

                    // Proses D2
                    if (d1Item.d2 && Object.keys(d1Item.d2).length > 0) {
                        Object.keys(d1Item.d2).forEach(d2Key => {
                            const d2Item = d1Item.d2[d2Key];

                            const d2Node = {
                                label: `${d1Item.d1?.KA + d2Item.d2?.KB || ''} - ${d2Item.d2?.KET || '-'}`,
                                children: []
                            };

                            // Tambahkan barang di level D2 jika ada
                            if (d2Item.barang && d2Item.barang.length > 0) {
                                d2Item.barang.forEach(barang => {
                                    d2Node.children.push({
                                        label: `📦 ${barang.kd_brg} - ${barang.nama_baru}`,
                                        type: 'barang'
                                    });
                                });
                            }

                            // Proses D3
                            if (d2Item.d3 && Object.keys(d2Item.d3).length > 0) {
                                Object.keys(d2Item.d3).forEach(d3Key => {
                                    const d3Item = d2Item.d3[d3Key];

                                    const d3Node = {
                                        label: `${d1Item.d1?.KA + d2Item.d2?.KB + d3Item.d3?.KC || ''} - ${d3Item.d3?.KET || '-'}`,
                                        children: []
                                    };

                                    // Tambahkan barang di level D3 jika ada
                                    if (d3Item.barang && d3Item.barang.length > 0) {
                                        d3Item.barang.forEach(barang => {
                                            d3Node.children.push({
                                                label: `📦 ${barang.kd_brg} - ${barang.nama_baru}`,
                                                type: 'barang'
                                            });
                                        });
                                    }

                                    // Proses D4
                                    if (d3Item.d4 && Object.keys(d3Item.d4).length > 0) {
                                        Object.keys(d3Item.d4).forEach(d4Key => {
                                            const d4Item = d3Item.d4[d4Key];

                                            const d4Node = {
                                                label: `${d1Item.d1?.KA + d2Item.d2?.KB + d3Item.d3?.KC + d4Item.d4?.KD || ''} - ${d4Item.d4?.KET || '-'}`,
                                                children: []
                                            };

                                            // Tambahkan barang di level D4 jika ada
                                            if (d4Item.barang && d4Item.barang
                                                .length > 0) {
                                                d4Item.barang.forEach(barang => {
                                                    d4Node.children.push({
                                                        label: `📦 ${barang.kd_brg} - ${barang.nama_baru}`,
                                                        type: 'barang'
                                                    });
                                                });
                                            }

                                            // Proses D5
                                            if (d4Item.d5 && Object.keys(d4Item.d5)
                                                .length > 0) {
                                                Object.keys(d4Item.d5).forEach(
                                                    d5Key => {
                                                        const d5Item = d4Item
                                                            .d5[d5Key];

                                                        const d5Node = {
                                                            label: `${d1Item.d1?.KA + d2Item.d2?.KB + d3Item.d3?.KC + d4Item.d4?.KD + d5Item.d5?.KE || ''} - ${d5Item.d5?.KET || '-'}`,
                                                            children: []
                                                        };

                                                        // Tambahkan barang di level D5 jika ada
                                                        if (d5Item.barang &&
                                                            d5Item.barang
                                                            .length > 0) {
                                                            d5Item.barang
                                                                .forEach(
                                                                    barang => {
                                                                        d5Node
                                                                            .children
                                                                            .push({
                                                                                label: `📦 ${barang.kd_brg} - ${barang.nama_baru}`,
                                                                                type: 'barang'
                                                                            });
                                                                    });
                                                        }

                                                        d4Node.children.push(
                                                            d5Node);
                                                    });
                                            }

                                            d3Node.children.push(d4Node);
                                        });
                                    }

                                    d2Node.children.push(d3Node);
                                });
                            }

                            d1Node.children.push(d2Node);
                        });
                    }

                    tree.push(d1Node);
                });

                return tree;
            }

            // Convert data
            const treeDataFormatted = convertToTreeFormat(treeData);

            // Inisialisasi tree
            if ($('#kamus-tree').length > 0) {
                const tree = $('#kamus-tree').tree({
                    data: treeDataFormatted,
                    autoOpen: false,
                    dragAndDrop: false,
                    closedIcon: '▶',
                    openedIcon: '▼'
                });

                // Pastikan semua collapsed
                $('#kamus-tree').tree('closeAll');

                // Tambahkan class untuk styling
                // Setelah inisialisasi tree, tambahkan class untuk node barang
                setTimeout(function() {
                    $('.jqtree-element').each(function() {
                        const $elem = $(this);
                        const $parent = $elem.closest('li');
                        const level = $parent.parents('li').length;

                        // Hapus semua class level dulu
                        $elem.removeClass('level-1 level-2 level-3 level-4 level-5 barang-node');

                        // Cek apakah ini node barang
                        const label = $elem.find('.jqtree-title').text();
                        if (label.includes('📦')) {
                            $elem.addClass('barang-node');
                        } else {
                            // Tambahkan class sesuai level
                            if (level === 0) {
                                $elem.addClass('level-1');
                            } else if (level === 1) {
                                $elem.addClass('level-2');
                            } else if (level === 2) {
                                $elem.addClass('level-3');
                            } else if (level === 3) {
                                $elem.addClass('level-4');
                            } else if (level === 4) {
                                $elem.addClass('level-5');
                            }
                        }
                    });
                }, 100);
            }
        });
    </script>
@endsection

@section('head')
    <!-- jqTree CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqtree/1.4.2/jqtree.min.css" />
    <style>
        /* Tree styling */
        ul.jqtree-tree {
            margin-left: 0;
            padding-left: 0;
            font-family: 'Nunito', sans-serif;
        }

        ul.jqtree-tree li {
            list-style-type: none;
        }

        /* Membuat seluruh area bisa diklik */
        ul.jqtree-tree .jqtree-element {
            padding: 12px 8px;
            border-radius: 6px;
            margin-bottom: 3px;
            transition: all 0.2s;
            border-left: 4px solid transparent;
            cursor: pointer;
            user-select: none;
            display: flex;
            align-items: center;
        }

        ul.jqtree-tree .jqtree-element:hover {
            background: #f0f0f0;
            border-left-color: #0d6efd;
        }

        /* Ikon toggle */
        ul.jqtree-tree .jqtree-toggler {
            font-size: 16px;
            margin-right: 12px;
            display: inline-block;
            width: 20px;
            text-align: center;
            color: #6c757d;
            flex-shrink: 0;
        }

        /* ===== INDENTASI YANG JELAS ===== */
        /* Level 1 - D1 (tanpa indentasi) */
        .level-1 {
            margin-left: 0;
            border-left-color: #0d6efd;
            background-color: rgba(13, 110, 253, 0.05);
        }

        .level-1 .jqtree-title {
            font-weight: 700;
            color: #0d6efd;
            font-size: 1.05rem;
        }

        /* Level 2 - D2 (indentasi 30px) */
        .level-2 {
            margin-left: 30px !important;
            border-left-color: #198754;
            background-color: rgba(25, 135, 84, 0.05);
            position: relative;
        }

        .level-2::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #198754;
            opacity: 0.3;
        }

        .level-2 .jqtree-title {
            font-weight: 600;
            color: #198754;
        }

        /* Level 3 - D3 (indentasi 60px) */
        .level-3 {
            margin-left: 60px !important;
            border-left-color: #ffc107;
            background-color: rgba(255, 193, 7, 0.05);
            position: relative;
        }

        .level-3::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #ffc107;
            opacity: 0.3;
        }

        .level-3 .jqtree-title {
            font-weight: 500;
            color: #ffc107;
        }

        /* Level 4 - D4 (indentasi 90px) */
        .level-4 {
            margin-left: 90px !important;
            border-left-color: #dc3545;
            background-color: rgba(220, 53, 69, 0.05);
            position: relative;
        }

        .level-4::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #dc3545;
            opacity: 0.3;
        }

        .level-4 .jqtree-title {
            font-weight: 400;
            color: #dc3545;
        }

        /* Level 5 - D5 (indentasi 120px) */
        .level-5 {
            margin-left: 120px !important;
            border-left-color: #0dcaf0;
            background-color: rgba(13, 202, 240, 0.05);
            position: relative;
        }

        .level-5::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #0dcaf0;
            opacity: 0.3;
        }

        .level-5 .jqtree-title {
            font-weight: 400;
            color: #0dcaf0;
            font-style: italic;
        }

        /* Garis vertikal penghubung */
        .jqtree-tree li {
            position: relative;
        }

        /* Tree container */
        #kamus-tree {
            max-height: 600px;
            overflow-y: auto;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background: white;
        }

        /* Scrollbar */
        #kamus-tree::-webkit-scrollbar {
            width: 8px;
        }

        #kamus-tree::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        #kamus-tree::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        #kamus-tree::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Styling untuk node barang */
        .jqtree-tree .jqtree-element .barang-node .jqtree-title {
            color: #6f42c1;
            font-weight: normal;
            font-size: 0.95rem;
        }

        .jqtree-tree .jqtree-element .barang-node {
            border-left-color: #6f42c1;
            background-color: rgba(111, 66, 193, 0.05);
        }

        /* Ikon khusus untuk barang */
        .jqtree-tree .jqtree-element .barang-node::before {
            content: '📦';
            margin-right: 8px;
            font-size: 14px;
        }

        /* Hover effect untuk barang */
        .jqtree-tree .jqtree-element .barang-node:hover {
            background-color: rgba(111, 66, 193, 0.1);
        }
    </style>
@endsection
