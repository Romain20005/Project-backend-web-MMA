<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * Show all news posts
     */
    public function index(): View
    {
        $news = News::latest()->get();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    /**
     * Show one news post
     */
    public function show(News $news): View
    {
        return view('news.show', [
            'news' => $news,
        ]);
    }

    /**
     * Show create form
     */
    public function create(): View
    {
        return view('news.create');
    }

    /**
     * Store a newly created news article
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form data
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'published_at' => ['required', 'date'],

            // image validation
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        // default null
        $imagePath = null;

        // if image uploaded
        if ($request->hasFile('image')) {

            // store image in storage/app/public/news_images
            $imagePath = $request->file('image')
                ->store('news_images', 'public');
        }

        // Create the news article
        News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        // Redirect naar news pagina
        return redirect()->route('news.index');
    }

    /**
     * Show edit form
     */
    public function edit(News $news): View
    {
        return view('news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update news article
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        // Validate form data
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'published_at' => ['required', 'date'],
        ]);

        // Update article
        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        // Redirect back
        return redirect()->route('news.show', $news);
    }
}
