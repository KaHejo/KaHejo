@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Manajemen Faktor Konversi Emisi</h2>

        <!-- Daftar Faktor Emisi -->
        <div class="bg-white shadow rounded-lg">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <span class="text-lg font-medium text-gray-700">Daftar Faktor Emisi</span>
                <a href="{{ route('emission-factors.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-full inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Faktor Baru
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Kategori</th>
                            <th class="px-6 py-3">Nilai</th>
                            <th class="px-6 py-3">Unit</th>
                            <th class="px-6 py-3">Sumber</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @forelse($factors as $factor)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $factor->name }}</td>
                                <td class="px-6 py-4">{{ $factor->category }}</td>
                                <td class="px-6 py-4">{{ $factor->value }}</td>
                                <td class="px-6 py-4">{{ $factor->unit }}</td>
                                <td class="px-6 py-4">{{ $factor->source ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('emission-factors.edit', $factor) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('emission-factors.destroy', $factor) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data faktor emisi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tata Cara Penggunaan -->
        <div class="bg-white shadow rounded-lg mt-8">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-800">Tata Cara Penggunaan</h3>
            </div>
            <div class="px-6 py-4 text-gray-700">
                <p>Halaman ini digunakan untuk mengelola faktor konversi emisi berdasarkan ketetapan yang ada. Faktor konversi ini perlu diperbarui sesuai dengan regulasi atau referensi terbaru untuk memastikan perhitungan tetap relevan dan akurat.</p>

                <h4 class="mt-4 font-semibold">Cara Penggunaan:</h4>
                <ul class="list-disc list-inside mt-2 space-y-1">
                    <li>Gunakan tombol <strong>Tambah Faktor Baru</strong> untuk menambahkan faktor konversi baru</li>
                    <li>Gunakan tombol <strong>Edit</strong> untuk mengubah data faktor konversi yang sudah ada</li>
                    <li>Gunakan tombol <strong>Hapus</strong> untuk menghapus faktor konversi yang tidak diperlukan lagi</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
