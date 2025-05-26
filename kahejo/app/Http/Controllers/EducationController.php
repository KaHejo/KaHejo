<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // Although Auth is not used in the methods being moved, it might be useful later.

class EducationController extends Controller
{
    public function education()
    {
        $articles = Article::all(); // Fetch all articles from the database
        return view('education', compact('articles')); // Pass the articles to the view
    }

    public function article($slug)
    {
        // Fetch the article from the database based on the slug
        $article = Article::where('slug', $slug)->firstOrFail();

        // Fetch related articles from the database (excluding the current article)
        $related_articles = Article::where('slug', '!=', $slug)->get();

        return view('education.article', [
            'article' => $article,
            'related_articles' => $related_articles
        ]);
    }

    // Method to display the form for creating a new article
    public function createArticle()
    {
        return view('education.create_article');
    }

    // Method to store a new article in the database
    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'reading_time' => 'required|integer',
            'published_at' => 'nullable|date',
            'content' => 'required',
            'description' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Generate slug from title
            'image_path' => $imagePath,
            'reading_time' => $request->reading_time,
            'published_at' => $request->published_at,
            'content' => $request->content,
            'description' => $request->description,
        ]);

        return redirect()->route('education')->with('success', 'Article created successfully!');
    }
}
