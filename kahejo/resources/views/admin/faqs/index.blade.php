@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">Kelola FAQ</h1>
            <a href="{{ route('admin.faqs.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                Tambah FAQ Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-gray-600">No</th>
                        <th class="py-2 px-4 border-b text-left text-gray-600">Pertanyaan</th>
                        <th class="py-2 px-4 border-b text-left text-gray-600">Status</th>
                        <th class="py-2 px-4 border-b text-left text-gray-600">Urutan</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faqs as $index => $faq)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $faq->question }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($faq->is_published)
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Dipublikasi</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Draft</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $faq->order }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="{{ route('admin.faqs.delete', $faq->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus FAQ ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">Belum ada data FAQ</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection