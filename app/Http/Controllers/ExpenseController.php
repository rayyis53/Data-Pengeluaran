<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('date', 'desc')->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Simpan data ke database
        Expense::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }


    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Update data di database
        $expense->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil diperbarui!');
    }


    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
