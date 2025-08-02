<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index()
    {
        return view("login");
    }


    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required', 'email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/');
            } else {
                return redirect()->route('login')->with('error', 'Either email or password is incorrect');

            }

        } else {
            return redirect()->route('login')
                ->withInput()
                ->withErrors($validator);


        }
    }

    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        // Use request->validate() which is cleaner and automatically handles redirection on failure.
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed' // BEST PRACTICE: Added min length and confirmed rule.
        ]);

        if ($validator->passes()) {

        // Create the user since validation has passed.
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = 'general_user'; // Assuming a default role
        $user->save();

        // Redirect to the login page or the welcome page with a success message.
        // Log the new user in automatically.
Auth::login($user);

// Redirect to the homepage or dashboard.
return redirect('/')->with('success', 'Registration successful! You are now logged in.');
    } else {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }
    }

}