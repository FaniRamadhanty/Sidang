@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i> Check Out</h3>
                @if (!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                    <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    <td>
                                        <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin menghapus ini?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"  onclick="return confirm('Apakah anda yakin akan check-out?')">
                                        <i class="fa fa-shopping-basket"></i> Check Out</a>
                                </td>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
