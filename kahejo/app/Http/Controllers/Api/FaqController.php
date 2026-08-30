<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Get published FAQs with optional search query.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Faq::where('is_published', true)->orderBy('order', 'asc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                  ->orWhere('answer', 'like', "%{$search}%");
            });
        }

        $faqs = $query->get()->map(function ($f) {
            return [
                'id' => $f->id,
                'question' => $f->question,
                'answer' => $f->answer,
                'order' => $f->order,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar FAQ berhasil dimuat.',
            'data' => [
                'total' => $faqs->count(),
                'faqs' => $faqs,
            ],
        ]);
    }
}
