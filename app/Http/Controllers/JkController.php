<?php

namespace App\Http\Controllers;

use App\Models\JasaKontruksi;
use Illuminate\Http\Request;

class JkController extends Controller
{
    public function index()
    {
        $data = JasaKontruksi::orderBy('id', 'desc')->get();
        return view('jasakontruksikonsumen', compact('data'));
    }

    public function create()
    {
        return view('jasakontruksikonsumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_kontruksi' => 'required',
            'harga_kontruksi' => 'required',
            'keterangan_kontruksi' => 'required',
            'foto_kontruksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'id.required' => 'Id Wajib diisi',
            'nama_kontruksi.required' => 'Nama Wajib diisi',
            'harga_kontruksi.required' => 'Harga Wajib diisi',
            'keterangan_kontruksi.required' => 'Keterangan Wajib diisi',
            'foto_kontruksi.required' => 'Foto Wajib diisi',
            'foto_kontruksi.image' => 'File harus berupa gambar',
            'foto_kontruksi.mimes' => 'File harus berformat: jpeg, png, jpg, gif',
        ]);
        // if ($request->hasFile('foto_kontruksi')) {
        //     $file = $request->file('foto_kontruksi');
        //     dd($file);  // Dump the file object to see if it's received correctly
        // }

        $data = $request->only(['id', 'nama_kontruksi', 'harga_kontruksi', 'keterangan_kontruksi']);

        if ($request->hasFile('foto_kontruksi')) {
            $filename = uniqid() . '.' . $request->foto_kontruksi->extension();
            $request->foto_kontruksi->move(public_path('uploads'), $filename);
            $data['foto_kontruksi'] = $filename;
        } else {
            return redirect()->back()->with('error', 'Foto harus diunggah.');
        }

        JasaKontruksi::create($data);

        return redirect()->route('jasakontruksikonsumen.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JasaKontruksi::findOrFail($id)->get();
        return view('jasakontruksikonsumen.show', compact('data'));
    }


    public function edit($id)
    {
        $data = JasaKontruksi::findOrFail($id)->get();
        return view('editkontruksi', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kontruksi' => 'required',
            'harga_kontruksi' => 'required',
            'keterangan_kontruksi' => 'required',
            'foto_kontruksi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = JasaKontruksi::findOrFail($id)->get();

        if ($request->hasFile('foto_kontruksi')) {
            // Hapus file gambar lama jika ada
            if ($data->foto_kontruksi && file_exists(public_path('uploads/' . $data->foto_kontruksi))) {
                unlink(public_path('uploads/' . $data->foto_kontruksi));
            }

            $filename = uniqid() . '.' . $request->foto_kontruksi->extension();
            $request->foto_kontruksi->move(public_path('uploads'), $filename);
            $data->foto_kontruksi = $filename;
        }

        $data->update([
            'nama_kontruksi' => $request->nama_kontruksi,
            'harga_kontruksi' => $request->harga_kontruksi,
            'keterangan_kontruksi' => $request->keterangan_kontruksi,
        ]);

        return redirect()->route('jasakontruksikonsumen.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = JasaKontruksi::findOrFail($id)->get();

        // Hapus file gambar jika ada
        if ($data->foto_kontruksi && file_exists(public_path('uploads/' . $data->foto_kontruksi))) {
            unlink(public_path('uploads/' . $data->foto_kontruksi));
        }

        $data->delete()->get();

        return redirect()->route('jasakontruksikonsumen.index')->with('success', 'Data berhasil dihapus');
    }
}
