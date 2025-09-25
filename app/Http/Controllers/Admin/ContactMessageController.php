<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    
    // Show all messages
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10); // paginate for clean UI
        return view('admin.messages.index', compact('messages'));
    }

    // Show single message
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    // Mark as Read
    public function markRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->status = 'read';
        $message->save();

        return redirect()->back()->with('success', 'Message marked as read!');
    }

    // Delete message
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }
}
