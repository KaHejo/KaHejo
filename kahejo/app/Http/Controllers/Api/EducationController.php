<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    /**
     * Get paginated climate education articles.
     */
    public function articles(Request $request)
    {
        $perPage = (int)$request->input('per_page', 9);
        $search = $request->input('search');

        $query = Article::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $articles = $query->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->through(function (Article $item) {
                $imageUrl = $item->image_path;
                if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
                    $imageUrl = asset('storage/' . $imageUrl);
                }
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'description' => $item->description,
                    'image_url' => $imageUrl,
                    'reading_time' => $item->reading_time ?? 5,
                    'published_at' => $item->published_at ? $item->published_at : $item->created_at,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Daftar artikel edukasi berhasil dimuat.',
            'data' => $articles,
        ]);
    }

    /**
     * Get single article details and related recommendations.
     */
    public function show($slug)
    {
        /** @var Article $article */
        $article = Article::query()->where('slug', $slug)->firstOrFail();

        $imageUrl = $article->image_path;
        if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
            $imageUrl = asset('storage/' . $imageUrl);
        }

        $related = Article::query()->where('id', '!=', $article->id)
            ->take(3)
            ->get()
            ->map(function (Article $r) {
                $relImg = $r->image_path;
                if ($relImg && !Str::startsWith($relImg, ['http://', 'https://'])) {
                    $relImg = asset('storage/' . $relImg);
                }
                return [
                    'id' => $r->id,
                    'title' => $r->title,
                    'slug' => $r->slug,
                    'description' => $r->description,
                    'image_url' => $relImg,
                    'reading_time' => $r->reading_time ?? 5,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Detail artikel berhasil dimuat.',
            'data' => [
                'id' => $article->id,
                'title' => $article->title,
                'slug' => $article->slug,
                'description' => $article->description,
                'content' => $article->content,
                'image_url' => $imageUrl,
                'reading_time' => $article->reading_time ?? 5,
                'published_at' => $article->published_at ? $article->published_at : $article->created_at,
                'related_articles' => $related,
            ],
        ]);
    }

    /**
     * Create and publish a new climate education article.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'reading_time' => 'required|integer|min:1',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Parameter artikel tidak valid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $request->file('image');
            if ($uploadedFile instanceof UploadedFile) {
                $imagePath = $uploadedFile->store('articles', 'public');
            }
        }

        $article = Article::query()->create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')) . '-' . Str::random(5),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image_path' => $imagePath,
            'reading_time' => $request->input('reading_time'),
            'published_at' => $request->input('published_at') ?? now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Artikel edukasi iklim berhasil diterbitkan.',
            'data' => $article,
        ], 201);
    }
}
