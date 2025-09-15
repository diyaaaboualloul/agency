<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('contact', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        // ✅ Validate form data
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // ✅ Save message into database
        $message = ContactMessage::create($data);

        // ✅ Get agency contact email from ContactInfo table
        // $agencyEmail = ContactInfo::value('email');

        // ✅ Send confirmation email to user
        // Mail::raw("Thank you {$data['name']}! We received your message: \"{$data['message']}\".", function ($mail) use ($data) {
        //     $mail->to($data['email'])
        //          ->subject('We Received Your Message');
        // });

        // ✅ Send notification email to agency
        // if ($agencyEmail) {
        //     Mail::raw("New contact form submission:\n\nName: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nMessage: {$data['message']}", function ($mail) use ($agencyEmail) {
        //         $mail->to($agencyEmail)
        //              ->subject('New Contact Form Submission');
        //     });
        // }

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
