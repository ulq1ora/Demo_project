<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class PastaController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new Contact();
        Auth::id();
        if (Auth::check() == true) {
            $contact->userid = Auth::id();
        } else {
            $contact->userid = null;
        }
        $contact->name = $req->input('name');
        $contact->type = $req->input('type');
        $contact->ttl = $req->input('ttl');
        $contact->message = $req->input('message');
        do {
            try {
                $contact->hash = md5(time());   //todo переделать на поиск в базе сгенеренного хэша.
                $contact->save();
                break;
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    continue;
                }
            }
        } while (true);


        return redirect()->route('contact')->with('success', 'Сообщение было отправлено ');


    }


    /*    public function allData() {
            return view('messages', ['data' => Contact::all()]);
        }*/

    public function allData()
    {
        //$contact->where('subject', '<>', 'ХУЙ')->get()
        return view(
            'messages',
            [
                'skip' => true
            ]
        );
    }

    public function getPasta(Request $req)
    {
        $Contact = Contact::where('hash', $req->route('hash'))->first();
        $Contact->isExpired();
        if ($Contact->isExpired() == true) {

            return redirect('contact')->withErrors(['error' => 'Сообщение не доступно']);
        } elseif(($Contact->type == Contact::TYPE_UNLISTED) && (Auth::id() != $Contact->userid))
        {
            return redirect('contact')->withErrors(['error' => 'Это приватная паста!']);
    }

        return view('detailed',
            [
                'contact' => $Contact
            ]
        );



    }

}
