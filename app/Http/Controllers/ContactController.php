<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send an email with the form data
        Mail::to('your-email@example.com')->send(new \App\Mail\ContactForm($validatedData));

        // Redirect or return a response as needed
        return response()->json(['message' => 'Contact form submitted successfully']);
    }
}
