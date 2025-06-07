<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::where('is_published', true)
            ->orderBy('order')
            ->get();
            
        return view('faqs.index', compact('faqs'));
    }
}
