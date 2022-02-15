@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-md-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                    
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $barang->nama_barang }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ $barang->image() }}" class="rounded mx-auto d-block" width="100%" alt="">
                            </div>
                            <div class="col-md-6 mt-5">
                                <h3>{{ $barang->nama_barang }}</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td> Rp. {{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ $barang->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $barang->keterangan }}</td>
                                        </tr>

                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{  url('pesan') }}/{{ $barang->id }}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesan" class="form-control"
                                                        required="">
                                                    <button type="submit" class="btn btn-primary mt-2"><i
                                                            class="fa fa-shopping"></i>Masukan Keranjang</button>
                                                </form>
                                            </td>
                                        </tr>
                                        </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
