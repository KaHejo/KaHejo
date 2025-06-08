<!-- C:\Users\Daniel Lincoln\Documents\GitHub\KaHejo\kahejo\resources\views\faqs\index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-6">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Frequently Asked Questions</h1>
            <p class="text-gray-600">Pertanyaan yang sering ditanyakan seputar Carbon Footprint</p>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            @forelse($faqs as $index => $faq)
                <div class="border-b border-gray-200 last:border-b-0">
                    <details class="group p-4 hover:bg-gray-50">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span class="text-gray-800 font-semibold">{{ $faq->question }}</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <div class="mt-4 text-gray-600">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </details>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">
                    <p>Belum ada FAQ yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    /* Tambahan CSS untuk animasi dan warna tema hijau-abu */
    details summary::-webkit-details-marker {
        display: none;
    }

    details[open] {
        background-color: #f8f9fa;
    }
    
    details[open] .text-gray-800 {
        color: #2F855A; /* Warna hijau gelap */
    }
    
    .bg-green-600 {
        background-color: #2F855A;
    }
    
    .bg-green-700 {
        background-color: #276749;
    }
    
    .hover\:bg-green-700:hover {
        background-color: #276749;
    }
    
    .focus\:ring-green-500:focus {
        --tw-ring-color: #48BB78;
        box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.5);
    }
    
    .text-green-600 {
        color: #2F855A;
    }
    
    .bg-gray-500 {
        background-color: #718096;
    }
    
    .hover\:bg-gray-600:hover {
        background-color: #4A5568;
    }
</style>
@endsection
