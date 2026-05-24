<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use Illuminate\View\View;

class FAQController extends Controller
{
    /**
     * Show FAQ page
     */
    public function index(): View
    {
        // load categories + their faqs
        $categories = FAQCategory::with('faqs')->get();

        return view('faq.index', [
            'categories' => $categories,
        ]);
    }
}
