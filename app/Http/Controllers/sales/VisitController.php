<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\DataSales;
use App\Models\Sector;
use App\Models\TransactionType;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisitController extends Controller
{
    public function index()
    {
        $visit = Visit::paginate(10);
        $sector = Sector::all();
        $transaction = TransactionType::all();
        $sales = DataSales::all();
        return view('sales.visit.index', compact('visit', 'sector', 'transaction', 'sales'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'data_sales_id' => 'required|exists:data_sales,id',
            'transaction_type_id' => 'required|exists:transaction_type,id',
            'sector_id' => 'required|exists:sector,id',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
            'pic' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
            'description' => 'nullable|string',
        ]);

        // Proses file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/visit', $fileName, 'public');
        }

        // Simpan data ke dalam database
        $visit = Visit::create([
            'data_sales_id' => $validatedData['data_sales_id'],
            'transaction_type_id' => $validatedData['transaction_type_id'],
            'sector_id' => $validatedData['sector_id'],
            'location' => $validatedData['location'],
            'address' => $validatedData['address'],
            'date' => $validatedData['date'],
            'pic' => $validatedData['pic'],
            'file' => $filePath ?? null, // File path hasil upload
            'description' => $validatedData['description'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Cari data yang akan diperbarui
        $visit = Visit::findOrFail($id);

        // Proses file upload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($visit->file && Storage::disk('public')->exists($visit->file)) {
                Storage::disk('public')->delete($visit->file);
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/visit', $fileName, 'public');
        }

        // Perbarui data di dalam database
        $visit->update([
            'data_sales_id' => $request['data_sales_id'],
            'transaction_type_id' => $request['transaction_type_id'],
            'sector_id' => $request['sector_id'],
            'location' => $request['location'],
            'address' => $request['address'],
            'date' => $request['date'],
            'pic' => $request['pic'],
            'file' => $filePath ?? $visit->file, // Gunakan file baru jika ada, jika tidak tetap file lama
            'description' => $request['description'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit updated successfully.');
    }

    public function delete($id)
    {
        // Cari data yang akan dihapus
        $visit = Visit::findOrFail($id);

        // Hapus file terkait jika ada
        if ($visit->file && Storage::disk('public')->exists($visit->file)) {
            Storage::disk('public')->delete($visit->file);
        }

        // Hapus data visit
        $visit->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit deleted successfully.');
    }
}
