<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $data = material::orderBy('id', 'desc')->paginate(15);
        return view('material', compact('data'));
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_material' => 'required',
            'harga_material' => 'required',
            'keterangan_material' => 'required',
            'status' => 'required',
            'foto_material' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [

            'nama_material.required' => 'Nama Wajib diisi',
            'harga_material.required' => 'Harga Wajib diisi',
            'status.required' => 'Status Wajib diisi',
            'keterangan_material.required' => 'Keterangan Wajib diisi',
            'foto_material.required' => 'Foto Wajib diisi',
            'foto_material.image' => 'File harus berupa gambar',
            'foto_material.mimes' => 'File harus berformat: jpeg, png, jpg, gif',
        ]);
        // if ($request->hasFile('foto_material')) {
        //     $file = $request->file('foto_material');
        //     dd($file);  // Dump the file object to see if it's received correctly
        // }

        $data = $request->only(['id', 'nama_material', 'harga_material', 'keterangan_material', 'status']);

        if ($request->hasFile('foto_material')) {
            $filename = uniqid() . '.' . $request->foto_material->extension();
            $request->foto_material->move(public_path('uploads'), $filename);
            $data['foto_material'] = $filename;
        } else {
            return redirect()->back()->with('error', 'Foto harus diunggah.');
        }

        material::create($data);

        return redirect()->route('material.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = material::findOrFail($id);
        return view('material.show', compact('data'));
    }

    public function edit($id)
    {
        $data = material::findOrFail($id);
        return view('editmaterial', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_material' => 'required',
            'harga_material' => 'required',
            'keterangan_material' => 'required',
            'foto_material' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        $data = material::findOrFail($id);

        if ($request->hasFile('foto_material')) {
            // Hapus file gambar lama jika ada
            if ($data->foto_material && file_exists(public_path('uploads/' . $data->foto_material))) {
                unlink(public_path('uploads/' . $data->foto_material));
            }

            $filename = uniqid() . '.' . $request->foto_material->extension();
            $request->foto_material->move(public_path('uploads'), $filename);
            $data->foto_material = $filename;
        }

        $data->update([
            'nama_material' => $request->nama_material,
            'harga_material' => $request->harga_material,
            'keterangan_material' => $request->keterangan_material,
            'status' => $request->status,
        ]);

        return redirect()->route('material.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = material::findOrFail($id);

        // Hapus file gambar jika ada
        if ($data->foto_material && file_exists(public_path('uploads/' . $data->foto_material))) {
            unlink(public_path('uploads/' . $data->foto_material));
        }

        $data->delete();

        return redirect()->route('material.index')->with('success', 'Data berhasil dihapus');
    }
}
