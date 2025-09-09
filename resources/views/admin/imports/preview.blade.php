@extends('admin.layouts.app')

@section('title', 'Impor Data - Preview')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-3">
        <div class="col">
            <h5 class="mb-0">Preview Hasil Normalisasi</h5>
            <div class="text-muted">Job: {{ $job }}</div>
        </div>
        <div class="col text-end">
            <a href="{{ route('admin.import.export', ['job' => $job]) }}" class="btn btn-outline-secondary">Unduh Excel</a>
            <a href="{{ route('admin.import.upload') }}" class="btn btn-outline-primary">Import Data Baru</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive" style="max-height: 60vh;">
                <table class="table table-sm table-hover align-middle">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th width="50">Aksi</th>
                            @foreach($headers as $h)
                                <th>{{ $h }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $index => $r)
                            <tr id="row-{{ $index }}">
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="editRow({{ $index }})" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteRow({{ $index }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                                @foreach($headers as $h)
                                    <td data-field="{{ $h }}" data-index="{{ $index }}">
                                        <span class="display-value">{{ $r[$h] ?? '' }}</span>
                                        <input type="text" class="form-control form-control-sm edit-input d-none" value="{{ $r[$h] ?? '' }}" data-field="{{ $h }}" data-index="{{ $index }}">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('admin.import.commit') }}" class="mt-3" onsubmit="return submitEditedRows()">
        @csrf
        <input type="hidden" name="job" value="{{ $job }}">
        <input type="hidden" id="edited_rows" name="edited_rows" value="">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label class="col-form-label">Cara Menyimpan Data:</label>
            </div>
            <div class="col-auto">
                <select name="mode" class="form-select">
                    <option value="insert">Tambah Data Baru Saja</option>
                    <option value="upsert">Update Data Lama, Tambah Data Baru</option>
                    <option value="skip">Lewati Data yang Sudah Ada</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Simpan ke Database</button>
            </div>
        </div>
        <div class="form-text mt-2">
            <strong>Penjelasan:</strong><br>
            • <strong>Tambah Data Baru Saja:</strong> Hanya menambah data baru, jika ada data yang sama akan error<br>
            • <strong>Update Data Lama, Tambah Data Baru:</strong> Update data lama berdasarkan NIK, tambah data baru jika belum ada<br>
            • <strong>Lewati Data yang Sudah Ada:</strong> Hanya menambah data yang benar-benar baru
        </div>
    </form>
</div>

<script>
let editingRow = null;
let editedRows = @json($rows);

function editRow(index) {
    if (editingRow !== null) {
        cancelEdit(editingRow);
    }
    
    const row = document.getElementById(`row-${index}`);
    const inputs = row.querySelectorAll('.edit-input');
    const displays = row.querySelectorAll('.display-value');
    
    inputs.forEach(input => input.classList.remove('d-none'));
    displays.forEach(display => display.classList.add('d-none'));
    
    editingRow = index;
    
    // Update button
    const editBtn = row.querySelector('button[onclick*="editRow"]');
    editBtn.innerHTML = '<i class="fas fa-save"></i>';
    editBtn.setAttribute('onclick', `saveRow(${index})`);
    editBtn.title = 'Simpan';
}

function saveRow(index) {
    const row = document.getElementById(`row-${index}`);
    const inputs = row.querySelectorAll('.edit-input');
    const displays = row.querySelectorAll('.display-value');
    
    inputs.forEach((input, i) => {
        displays[i].textContent = input.value;
        input.classList.add('d-none');
        displays[i].classList.remove('d-none');
        const field = input.getAttribute('data-field');
        if (!editedRows[index]) editedRows[index] = {};
        editedRows[index][field] = input.value;
    });
    
    editingRow = null;
    
    // Update button
    const saveBtn = row.querySelector('button[onclick*="saveRow"]');
    saveBtn.innerHTML = '<i class="fas fa-edit"></i>';
    saveBtn.setAttribute('onclick', `editRow(${index})`);
    saveBtn.title = 'Edit';
}

function cancelEdit(index) {
    const row = document.getElementById(`row-${index}`);
    const inputs = row.querySelectorAll('.edit-input');
    const displays = row.querySelectorAll('.display-value');
    
    inputs.forEach((input, i) => {
        input.value = displays[i].textContent;
        input.classList.add('d-none');
        displays[i].classList.remove('d-none');
    });
    
    editingRow = null;
    
    // Update button
    const saveBtn = row.querySelector('button[onclick*="saveRow"]');
    if (saveBtn) {
        saveBtn.innerHTML = '<i class="fas fa-edit"></i>';
        saveBtn.setAttribute('onclick', `editRow(${index})`);
        saveBtn.title = 'Edit';
    }
}

function deleteRow(index) {
    if (confirm('Apakah Anda yakin ingin menghapus baris ini?')) {
        document.getElementById(`row-${index}`).remove();
        editedRows.splice(index, 1);
    }
}

function submitEditedRows() {
    document.getElementById('edited_rows').value = JSON.stringify(editedRows);
    return true;
}
</script>
@endsection


