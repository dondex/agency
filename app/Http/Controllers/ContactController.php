<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.page.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($this->isOnline()) {
            $mail_data = [
                'recipient' => 'agency@philworld.online',
                'fromEmail' => 'agency@philworld.online',
                'fromNumber' => $request->number,
                'fromName' => $request->name,
                'subject' => $request->subject,
                'body' => $request->message
            ];

            FacadesMail::send('frontend.email-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'], $mail_data['fromNumber'])
                    ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success', 'Email Sent Successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check you internet connection');
        }
    }

    public function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
