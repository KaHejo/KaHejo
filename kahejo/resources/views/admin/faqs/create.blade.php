@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-700">Tambah FAQ Baru</h1>
            <p class="text-gray-500">Silakan isi form berikut untuk menambahkan FAQ baru</p>
        </div>

        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="question" class="block text-gray-700 font-medium mb-2">Pertanyaan</label>
                <input type="text" name="question" id="question" value="{{ old('question') }}" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" 
                    required>
                @error('question')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="answer" class="block text-gray-700 font-medium mb-2">Jawaban</label>
                <textarea name="answer" id="answer" rows="6" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" 
                    required>{{ old('answer') }}</textarea>
                @error('answer')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="order" class="block text-gray-700 font-medium mb-2">Urutan</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} 
                        class="rounded text-green-600 focus:ring-green-500">
                    <span class="ml-2 text-gray-700">Publikasikan FAQ ini</span>
                </label>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.faqs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Kembali</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>
@endsection