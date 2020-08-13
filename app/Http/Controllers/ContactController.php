<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->type = $req->input('type');
        $contact->ttl = $req->input('ttl');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было отправлено ');
    }

/*    public function allData() {
        return view('messages', ['data' => Contact::all()]);
    }*/

    public function allData() {
        $contact = new Contact;
        //$contact->where('subject', '<>', 'ХУЙ')->get()
        return view('messages', ['data' => $contact->orderBy('id', 'asc' )->take(10)->get()]);
    }

}
