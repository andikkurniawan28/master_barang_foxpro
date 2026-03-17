<!-- D6 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 6-7</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D6" id="d6">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d6_data as $d6)
            <option value="{{ $d6->D6 }}" data-text="{{ $d6->KET }}"
                {{ $d6_keterangan_selected == $d6->KET ? 'selected' : '' }}>
                {{ $d6->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D6_value" id="d6_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d6_nilai_data as $nilai)
            <option value="{{ $nilai->D6 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D6 == $nilai->D6) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d6_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD6Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d6_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD6">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D8 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 8-9</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D8" id="d8">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d8_data as $d8)
            <option value="{{ $d8->D8 }}" data-text="{{ $d8->KET }}"
                {{ $d8_keterangan_selected == $d8->KET ? 'selected' : '' }}>
                {{ $d8->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D8_value" id="d8_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d8_nilai_data as $nilai)
            <option value="{{ $nilai->D8 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D8 == $nilai->D8) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d8_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD8Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d8_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD8">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D10 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 10-11</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D10" id="d10">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d10_data as $d10)
            <option value="{{ $d10->D10 }}" data-text="{{ $d10->KET }}"
                {{ $d10_keterangan_selected == $d10->KET ? 'selected' : '' }}>
                {{ $d10->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D10_value" id="d10_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d10_nilai_data as $nilai)
            <option value="{{ $nilai->D10 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D10 == $nilai->D10) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d10_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD10Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d10_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD10">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D12 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 12-13</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D12" id="d12">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d12_data as $d12)
            <option value="{{ $d12->D12 }}" data-text="{{ $d12->KET }}"
                {{ $d12_keterangan_selected == $d12->KET ? 'selected' : '' }}>
                {{ $d12->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D12_value" id="d12_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d12_nilai_data as $nilai)
            <option value="{{ $nilai->D12 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D12 == $nilai->D12) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d12_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD12Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d12_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD12">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D14 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 14-15</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D14" id="d14">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d14_data as $d14)
            <option value="{{ $d14->D14 }}" data-text="{{ $d14->KET }}"
                {{ $d14_keterangan_selected == $d14->KET ? 'selected' : '' }}>
                {{ $d14->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D14_value" id="d14_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d14_nilai_data as $nilai)
            <option value="{{ $nilai->D14 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D14 == $nilai->D14) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d14_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD14Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d14_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD14">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D16 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 16-17</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D16" id="d16">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d16_data as $d16)
            <option value="{{ $d16->D16 }}" data-text="{{ $d16->KET }}"
                {{ $d16_keterangan_selected == $d16->KET ? 'selected' : '' }}>
                {{ $d16->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D16_value" id="d16_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d16_nilai_data as $nilai)
            <option value="{{ $nilai->D16 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D16 == $nilai->D16) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d16_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD16Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d16_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD16">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D18 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 18-19</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D18" id="d18">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d18_data as $d18)
            <option value="{{ $d18->D18 }}" data-text="{{ $d18->KET }}"
                {{ $d18_keterangan_selected == $d18->KET ? 'selected' : '' }}>
                {{ $d18->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D18_value" id="d18_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d18_nilai_data as $nilai)
            <option value="{{ $nilai->D18 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D18 == $nilai->D18) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d18_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD18Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d18_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD18">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D20 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 20-21</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D20" id="d20">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d20_data as $d20)
            <option value="{{ $d20->D20 }}" data-text="{{ $d20->KET }}"
                {{ $d20_keterangan_selected == $d20->KET ? 'selected' : '' }}>
                {{ $d20->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D20_value" id="d20_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d20_nilai_data as $nilai)
            <option value="{{ $nilai->D20 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D20 == $nilai->D20) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d20_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD20Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d20_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD20">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D22 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 22-23</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D22" id="d22">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d22_data as $d22)
            <option value="{{ $d22->D22 }}" data-text="{{ $d22->KET }}"
                {{ $d22_keterangan_selected == $d22->KET ? 'selected' : '' }}>
                {{ $d22->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D22_value" id="d22_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d22_nilai_data as $nilai)
            <option value="{{ $nilai->D22 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D22 == $nilai->D22) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d22_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD22Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d22_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD22">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>

<!-- D24 -->
<div class="row mb-1 align-items-center">
    <div class="col-md-3">Digit 24-25</div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D24" id="d24">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d24_data as $d24)
            <option value="{{ $d24->D24 }}" data-text="{{ $d24->KET }}"
                {{ $d24_keterangan_selected == $d24->KET ? 'selected' : '' }}>
                {{ $d24->KET }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select form-select-sm select2" name="D24_value" id="d24_value">
            <option value="">-- Pilih atau ketik baru --</option>
            @foreach ($d24_nilai_data as $nilai)
            <option value="{{ $nilai->D24 }}" data-text="{{ $nilai->NILAI }}"
                {{ ($barang->D24 == $nilai->D24) && ($d1sampaid5 == $nilai->D5) ? 'selected' : '' }}>
                {{ $nilai->NILAI }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control" id="d24_nilai_input" placeholder="Nilai baru">
            <button class="btn btn-success" type="button" id="simpanD24Nilai">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <input type="text" class="form-control" id="d24_text" placeholder="Keterangan baru">
            <button class="btn btn-success" type="button" id="simpanD24">
                <i class="bi bi-save"></i>
            </button>
        </div>
    </div>
</div>
