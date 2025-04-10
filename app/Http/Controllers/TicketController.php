<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
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

        $ticket = Ticket::create($validated);

        if ($request['categories'] !== []) {
            $catIds = array_column($request['categories'], 'id');
            $ticket->categories()->attach($catIds);
        }

        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
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

        //checks for the user
        if ($request['assigned_to'] !== null) {
            $validated['assigned_to'] = $request['assigned_to'];
        }
        if ($request['status'] !== null) {
            $validated['status'] = $request['status'];
        }
        $ticket->update($validated);

        // The form has a category field
        if ($request['categories'] !== null) {
            $catIds = [];
            // I have to sync with the new ones
            if ($request['categories'] !== []) {
                $catIds = array_column($request['categories'], 'id');
            }
            $ticket->categories()->sync($catIds);
        }

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
