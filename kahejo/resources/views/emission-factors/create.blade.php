@extends('layouts.app')

@section('content')
    <h2 class="page-title">Tambah Faktor Konversi Emisi</h2>

    <div class="card">
        <div class="card-header">
            Form Tambah Faktor Emisi
        </div>
        <div class="card-body">
            <form action="{{ route('emission-factors.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Faktor <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Contoh: Listrik PLN, Bensin, Solar, dll.</div>
                </div>
                
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" required>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Contoh: Energi, Transportasi, Limbah, dll.</div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="value" class="form-label">Nilai <span class="text-danger">*</span></label>
                            <input type="number" step="0.0001" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') }}" required>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{ old('unit') }}" required>
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Contoh: kgCO2e/kWh, kgCO2e/liter, dll.</div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="source" class="form-label">Sumber Referensi</label>
                    <input type="text" class="form-control @error('source') is-invalid @enderror" id="source" name="source" value="{{ old('source') }}">
                    @error('source')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Contoh: IPCC Guidelines 2023, Kementerian ESDM 2024, dll.</div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('emission-factors.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection