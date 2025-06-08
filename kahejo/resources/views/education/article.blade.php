@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('education') }}" class="inline-flex items-center text-green-600 hover:text-green-700">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Education
        </a>
    </div>

    <!-- Article Header -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @php
            $imageUrl = $article->image_path;
            if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
                $imageUrl = asset('storage/' . $imageUrl);
            }
            if (!$imageUrl) {
                $imageUrl = 'https://via.placeholder.com/800x400'; // Placeholder if no image
            }
        @endphp
        <img src="{{ $imageUrl }}" alt="{{ $article->title }}" class="w-full h-64 object-cover">
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
            <div class="flex items-center text-gray-500 mb-6">
                <i class="far fa-clock mr-2"></i>
                <span>{{ $article->reading_time }} min read</span>
                <span class="mx-2">•</span>
                <i class="far fa-calendar mr-2"></i>
                <span>{{ \Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="mt-6 bg-white rounded-lg shadow-md p-6">
        <div class="prose max-w-none">
            {!! $article->content !!}
        </div>
    </div>

    <!-- Related Articles -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($related_articles as $related_article)
            <a href="{{ route('education.article', $related_article->slug) }}" class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                 @php
                    $relatedImageUrl = $related_article->image_path;
                    if ($relatedImageUrl && !Str::startsWith($relatedImageUrl, ['http://', 'https://'])) {
                        $relatedImageUrl = asset('storage/' . $relatedImageUrl);
                    }
                    if (!$relatedImageUrl) {
                         $relatedImageUrl = 'https://via.placeholder.com/800x400'; // Placeholder if no image
                    }
                @endphp
                <img src="{{ $relatedImageUrl }}" alt="{{ $related_article->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $related_article->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($related_article->description, 100) }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection 