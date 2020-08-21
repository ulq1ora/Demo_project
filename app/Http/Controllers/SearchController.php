<?php

namespace App\Http\Controllers;

use App\modPasta;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $req)
    {
        /*$Searchrequest = modPasta::like('name',$req->input('search'))*/
        /*$Contact = modPasta::like('hash', $req->route('hash'))->first();*/
        $Contact = modPasta::where('name','like', '%' . $req->input('search') . '%')->take(10)->get();
//        dd($Contact);

        /*dd($req->input('search'));*/
        $result = [];
        foreach ($Contact as $item){
            $result_item = [];
            $result_item['name'] = $item->name;
            $result_item['lang'] = $item->lang ? $item->lang:'N/A' ;
            $result_item['url'] = route('detailed',['hash' => $item->hash]);
            $result[] = $result_item;

        }
        return response()->json($result);
        return view('search');
    }


    public function post(Request $request){
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
        );
        return response()->json($response);
    }

}
