<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\SendMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function index()
    {

        return view("contact.index");
    }

    function contactSubmit(ContactStoreRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

//        Mail::raw($request->message, function ($message) use ($request){
//            $message->to($request->email)
//                ->subject($request->subject);
//        });

        Mail::to($request->email)->send(new SendMail($request->message, $request->subect));

        return redirect()->route('welcome');
    }
}
