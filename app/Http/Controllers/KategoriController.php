<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kategori = Kategori::all();
        return view('kategori.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');

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
            'nama_kategori' => 'required',
            'banner' => 'required|image|max:2048',
            'status' => 'required',
        ]);

        
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
// upload image / foto
        // upload image / foto
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/kategori/', $name);
            $kategori->banner = $name;
        }
        $kategori->status = $request->status;
        $kategori->save();
        return redirect()->route('kategori.index' , compact('kategori'));

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $kategori = Kategori::findOrFail($id);
        
        return view('kategori.edit')->with(compact('kategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            'nama_kategori' => 'required',
            'status' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
// upload image / foto
        if ($request->hasFile('banner')) {
            $kategori->deleteImage();
            $image = $request->file('banner');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/kategori/', $name);
            $kategori->banner = $name;
        }
        $kategori->status = $request->status;
        $kategori->save();
        Alert::success('Success', 'Data edit successfully');

        return redirect()->route('kategori.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        if (!Kategori::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('kategori.index');

    }
}
