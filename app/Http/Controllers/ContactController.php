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
        $contact->hash = md5(time());

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было отправлено ');
    }

/*    public function allData() {
        return view('messages', ['data' => Contact::all()]);
    }*/

    public function allData() {
        //$contact->where('subject', '<>', 'ХУЙ')->get()
        return view(
            'messages',
            [
                'skip' => true
            ]
        );
    }

    public function getPasta(Request $req){
        /*dd($req->route('hash'));*/
        $Contact=Contact::where('hash', $req->route('hash'))->first();

        return view('detailed',
        [
            'contact' => $Contact
        ]
    );



    }

/*    public function getPastabyHash(){}*/

}
