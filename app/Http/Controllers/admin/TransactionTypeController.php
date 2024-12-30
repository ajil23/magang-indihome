<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function index()
    {
        $transactionType = TransactionType::paginate(10);
        return view('admin.transaction.index', compact('transactionType'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $transaction = new TransactionType();
        $transaction->service = $validatedData['service'];
        $transaction->type = $validatedData['type'];
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction type successfully created.');
    }

    public function update(Request $request, $id)
    {
        $transaction = TransactionType::findOrFail($id);

        $validatedData = $request->validate([
            'service' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $transaction->service = $validatedData['service'];
        $transaction->type = $validatedData['type'];
        $transaction->save();

        return redirect()->route('transaction.index')->with('success', 'Transaction type successfully upated.');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $transactionType = TransactionType::findOrFail($id);

        // Hapus data dari database
        $transactionType->delete();

        // Kembalikan respon
        return redirect()->route('transaction.index')->with('success', 'Transaction type successfully deleted.');
    }
}
