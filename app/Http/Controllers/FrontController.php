<?php

namespace App\Http\Controllers;
use App\models\Barang;

use Illuminate\Http\Request;

class FrontController extends Controller
{
     public function tampil()
    {
        $barangs = Barang::all();
        return view('tampilan', compact('barangs'));
    }
}
