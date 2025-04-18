<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Mail\ResetPasswordLink;
use Illuminate\Http\Request;
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

            return new UserResource(Auth::user());
        }

        return response()->json(["message" => "The provided credentials do not match our records."], 401);
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

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            $token = (new PasswordReset)->create($user);
            Mail::to($user)->send(new ResetPasswordLink($token, $user));

            return response("successfully sent an email");
        } else return response(["message" => "The provided credentials do not match our records."], 401);
    }
    /**
     * Gets the user related to a token
     * 
     */
    public function userByToken(String $token)
    {
        $email = PasswordReset::select('email')->where('token', '=', $token)->latest()->get();
        $user = User::where('email', '=', $email[0]->email)->firstOrFail();
        return new UserResource($user);
    }
    /**
     * Updates the password
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', '=', $request->email)->firstOrFail();
        $user->forceFill([
            'password' => bcrypt($validated['password']),
        ])->setRememberToken(Str::random(60));
        $user->save();

        PasswordReset::where('email', $user->email)->delete();
        return response("successfully reset password");
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
