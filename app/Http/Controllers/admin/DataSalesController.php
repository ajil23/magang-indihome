<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataSalesController extends Controller
{
    public function index()
    {
        $dataSales = DataSales::paginate('10');
        return view('admin.sales.index', compact('dataSales'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sales', 'public');
        }

        $dataSales = new DataSales();
        $dataSales->name = $validatedData['name'];
        $dataSales->image = $imagePath ?? null;
        $dataSales->code = $validatedData['code'];
        $dataSales->agency = $validatedData['agency'];
        $dataSales->save();

        return redirect()->route('data_sales.index')->with('success', 'Data sales successfully created.');
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $dataSales = DataSales::findOrFail($id);

        // Jika ada gambar yang diupload, proses penggantiannya
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($dataSales->image) {
                Storage::delete($dataSales->image);
            }

            // Upload gambar baru
            $imagePath = $request->file('image')->store('sales', 'public');
            $dataSales->image = $imagePath;
        }

        // Perbarui data
        $dataSales->name = $request['name'];
        $dataSales->code = $request['code'];
        $dataSales->agency = $request['agency'];

        // Simpan perubahan
        $dataSales->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('data_sales.index')->with('success', 'Data sales successfully updated.');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $sales = DataSales::findOrFail($id);

        // Hapus file gambar jika ada
        if ($sales->image && file_exists(public_path($sales->image))) {
            unlink(public_path($sales->image)); // Hapus file dari folder public
        }

        // Hapus data dari database
        $sales->delete();

        // Kembalikan respon
        return redirect()->route('data_sales.index')->with('success', 'Data sales successfully deleted.');
    }
}
