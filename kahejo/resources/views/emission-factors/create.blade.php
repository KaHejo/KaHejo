<!-- C:\Users\Daniel Lincoln\Documents\GitHub\KaHejo\kahejo\resources\views\emission-factors\create.blade.php -->

@extends('layouts.admin')

@section('main-content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Faktor Konversi Emisi</h2>

        <form action="{{ route('admin.emission-factors.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Faktor <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                <p class="text-sm text-gray-500 mt-1">Contoh: Listrik PLN, Bensin, Solar</p>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
                <select name="category" id="category" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Listrik" {{ old('category') == 'Energi' ? 'selected' : '' }}>Listrik</option>
                    <option value="Bensin" {{ old('category') == 'Transportasi' ? 'selected' : '' }}>Bensin</option>
                    <option value="Limbah" {{ old('category') == 'Limbah' ? 'selected' : '' }}>Limbah</option>
                    <option value="Air" {{ old('category') == 'Pertanian' ? 'selected' : '' }}>Air</option>
                </select>
                <p class="text-sm text-gray-500 mt-1">Pilih kategori emisi</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="value" class="block text-sm font-medium text-gray-700">Nilai <span class="text-red-500">*</span></label>
                    <input type="number" step="0.0001" name="value" id="value" value="{{ old('value') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="unit" class="block text-sm font-medium text-gray-700">Unit <span class="text-red-500">*</span></label>
                    <input type="text" name="unit" id="unit" value="{{ old('unit') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <p class="text-sm text-gray-500 mt-1">Contoh: kgCO2e/kWh, kgCO2e/liter</p>
                </div>
            </div>

            <div>
                <label for="source" class="block text-sm font-medium text-gray-700">Sumber Referensi</label>
                <input type="text" name="source" id="source" value="{{ old('source') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                <p class="text-sm text-gray-500 mt-1">Contoh: IPCC Guidelines 2023, Kementerian ESDM 2024</p>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('admin.emission-factors.index') }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
