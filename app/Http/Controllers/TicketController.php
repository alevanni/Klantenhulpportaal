<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return TicketResource::collection($tickets);
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
    public function store(StoreTicketRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = $request['created_by'];
        $validated['status'] = 1;
        $ticket = Ticket::create($validated);

        if ($request['categories'] !== []) {
            $ticket->categories()->attach($request['categories']);
        }
        //$tickets = Ticket::orderBy('created_at', 'desc')->get();
        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        return new TicketResource($ticket);
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
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {

        $validated = $request->validated();
        if ($request['categories'] !== []) {
            $ticket->categories()->attach($request['categories']);
        }
        //check for the user
        $ticket->update($validated);
        return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
