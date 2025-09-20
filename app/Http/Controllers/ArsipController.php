<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Category;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArsipController extends Controller
{
    //
    function index(Request $request)
    {
        $query = Surat::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $surat = $query->get();
        // dd($surat);
        return view(
            'arsip.index',
            [
                'title' => 'Arsip Surat',
                'arsips' => $surat,
            ]
        );
    }

    function detail($id)
    {
        $arsip = Surat::where('id', $id)->first();
        // dd($arsip);
        return view(
            'arsip.detail',
            [
                'title' => 'Detail Arsip Surat',
                'arsip' => $arsip,
            ]
        );
    }

    function create()
    {
        $categories = Category::all();
        return view('arsip.create', ['title' => 'Form Arsip', 'categories' => $categories]);
    }
    function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->file('file')) {
            $file = $request->file;
            $ext   = $file->getClientOriginalExtension();
            $randomString = Str::random(5);
            $fileName = $request->nama . '-' . $randomString . '.' . $ext;
            $file->move(public_path('file-surat'), $fileName);
            $validate['file'] = $fileName;
        }
        $surat = Surat::create($validate);
        // $surat->refresh();
        return redirect('/')->with("success", "Surat Berhasil ditambahkan! Silahkan pilih pegawai");
    }

    public function edit($id)
    {
        $arsip = Surat::findOrFail($id);
        $categories = Category::all();
        return view('arsip.edit', [
            'arsip' => $arsip,
            'categories' => $categories,
        ]);
    }
    public function updateFile(Request $request, $id)
    {
        $arsip = Surat::findOrFail($id);

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048', // hanya PDF max 2MB
        ]);

        // Hapus file lama jika ada
        if ($arsip->file && file_exists(public_path('file-surat/' . $arsip->file))) {
            unlink(public_path('file-surat/' . $arsip->file));
        }

        // Simpan file baru
        $file = $request->file('file');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('file-surat'), $filename);

        // Update database
        $arsip->file = $filename;
        $arsip->save();

        return redirect()->back()->with('success', 'File berhasil diperbarui.');
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'id'         => 'required|exists:surats,id',
            'number'     => 'required',
            'title'      => 'required',
            'category_id' => 'required',
            'file'       => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048', // sesuaikan kebutuhan
        ]);

        $surat = Surat::findOrFail($request->id);

        // handle file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext   = $file->getClientOriginalExtension();
            $randomString = Str::random(5);
            $fileName = $request->title . '-' . $randomString . '.' . $ext;

            // hapus file lama kalau ada
            if ($surat->file && File::exists(public_path('file-surat/' . $surat->file))) {
                File::delete(public_path('file-surat/' . $surat->file));
            }

            // upload file baru
            $file->move(public_path('file-surat'), $fileName);
            $validate['file'] = $fileName;
        } else {
            // kalau nggak ada file baru, tetap pakai file lama
            $validate['file'] = $request->oldFile;
        }

        $surat->update($validate);

        return redirect('/')->with("success", "Surat berhasil diperbarui!");
    }
    public function destroy(Request $request)
    {

        $arsip = Surat::findOrFail($request->id);
        $filePath = public_path('file-surat/' . $arsip->file);
        if (file_exists($filePath)) {
            unlink($filePath); // Menghapus file
        }
        $arsip->delete();
        return redirect('/')->with("success", "Surat Berhasil dihapus!");
    }
}
