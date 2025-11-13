@extends('template')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 fw-bold text-center">PENATAAN MASTER BARANG</h1>

        <div class="card shadow-sm p-4">
            <form id="formMasterBarang" method="POST" action="{{ route('perbarui_barang.process', $id) }}">
                @csrf

                {{-- Kode dan Kategori --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Kode Barang</label>
                        <input type="text" class="form-control form-control-sm" name="kode_barang"
                            value="{{ $barang->DEFAULT_CO }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control form-control-sm" name="kategori"
                            value="{{ $barang->KATEGORI }}" readonly>
                    </div>
                </div>

                {{-- Nama Barang --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" class="form-control form-control-sm" name="nama_barang_display"
                        value="{{ $barang->NAMA }}" readonly>
                </div>

                <hr>

                {{-- Kode Barang Result --}}
                <div class="mb-3 text-center">
                    <h5 class="fw-bold text-primary mb-0">
                        Kode Barang:
                        <span id="kodeBarangResult" class="text-dark">{{ $barang->KD_BRG ?? '000000000000' }}</span>
                        <input type="hidden" name="kode_barang_hasil" id="kode_barang_hasil"
                            value="{{ $barang->KD_BRG ?? '' }}">
                    </h5>
                    <small class="text-secondary">
                        Diskripsi Barang:
                        <span id="deskripsiBarangResult" class="text-dark">{{ $barang->DESKRIPSI ?? '' }}</span>
                        <input type="hidden" name="deskripsi_barang_hasil" id="deskripsi_barang_hasil"
                            value="{{ $barang->DESKRIPSI ?? '' }}">
                    </small>
                </div>

                {{-- Famili / Kelompok Besar D1–D5 --}}
                <div class="mt-4">
                    <h5 class="fw-bold text-decoration-underline mb-3">Famili / Kelompok Besar</h5>
                    @foreach (['d1','d2','d3','d4','d5'] as $d)
    <div class="row mb-3 align-items-center">
        <div class="col-md-4">
            <span class="text-danger fw-bold">{{ strtoupper($d) }}</span> {{ $d }} Label
        </div>
        <div class="col-md-8">
            <select name="{{ $d }}" id="{{ $d }}" class="form-select form-select-sm select2" required>
                <option value="">-- Pilih {{ $d }} --</option>
                @foreach ($dataDropdown[$d]['data'] as $item)
                    <option value="{{ $item->{$dataDropdown[$d]['column']} }}">
                        {{ $item->{$dataDropdown[$d]['column']} }} | {{ $item->KET }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
@endforeach

                </div>

                <hr class="mt-4">

                {{-- Spesifikasi Barang --}}
                <h5 class="fw-bold mb-3">Spesifikasi Barang</h5>
                @foreach ([['nama_barang', 'Nama Barang'], ['istilah_lapangan', 'Istilah Lapangan']] as $spec)
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold mb-0">{{ $spec[1] }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" name="{{ $spec[0] }}"
                                placeholder="Masukkan {{ strtolower($spec[1]) }}...">
                        </div>
                    </div>
                @endforeach

                {{-- D6–D12 --}}
                @foreach ($dataDynamic as $item)
<div class="row mb-3 align-items-center">
    <div class="col-md-4">
        <span class="text-danger fw-bold">{{ strtoupper($item['name']) }}</span> Label
    </div>
    <div class="col-md-4">
        <select class="form-select form-select-sm select2" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($item['data'] as $d)
                <option value="{{ $d->{$item['column']} }}">
                    {{ $d->{$item['column']} }} | {{ $d->KET }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control form-control-sm" name="{{ $item['name'] }}_text" placeholder="Input baru...">
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-sm btn-success w-100 save-dynamic" data-target="{{ $item['name'] }}">
            <i class="bi bi-save"></i> Simpan
        </button>
    </div>
</div>
@endforeach


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary px-4">
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
            $('.save-dynamic').click(function() {
                let target = $(this).data('target');
                let newValue = $(`input[name=${target}_text]`).val();
                let select = $(`select[name=${target}]`);
                if (newValue) {
                    // Tambah ke select
                    let option = new Option(newValue, newValue, true, true);
                    select.append(option).trigger('change');
                    // Bisa tambahkan ajax untuk simpan ke DB
                    $.post("{{ route('perbarui_barang.process', $id) }}", {
                        _token: "{{ csrf_token() }}",
                        field: target,
                        value: newValue
                    }, function(resp) {
                        console.log(resp);
                    });
                    $(`input[name=${target}_text]`).val('');
                }
            });
        });
    </script>
@endsection
