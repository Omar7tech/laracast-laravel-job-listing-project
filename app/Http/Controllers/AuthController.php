<?php

namespace App\Http\Controllers;

use App\Mail\jobPosted;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        if (request()->isMethod("get")) {
            return view("auth.login");
        }

        if (request()->isMethod("post")) {
            $validated_data = request()->validate([
                'email' => ['email', 'required'],
                'password' => ['min:2', 'required']
            ]);

            if (Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']])) {
                // Regenerate the session token after successful login
                request()->session()->regenerate();

                return redirect('jobs');
            } else {
                return redirect()->back()->withErrors([
                    'credentials' => 'Invalid email or password'
                ])->withInput();
            }
        }

        return view("auth.login");
    }
    public function register()
    {
        if (request()->isMethod("get")) {
            return view("auth.register");
        }
        if (request()->isMethod("post")) {
            $validated_data = request()->validate([
                'name' => ['min:2', 'required'],
                'email' => ['email', 'required'],
                'password' => ['min:2', 'required', 'confirmed']
            ]);

            if (!User::create($validated_data)) {
                return view('auth.register');
            }

            if (Auth::attempt(['email' => $validated_data['email'], 'password' => $validated_data['password']])) {
                Mail::to($validated_data['email'])->send(new jobPosted($validated_data['name']));
                return redirect('jobs');
            } else {
                return view('welcome');
            }
        }

        return view("auth.register");
    }

    public function logout()
    {
        if (Auth::logout()) {
            return redirect('/');
        }

        return back();
    }

}
