<?php

namespace App\Http\Controllers;
use App\DataBarang;
use App\Http\Requests\DataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;

use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_barang = DataBarang::orderBy('kode_barang', 'asc')->get();
        return view('data-barang.index', compact('data_barang'));
    }

    public function show($kode_barang = null)
    {
        $data_barang = DataBarang::findOrFail($kode_barang);
        return view('data-barang.detail', compact('data_barang'));
    }

    public function create()
    {
        return view('data-barang.create');
    }

    public function store(DataBarangRequest $request)
    {
        $kode_barang = $request->kode_barang;
        // $foto = $request->file('foto');
        // $extension = $foto->extension();
        $nama_foto = "";
    
        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->extension();
            $nama_foto = time() . "_" . $kode_barang . "." . $extension;
            $nama_folder = 'img';
            $foto->move($nama_folder, $nama_foto);
        }

        DataBarang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'berat' => $request->berat,
            'foto' => $nama_foto
        ]);

        session()->flash('pesan', 'Data Berhasil Ditambah');
        return redirect('/data-barang');
    }

    public function edit($kode_barang = '')
    {
        $data_barang = DataBarang::findOrFail($kode_barang);
        return view('data-barang.edit', compact('data_barang'));
    }

    public function update($kode_barang = '', UpdateDataBarangRequest $request)
    {
        $data_barang = DataBarang::findOrFail($kode_barang);

        if ($request->file('foto')) {
            $kode_barang = $request->kode_barang;
            $foto = $request->file('foto');
            $extension = $foto->extension();
            $nama_foto = time() . "_" . $kode_barang . "." . $extension;
            $nama_folder = 'img';
            $foto->move($nama_folder, $nama_foto);
            $data_barang->foto = $nama_foto;
        }

        // $data_barang->kode_barang = $request->kode_barang;
        $data_barang->nama_barang = $request->nama_barang;
        $data_barang->jumlah = $request->jumlah;
        $data_barang->berat = $request->berat;
        $data_barang->save();

        session()->flash('pesan', 'Data Berhasil Diubah');
        return redirect('/data-barang');
    }

    public function destroy($kode_barang)
    {
        $data_barang = DataBarang::findOrFail($kode_barang);
        $data_barang->delete($kode_barang);

        session()->flash('pesan', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
