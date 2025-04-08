<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Mail\NewComment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return CommentResource::collection($comments);
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
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        $comment = Comment::create($validated);
        $ticket = $comment->ticket;
        $sender = Auth::user();

        // I am the creator of the ticket, the message goes to the assigned admin
        if ($sender->id == $ticket->created_by) {
            $assignee = $ticket->assignedTo;
            if ($assignee != null) {
                Mail::to($assignee)->send(new NewComment($ticket, $comment, $sender, $assignee));
            }
        }
        // I am the assigned admin, the message goes to the creator
        else if ($sender->id == $ticket->assigned_to) {
            $creator = $ticket->createdBy;
            Mail::to($creator)->send(new NewComment($ticket, $comment, $sender, $creator));
        }
        // I am a generic admin, the message goes to BOTH assignee AND creator
        else {
            $assignee = $ticket->assignedTo;
            $creator = $ticket->createdBy;
            if ($assignee != null) {
                Mail::to($assignee)->send(new NewComment($ticket, $comment, $sender, $assignee));
            }

            Mail::to($creator)->send(new NewComment($ticket, $comment, $sender, $creator));
        }

        return new CommentResource($comment);
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
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $validated = $request->validated();
        $comment->update($validated);
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
