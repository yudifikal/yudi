<?php

namespace App\Http\Controllers;

use App\Models\JasaTukang;
use Illuminate\Http\Request;

class JtController extends Controller
{
    public function index()
    {
        $data = JasaTukang::orderBy('id', 'desc')->paginate(15);
        return view('jasatukangkonsumen', compact('data'));
    }

    public function create()
    {
        return view('jasatukangkonsumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_tukang' => 'required',
            'harga_tukang' => 'required',
            'keterangan_tukang' => 'required',
            'foto_tukang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id.required' => 'Id Wajib diisi',
            'nama_tukang.required' => 'Nama Wajib diisi',
            'harga_tukang.required' => 'Harga Wajib diisi',
            'keterangan_tukang.required' => 'Keterangan Wajib diisi',
            'foto_tukang.required' => 'Foto Wajib diisi',
            'foto_tukang.image' => 'File harus berupa gambar',
            'foto_tukang.mimes' => 'File harus berformat: jpeg, png, jpg, gif',
        ]);
        // if ($request->hasFile('foto_tukang')) {
        //     $file = $request->file('foto_tukang');
        //     dd($file);  // Dump the file object to see if it's received correctly
        // }

        $data = $request->only(['id', 'nama_tukang', 'harga_tukang', 'keterangan_tukang']);

        if ($request->hasFile('foto_tukang')) {
            $filename = uniqid() . '.' . $request->foto_tukang->extension();
            $request->foto_tukang->move(public_path('uploads'), $filename);
            $data['foto_tukang'] = $filename;
        } else {
            return redirect()->back()->with('error', 'Foto harus diunggah.');
        }

        JasaTukang::create($data);

        return redirect()->route('jasatukangkonsumen.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JasaTukang::findOrFail($id);
        return view('jasatukangkonsumen.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JasaTukang::findOrFail($id);
        return view('edittukang', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tukang' => 'required',
            'harga_tukang' => 'required',
            'keterangan_tukang' => 'required',
            'foto_tukang' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = JasaTukang::findOrFail($id);

        if ($request->hasFile('foto_tukang')) {
            // Hapus file gambar lama jika ada
            if ($data->foto_tukang && file_exists(public_path('uploads/' . $data->foto_tukang))) {
                unlink(public_path('uploads/' . $data->foto_tukang));
            }

            $filename = uniqid() . '.' . $request->foto_tukang->extension();
            $request->foto_tukang->move(public_path('uploads'), $filename);
            $data->foto_tukang = $filename;
        }

        $data->update([
            'nama_tukang' => $request->nama_tukang,
            'harga_tukang' => $request->harga_tukang,
            'keterangan_tukang' => $request->keterangan_tukang,
        ]);

        return redirect()->route('jasatukangkonsumen.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = JasaTukang::findOrFail($id);

        // Hapus file gambar jika ada
        if ($data->foto_tukang && file_exists(public_path('uploads/' . $data->foto_tukang))) {
            unlink(public_path('uploads/' . $data->foto_tukang));
        }

        $data->delete();

        return redirect()->route('jasatukangkonsumen.index')->with('success', 'Data berhasil dihapus');
    }
}
