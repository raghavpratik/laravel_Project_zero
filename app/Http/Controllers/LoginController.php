<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("login");
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validate the incoming request data. This automatically redirects back with errors if validation fails.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user with the provided credentials.
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks.
            $request->session()->regenerate();

            // Redirect the user to their intended destination or the dashboard.
            return redirect()->intended('dashboard');
        }

        // If authentication fails, redirect back to the login page with an error message.
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Handle a registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processRegister(Request $request)
    {
        // Validate the registration data. This automatically handles redirection on failure.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // Using a more robust password validation rule.
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Create and save the new user using mass assignment.
        // This is cleaner and requires you to set up the $fillable property in your User model.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // It's safer to default to a non-admin role.
        ]);

        // You could optionally log the user in immediately after registration.
        // Auth::login($user);
        // return redirect()->intended('dashboard');

        // Redirect to the login page with a success message.
        return redirect()->route('account.login')
                         ->with('success', 'Registration successful! Please log in.');
    }
}
