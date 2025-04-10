<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return UserResource::collection($users);
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
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['admin'] = 0;
        $validated['password'] = Hash::make($request['password']);
        $user = User::create($validated);
        Mail::to($user)->send(new WelcomeMail($user));
        return new UserResource($user);
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
    public function update(UpdateUserRequest $request, User $user)
    {

        $validated = $request->validated();
        $validated['admin'] = (int)$validated['isAdmin'];
        $validated['first_name'] = $validated['firstName'];
        $validated['last_name'] = $validated['lastName'];
        $user->update($validated);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if ($user->tickets()->where('status', '<', 2)->exists()) {

            throw new HttpResponseException(response()->json([
                'message' => 'This user has unresolved tickets, you cannot delete them!!'
            ], 400));
        }
        foreach ($user->tickets as $ticket) {
            $ticket->categories()->detach();
        }
        $user->tickets()->delete();
        $user->delete();
        return response()->json(["message" => "User successfully deleted"], 200);
    }
}
