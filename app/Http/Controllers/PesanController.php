<?php

namespace App\Http\Controllers;
use Alert;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();

        return view('pesanan.index', compact('pesanan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required',
    //         'tanggal' => 'required',
    //         'status' => 'required',
    //         'kode' => 'required',
    //         'jumlah_harga' => 'required',
    //     ]);

    //     $pesanan = new Pesanan;
    //     $pesanan->user_id = $request->user_id;
    //     $pesanan->tanggal = $request->tanggal;
    //     $pesanan->status = $request->status;
    //     $pesanan->kode = $request->kode;
    //     $pesanan->jumlah_harga = $request->jumlah_harga;
    //     $pesanan->save();
    //     return redirect()->route('pesanan.index');

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        return view('pesanan.edit')->with(compact('pesanan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required',
    //         'tanggal' => 'required',
    //         'status' => 'required',
    //          'kode' => 'required',
    //         'jumlah_harga' => 'required',
    //     ]);

    //     $pesanan = new Pesanan;
    //     $pesanan->user_id = $request->user_id;
    //     $pesanan->tanggal = $request->tanggal;
    //     $pesanan->status = $request->status;
    //       $pesanan->kode = $request->kode;
    //     $pesanan->jumlah_harga = $request->jumlah_harga;
    //     $pesanan->save();
    //     return redirect()->route('pesanan.index');

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pesanan = Pesanan::findOrFail($id);
        // $pesanan->delete();
        // return redirect()->route('pesanana.index');

        if (!Pesanan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('pesanan.index');

    }
}
