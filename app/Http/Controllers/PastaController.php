<?php

namespace App\Http\Controllers;

use Lang;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\modPasta;
use Illuminate\Support\Facades\Auth;


class PastaController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new modPasta();
        Auth::id();
        if (Auth::check() == true) {
            $contact->userid = Auth::id();
        } else {
            $contact->userid = null;
        }
        $contact->name = $req->input('name');
        $contact->type = $req->input('type');
        $contact->ttl = $req->input('ttl');
        $contact->lang = $req->input('lang');
        $contact->message = $req->input('message');
        do {
            try {
                $contact->hash = md5(time());
                $contact->save();
                break;
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    continue;
                }
            }
        } while (true);


        return redirect()->route('contact')->with('success', trans('alerts.msg.success'));


    }


    /*    public function allData() {
            return view('messages', ['data' => modPasta::all()]);
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
        $Contact = modPasta::where('hash', $req->route('hash'))->first();
        $Contact->isExpired();
        if ($Contact->isExpired() == true) {

            return redirect('contact')->withErrors(['error' => trans('alerts.msg.expired')]);
        } elseif(($Contact->type == modPasta::TYPE_UNLISTED) && (Auth::id() != $Contact->userid))
        {
            return redirect('contact')->withErrors(['error' => trans('alerts.msg.unlisted')]);
    }

        return view('detailed',
            [
                'contact' => $Contact
            ]
        );



    }

}
