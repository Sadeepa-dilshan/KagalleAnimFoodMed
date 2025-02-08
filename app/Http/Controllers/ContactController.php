<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitContact(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'msg' => 'required|string|max:1000',
        ]);

        $contactData = $request->only(['fname', 'lname', 'email', 'phone', 'msg']);
        Mail::raw('New contact form submission', function ($message) use ($contactData) {
            $message->to('s19002535@ousl.lk')
                    ->subject('New Contact Form Submission')
                    ->from($contactData['email']);
        });
        return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
    }
}
