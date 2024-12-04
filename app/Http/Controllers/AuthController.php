<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('Auth.login');
    }

    public function login(){
        $messages = [

        ];
        $client = new Client();

        $apiUrl = config('app.api_url') . '/api/login';
        $response = $client 
    }
}
