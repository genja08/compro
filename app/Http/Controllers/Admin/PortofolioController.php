<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    public function index()
    {
        $items = Portofolio::orderBy('nama', 'ASC')->get();
        return view('admin.pages.portofolio.index', [
            'title' => 'Portofolio',
            'items' => $items
        ]);
    }

    public function create()
    {

        return view('admin.pages.portofolio.create', [
            'title' => 'Tambah Portofolio'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'array'],
            'gambar.*' => ['image'],
            'kontrak' => ['required']
        ]);

        DB::beginTransaction();
        try {
            // $slug = request()->nama;
            $slug = Str::slug(request()->nama,'_');
            // $kontrak= request()->file('kontrak')->getClientOriginalName();
            // dd($slug);
            $data_kontrak = request()->file('kontrak');
            $cek = $data_kontrak->store('portofolio-gambar', 'public');
            $kontrak= basename($cek);

            // dd($kontrak);


            $data = request()->only(['nama', 'deskripsi', 'nilai_proyek']);
            $data['slug'] = $slug;
            $data['kontrak'] = $kontrak;
            // $data["nilai_proyek"] =  (int) str_replace('.', '', $data["nilai_proyek"]);
            // dd($data);
            $data_gambar = request()->file('gambar');
            $portofolio = Portofolio::create($data);
            foreach ($data_gambar as $gambar) {
                $portofolio->gambar()->create([
                    'gambar' => $gambar->store('portofolio-gambar', 'public')
                ]);
            }
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Portofolio::findOrFail($id);
        return view('admin.pages.portofolio.edit', [
            'title' => 'Edit Portofolio',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'nilai_proyek' => ['required']
        ]);
        DB::beginTransaction();
        try {
            $item = Portofolio::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $item = Portofolio::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
