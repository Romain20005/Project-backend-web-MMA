<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show contact form
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Handle contact form
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        Mail::to('admin@ehb.be')
            ->send(new ContactFormMail($validated));

        return back()->with('success', 'Message sent successfully!');
    }
}
