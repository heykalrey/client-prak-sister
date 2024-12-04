<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute field must be a valid email address.'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $client = new Client();

        $apiUrl = config('app.api_url') . '/api/login';
        $response = $client->post($apiUrl, [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        Cookie::queue('token', $response['token']);
        Cookie::queue('id_user', $response['user']['id']);

        if ($response['status_code'] == 200) {
            return redirect()->route('todo');
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
    }

    public function viewRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute field must be a valid email address.'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $client = new Client();

        $apiUrl = config('app.api_url') . '/api/register';
        $response = $client->post($apiUrl, [
            'form_params' => [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        if ($response['status_code'] == 201) {
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
    }

    public function logout()
    {
        $client = new Client();

        $apiUrl = config('app.api_url') . '/api/logout';
        $response = $client->request('POST', $apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . Cookie::get('token'),
            ]
        ]);

        $body = json_decode($response->getBody());

        if ($response->getStatusCode() == 200) {
            Cookie::queue(Cookie::forget('token'));
            return redirect()->route('login')->with('success', $body->message);
        } else {
            return redirect()->route('login')->with('error', $body->message);
        }
    }
}
