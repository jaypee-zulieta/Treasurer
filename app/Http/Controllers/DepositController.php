<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $deposits = Deposit::orderBy('created_at', 'desc')->paginate(20);
        $total = Deposit::sum('amount');
        return view('deposits.index', ["deposits" => $deposits, "total" => $total]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "received_from" => "string|required|max:255|min:3",
            "amount" => "numeric|required",
            "remarks" => "string|nullable",
            "created_at" => "date|nullable"
        ]);

        $deposit = Deposit::create($validated);
        return to_route('deposits.index')->with(["deposit-new" => $deposit->id]);
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
