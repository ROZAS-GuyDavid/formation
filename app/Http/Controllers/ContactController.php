<?php

namespace App\Http\Controllers;

use Illuminate\HTTP\Request;
use App\Mail\ContactMessageCreated;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('emails.create');
    }

    public function store(ContactRequest $request)
    {   
        $mailable = new ContactMessageCreated($request->email, $request->message);
        Mail::to(config('mail.admin_support_email'))->send($mailable);

        flashy('Nous avons bien recu votre message. Nous vous répondrons dans les plus bref délais');

        return redirect()->route('accueil');
    }
}
