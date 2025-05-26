@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Environmental Education</h1>
        <p class="mt-2 text-gray-600">Learn about sustainability and environmental conservation.</p>
    </div>

    <!-- Button to Create New Article -->
    <div class="mb-6">
        <a href="{{ route('education.articles.create') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
            <i class="fas fa-plus mr-2"></i> Create New Article
        </a>
    </div>

    <!-- Education Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $article)
        <a href="{{ route('education.article', $article->slug) }}" class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
            @php
                $imageUrl = $article->image_path;
                if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
                    $imageUrl = asset('storage/' . $imageUrl);
                }
                if (!$imageUrl) {
                    $imageUrl = 'https://via.placeholder.com/800x400'; // Placeholder if no image
                }
            @endphp
            <img src="{{ $imageUrl }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $article->title }}</h3>
                <p class="text-gray-600 mb-4">{{ Str::limit($article->description, 100) }}</p>
                <div class="text-green-600 hover:text-green-700 font-medium inline-flex items-center">
                    Read More
                    <i class="fas fa-arrow-right ml-2"></i>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Interactive Learning Section -->
    {{-- <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Interactive Learning</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Quiz Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Test Your Knowledge</h3>
                        <p class="text-gray-600 mb-4">Take our environmental quiz to test your understanding of sustainability concepts.</p>
                        <a href="{{ route('education.quiz') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Start Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</div>
@endsection 