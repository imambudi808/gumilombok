<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function showUser(){
        $ch =curl_init('https://reqres.in/api/users');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
        $result = curl_exec($ch);
        curl_close($ch);
        // dd(response($result));
        return view('user_list')->with(
            ['users'=> json_decode($result)]
        );
    }

    public function showUserGuzzle(){
        $client = new Client;
        $res = $client->get('https://reqres.in/api/users');
        $body = (string) $res->getBody();

        return view('user_list')->with([
            'users' => json_decode($body)
        ]);
    }

    public function translate(){
        
        return view('translate');
    }

    public function posttranslate(Request $req){
        $data = $this->validate($req,[
            'translate' => 'required'
        ]);

        // $res=$data['translate'];
        $client = new Client;
        $res = $client->post('https://api.cognitive.microsofttranslator.com/translate',[
            'query' => [
                'api-version' => '3.0',
                'to' => $req->to
            ],
            'headers' => [
                'Ocp-Apim-Subscription-Key'=>env('AZURETRANSLATE_KEY')
            ],
            'json' => [
                ['text' => $req->translate]
            ]
        ]);
        $res = (string) $res->getBody();
        // dd(json_decode($res));
        return view('translate')->with([
            // 'res' => $res
            'res' => json_decode($res)
        ]);
    }

    // public function posttranslate2(Request $req){
    //     $data = $this->validate($req,[
    //         'translate2' => 'required'
    //     ]);

    //     $res2=$data['translate2'];
    //     return view('translate')->with([
    //         'res2' => $res2
    //     ]);
    // }

    
}
