@extends('layouts.app')

@section('content')
    <h2 class="page-title">Manajemen Faktor Konversi Emisi</h2>
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Faktor Emisi</span>
            <a href="{{ route('emission-factors.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i> Tambah Faktor Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Nilai</th>
                            <th>Unit</th>
                            <th>Sumber</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($factors as $factor)
                            <tr>
                                <td>{{ $factor->name }}</td>
                                <td>{{ $factor->category }}</td>
                                <td>{{ $factor->value }}</td>
                                <td>{{ $factor->unit }}</td>
                                <td>{{ $factor->source ?? '-' }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('emission-factors.edit', $factor) }}" class="btn btn-sm btn-outline-secondary me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('emission-factors.destroy', $factor) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data faktor emisi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card mt-4">
        <div class="card-header">
            Penjelasan Fitur
        </div>
        <div class="card-body">
            <p>Halaman ini digunakan untuk mengelola faktor konversi emisi yang akan digunakan dalam kalkulasi carbon footprint. Faktor konversi ini perlu diperbarui sesuai dengan regulasi atau referensi terbaru untuk memastikan perhitungan tetap relevan dan akurat.</p>
            
            <h5 class="mt-3">Cara Penggunaan:</h5>
            <ul>
                <li>Gunakan tombol <strong>Tambah Faktor Baru</strong> untuk menambahkan faktor konversi baru</li>
                <li>Gunakan tombol <strong>Edit</strong> untuk mengubah data faktor konversi yang sudah ada</li>
                <li>Gunakan tombol <strong>Hapus</strong> untuk menghapus faktor konversi yang tidak diperlukan lagi</li>
            </ul>
        </div>
    </div>
@endsection