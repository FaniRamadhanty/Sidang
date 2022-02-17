<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
       
        return view('barang.index', compact('barangs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'cover' => 'required|image|max:2048',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
        ]);

        $barangs = new Barang;
        $barangs->nama_barang = $request->nama_barang;
// upload image / foto
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barangs->cover = $name;
        }
        $barangs->harga = $request->harga;
        $barangs->stok = $request->stok;
        $barangs->keterangan = $request->keterangan;
        $barangs->save();
        return redirect()->route('barang.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $barangs = Barang::findOrFail($id);
        // return view('barang.show', compact('barang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);
        
        return view('barang.edit')->with(compact('barangs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->nama_barang = $request->nama_barang;
// upload image / foto
        if ($request->hasFile('cover')) {
            $barangs->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barangs->cover = $name;
        }

        $barangs->harga = $request->harga;
        $barangs->stok = $request->stok;
        $barangs->keterangan = $request->keterangan;
        $barangs->save();
        Alert::success('Success', 'Data edit successfully');

        return redirect()->route('barang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $barangs = Barang::findOrFail($id);
        // $barangs->delete();
        // $barangs->deleteImage();

        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('barang.index');

    }
}

