<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan_detail = PesananDetail::all();

        return view('pesanan_detail.index', compact('pesanan_detail'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pesanan_detail.create');

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
    //         'barang_id' => 'required',
    //         'pesanan_id' => 'required',
    //         'jumlah' => 'required',
    //         'jumlah_harga' => 'required',
    //     ]);

    //     $pesanan_detail = new PesananDetail;
    //     $pesanan_detail->barang_id = $request->barang_id;
    //     $pesanan_detail->pesanan_id = $request->pesanan_id;
    //     $pesanan_detail->jumlah = $request->jumlah;
    //     $pesanan_detail->jumlah_harga = $request->jumlah_harga;
    //     $pesanan_detail->save();
    //     return redirect()->route('pesanan_detail.index');

    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pesanan_detail = PesananDetail::find($id);
        // return view('pesanan_detail.edit')->with(compact('pesanan_detail'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'barang_id' => 'required',
    //         'pesanan_id' => 'required',
    //         'jumlah' => 'required',
    //         'jumlah_harga' => 'required',
    //     ]);

    //     $pesanan_detail = new PesananDetail;
    //     $pesanan_detail->barang_id = $request->barang_id;
    //     $pesanan_detail->pesanan_id = $request->pesanan_id;
    //     $pesanan_detail->jumlah = $request->jumlah;
    //     $pesanan_detail->jumlah_harga = $request->jumlah_harga;
    //     $pesanan_detail->save();
    //     return redirect()->route('pesanan_detail.index');

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesananDetail  $pesananDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pesanan_detail = PesananDetail::findOrFail($id);
        // $pesanan_detail->delete();
        // return redirect()->route('pesanan_detail.index');

        if (!PesananDetail::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('pesanan_detail.index');

    }
}
