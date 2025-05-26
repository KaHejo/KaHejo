@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Faktor Konversi Emisi</h2>

    <form action="{{ route('emission-factors.update', $emissionFactor) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        {{-- Nama Faktor --}}
        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Nama Faktor <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $emissionFactor->name) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-4">
            <label for="category" class="block font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
            <input type="text" id="category" name="category" value="{{ old('category', $emissionFactor->category) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('category') border-red-500 @enderror" required>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Nilai dan Unit --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="value" class="block font-medium text-gray-700">Nilai <span class="text-red-500">*</span></label>
                <input type="number" step="0.0001" id="value" name="value" value="{{ old('value', $emissionFactor->value) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('value') border-red-500 @enderror" required>
                @error('value')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="unit" class="block font-medium text-gray-700">Unit <span class="text-red-500">*</span></label>
                <input type="text" id="unit" name="unit" value="{{ old('unit', $emissionFactor->unit) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('unit') border-red-500 @enderror" required>
                @error('unit')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Sumber Referensi --}}
        <div class="mb-4">
            <label for="source" class="block font-medium text-gray-700">Sumber Referensi</label>
            <input type="text" id="source" name="source" value="{{ old('source', $emissionFactor->source) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('source') border-red-500 @enderror">
            @error('source')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('description') border-red-500 @enderror">{{ old('description', $emissionFactor->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-between mt-6">
            <a href="{{ route('emission-factors.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Kembali</a>
            <button type="submit"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Perbarui</button>
        </div>
    </form>
</div>
@endsection
