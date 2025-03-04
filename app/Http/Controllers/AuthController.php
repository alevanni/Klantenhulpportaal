<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use App\Http\Resources\UserResource;
use App\Mail\ResetPasswordLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = new UserResource(Auth::user());

            return $user; //UserResource::collection($user);
        }

        return response(["error" => "The provided credentials do not match our records."], 401);/*back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');*/
    }
    public function logged()
    {
        return new UserResource(Auth::user());
    }
    /**
     * Logs the user out
     */
    public function logOut(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return "successfully logged out";
    }

    /**
     * Sends an email to the provided address with a link to reset the password
     * 
     */
    public function passwordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', '=', $request->email)->firstOrFail();
        $token = (new PasswordReset)->create($user);
        Mail::to($user)->send(new ResetPasswordLink($token, $user));

        return response("successfully sent an email");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
