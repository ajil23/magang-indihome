<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    public function index()
    {
        $sector = Sector::paginate(10);
        return view('admin.sector.index', compact('sector'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sub' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sectors', 'public');
        }

        $sector = new Sector();
        $sector->name = $validatedData['name'];
        $sector->image = $imagePath ?? null;
        $sector->sub = $validatedData['sub'];
        $sector->save();

        return redirect()->route('sector.index')->with('success', 'Sector successfully created.');
    }

    public function update(Request $request, $id)
    {
        // Mencari sektor berdasarkan ID
        $sector = Sector::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sub' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengupdate data sektor
        $sector->name = $validated['name'];
        $sector->sub = $validated['sub'];

        // Jika ada gambar yang diupload, proses penggantiannya
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($sector->image) {
                Storage::delete($sector->image);
            }

            // Upload gambar baru
            $imagePath = $request->file('image')->store('sector_images', 'public');
            $sector->image = $imagePath;
        }

        // Simpan perubahan
        $sector->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('sector.index')->with('success', 'Sector updated successfully');
    }

    public function delete($id)
    {
        // Cari data sektor berdasarkan ID
        $sector = Sector::findOrFail($id);

        // Hapus file gambar jika ada
        if ($sector->image && file_exists(public_path($sector->image))) {
            unlink(public_path($sector->image)); // Hapus file dari folder public
        }

        // Hapus data sektor dari database
        $sector->delete();

        // Kembalikan respon
        return redirect()->route('sector.index')->with('success', 'Sector successfully deleted.');
    }
}
