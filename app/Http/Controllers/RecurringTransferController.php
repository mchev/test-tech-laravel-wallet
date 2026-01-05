<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RecurringTransferRequest;
use App\Models\RecurringTransfer;
use App\Models\User;

class RecurringTransferController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('recurring.index');
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
    public function store(RecurringTransferRequest $request)
    {

        $source_id = $request->user()->id;
        $target_id = User::where('email', $request->recipient_email)->first()->id;

        $recurringTransfer = RecurringTransfer::create([
            'source_id' => $source_id, // Where source is the current user
            'target_id' => $target_id,
            'start_date' => $request->start_date,
            'frequency' => $request->frequency,
            'end_date' => $request->end_date,
            'amount' => $request->amount, // Divide by 100 or check if a method already exists
            'reason' => $request->reason,
        ]);

        dd($request->all(), $recurringTransfer);

    }

    /**
     * Display the specified resource.
     */
    public function show(RecurringTransfer $recurringTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecurringTransfer $recurringTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecurringTransfer $recurringTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecurringTransfer $recurringTransfer)
    {
        //
    }
}
