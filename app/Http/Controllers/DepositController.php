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
    public function index(Request $request): View
    {
        $total = $this->compressNumber(Deposit::sum('amount'), 2);
        $searchParam = $request->query('search');

        if ($searchParam) {
            $deposits = Deposit::search($searchParam)->paginate(20);
            $deposits->appends(['searchParam' => $searchParam]);

            return view('deposits.index', [
                "deposits" => $deposits,
                "total" => $total,
                "search" => $searchParam
            ]);
        }
            
        $deposits = Deposit::orderBy('created_at', 'desc')->paginate(20);
        return view('deposits.index', [
            "deposits" => $deposits, 
            "total" => $total, 
            "search" => $searchParam
        ]);
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
            "amount" => "numeric|required|min:0.01",
            "remarks" => "string|nullable",
            "created_at" => "date|nullable"
        ]);

        $deposit = Deposit::create($validated);
        return to_route('deposits.index')->with(["deposit-new" => $deposit->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit): View
    {
        //
        return view('deposits.show', ["deposit" => $deposit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        //
        return view('deposits.edit', ["deposit" => $deposit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposit $deposit)
    {
        $validated = $request->validate([
            "received_from" => "string|required|max:255|min:3",
            "amount" => "numeric|required|min:0.01",
            "remarks" => "string|nullable",
            "created_at" => "date|nullable"
        ]);

        $deposit->update($validated);
        return to_route('deposits.index')->with(["deposit-updated" => $deposit->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit): RedirectResponse
    {
        $deposit->delete();
        return to_route('deposits.index')->with(["deposit-deleted" => $deposit->id]);
    }
    

    private function compressNumber($num, $precision = 2) {
        $num = (float) str_replace(',', '', $num);

        if ($num >= 1000000000) {
            $formatted = $num / 1000000000;
            $suffix = 'B';
        } elseif ($num >= 1000000) {
            $formatted = $num / 1000000;
            $suffix = 'M';
        } else {
            // ✅ Format normally with commas if below 1M
            return number_format($num, 2, '.', ',');
        }

        // round and remove trailing zeros
        return rtrim(rtrim(number_format($formatted, $precision, '.', ''), '0'), '.') . $suffix;
    }
}
