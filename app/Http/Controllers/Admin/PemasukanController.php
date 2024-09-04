<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Portofolio;
use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    public function index()
    {
        $items =  DB::table('pemasukan')
        ->select('pemasukan.id as pemasukan_id', 'portofolio.id as portofolio_id', "kode", "tanggal", "uraian", "jumlah", "nama")
        ->leftJoin('portofolio', 'pemasukan.proyek_id', '=', 'portofolio.id')
        ->get();
        // dd($items); 
        return view('admin.pages.pemasukan.index', [
            'title' => 'Pemasukan',
            'items' => $items
        ]);
    }

    // public function create()
    // {
    //     $portofolio = Portofolio::latest()->get();
    //     $kategories = KategoriPengeluaran::orderBy('nama', 'ASC')->get();
        
    //     return view('admin.pages.pemasukan.create', [
    //         'title' => 'Tambah Pemasukan',
    //         'portofolio' => $portofolio,
    //         'kategories' => $kategories

    //     ]);
    // }
    public function create()
    {
        $portofolio = Portofolio::latest()->get();
        $kategories = KategoriPengeluaran::orderBy('nama', 'ASC')->get();

        return view('admin.pages.pemasukan.create', [
            'title' => 'Tambah Pemasukan',
            'portofolio' => $portofolio,
            'kategories' => $kategories
        ]);
    }

    // public function store()
    // {
    //     request()->validate([
    //         'proyek_id' => ['required'],
    //         'kategori_pengeluaran_id' => ['required'],
    //         'kode' => ['required'],
    //         'jumlah' => ['required'],
    //         'tanggal' => ['required'],
    //         'uraian' => ['required']
    //     ]);

    //     DB::beginTransaction();
    //     try {
    //         $data = request()->all();
    //         $pemasukan = Pemasukan::create($data);
            
    //         $kode = "PL" . str_pad($pemasukan->id, 6, '0', STR_PAD_LEFT);
    //         $pemasukan->kode = $kode;
    //         $pemasukan->save();
            
    //         DB::commit();

    //         // $pemasukan_id = $pemasukan->id;
            
        
    //         return redirect()->route('admin.pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         // throw $th;
    //         return redirect()->back()->with('error', $th->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => ['required'],
            'kategori_pengeluaran_id' => ['required'],
            'jumlah' => ['required'],
            'tanggal' => ['required'],
            'uraian' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();

            // Create Pemasukan entry
            $pemasukan = Pemasukan::create($data);

            // Generate kode after pemasukan is created
            $kode = "PM" . str_pad($pemasukan->id, 6, '0', STR_PAD_LEFT);
            $pemasukan->kode = $kode;
            $pemasukan->save();

            DB::commit();

            return redirect()->route('admin.pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // public function edit($id)
    // {
    //     $item = Pemasukan::findOrFail($id);

    //     $item =  DB::table('pemasukan')
    //     ->leftJoin('portofolio', 'pemasukan.proyek_id', '=', 'portofolio.id')
    //     ->get();
        
    //     return view('admin.pages.pemasukan.edit', [
    //         'title' => 'Edit Pemasukan',
    //         'item' => $item
    //     ]);
    // }

    public function edit($id)
    {
    // Ambil koleksi yang sesuai, meskipun hanya satu item
        $item = DB::table('pemasukan')
        ->leftJoin('portofolio', 'pemasukan.proyek_id', '=', 'portofolio.id')
        ->where('pemasukan.id', $id)
        ->select('pemasukan.*', 'portofolio.nama as proyek_nama')
        ->first();  // Mengambil item pertama dari koleksi

    return view('admin.pages.pemasukan.edit', [
        'title' => 'Edit Pemasukan',
        'item' => $item
    ]);
}


    public function update($id)
    {
        request()->validate([
            // 'kode' => ['required'],
            'jumlah' => ['required'],
            'tanggal' => ['required'],
            'uraian' => ['required']
        ]);
        DB::beginTransaction();
        try {
            $item = Pemasukan::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.pemasukan.index')->with('success', 'Pemasukan berhasil diupdate.');
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
            $item = Pemasukan::findOrFail($id);
            $item->delete();
            DB::commit();
            return redirect()->route('admin.pemasukan.index')->with('success', 'Pemasukan berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
