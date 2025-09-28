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

        // ✅ Get agency contact email (fallback if not set in DB)
        $agencyEmail = ContactInfo::value('email') ?? 'agency@atoz.com';

        try {
            // ✅ Send confirmation email to the user
            Mail::raw(
                "Hi {$data['name']},\n\nThank you for contacting AtoZ! We received your message:\n\"{$data['message']}\"\n\nOur team will get back to you shortly.\n\nBest regards,\nAtoZ Team",
                function ($mail) use ($data) {
                    $mail->to($data['email'])
                         ->subject('✅ We Received Your Message');
                }
            );

            // ✅ Send notification email to agency
            Mail::raw(
                "📩 New contact form submission:\n\n".
                "Name: {$data['name']}\n".
                "Email: {$data['email']}\n".
                "Phone: {$data['phone']}\n".
                "Message: {$data['message']}\n",
                function ($mail) use ($agencyEmail) {
                    $mail->to($agencyEmail)
                         ->subject('📬 New Contact Form Submission');
                }
            );

        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Mail sending failed: '.$e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

        return redirect()->back()->with('success', '✅ Your message has been sent successfully!');
    }

}
