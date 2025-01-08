<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // This method shows the login page
    public function index()
    {
        // If the user is already logged in, redirect them to the index page
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('login');
    }

    // Will authenticate the user
    public function authenticate(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // If validation passes
        if ($validator->passes()) {
            // Attempt to log the user in
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Redirect to the index page after successful login
                return redirect()->route('account.dashboard'); // Redirect to index.blade.php
            } else {
                // Return an error if credentials are incorrect
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect.');
            }
        } else {
            // Return errors if validation fails
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // Will show the register page
    public function register()
    {
        return view('register');
    }

    // Handle user registration
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        // If validation passes, create the user
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();

            return redirect()->route('account.login')->with('success', 'You have registered successfully');
        } else {
            // If validation fails, return errors
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
