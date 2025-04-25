<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = FinancialRecord::with('user')->latest()->get();
        return view('financial.index', compact('records'));
    }

    public function create()
    {
        return view('financial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        FinancialRecord::create([
            'type' => $request->type,
            'amount' => $request->amount,
            'category' => $request->category,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('financial.index')->with('success', 'Record added successfully.');
    }

    public function show(FinancialRecord $financialRecord)
    {
        return view('financial.show', compact('financialRecord'));
    }

    public function edit(FinancialRecord $financialRecord)
    {
        return view('financial.edit', compact('financialRecord'));
    }

    public function update(Request $request, FinancialRecord $financialRecord)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $financialRecord->update($request->all());

        return redirect()->route('financial.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(FinancialRecord $financialRecord)
    {
        $financialRecord->delete();
        return redirect()->route('financial.index')->with('success', 'Record removed successfully.');
    }
}

