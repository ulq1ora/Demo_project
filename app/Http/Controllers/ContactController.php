<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        $contact = new Contact();
        /*Auth::id()->id->input('userid');*/
        Auth::id();
        if (Auth::check() == true)
            {
        $contact->userid = Auth::id();
            }
        else{
            $contact->userid = null;
            }
        $contact->name = $req->input('name');
        $contact->type = $req->input('type');
        $contact->ttl = $req->input('ttl');
        $contact->message = $req->input('message');
        do {
            $contact->hash = md5(time());
            try {
                $contact->save();
                break;
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    // TODO: recreate hash till success
                }
            }
        } while (false);




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
        $Contact->isExpired();
        if ($Contact->isExpired() == true){

            return redirect('contact')->withErrors(['error' => 'Сообщение не доступно']);
        }

        return view('detailed',
        [
            'contact' => $Contact
        ]
    );



    }

}
