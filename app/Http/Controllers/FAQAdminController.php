<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FAQAdminController extends Controller
{
    public function create(): View
    {
        return view('faq.create', [

            // load categories for dropdown
            'categories' => FAQCategory::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'f_a_q_category_id' => ['required', 'exists:f_a_q_categories,id'],
        ]);

        // create FAQ
        FAQ::create($validated);

        // redirect back to faq page
        return redirect()->route('faq.index');
    }

    /**
     * Show edit form
     */
    public function edit(FAQ $faq): View
    {
        $categories = FAQCategory::all();

        return view('faq.edit', [
            'faq' => $faq,
            'categories' => $categories,
        ]);
    }

    /**
     * Update FAQ
     */
    public function update(
        Request $request,
        FAQ $faq
    ): RedirectResponse {

        // validate
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'f_a_q_category_id' => [
                'required',
                'exists:f_a_q_categories,id'
            ],
        ]);

        // update FAQ
        $faq->update($validated);

        // redirect back
        return redirect()->route('faq.index');
    }
    public function destroy(FAQ $faq): RedirectResponse
    {
        // delete faq
        $faq->delete();

        // redirect back
        return redirect()->route('faq.index');
    }
}
