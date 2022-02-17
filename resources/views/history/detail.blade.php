@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-">
            <div class="col-md-12">
                <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Sukses Check Out</h3>
                        <h5>Pesanan anda sudah sukses dicheck-out selanjutnya untuk pembayaran silahkan transfer ke rekening
                            <strong>Bank BCA Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp.
                                {{ number_format($pesanan->jumlah_harga) }}</strong></h5>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                        @if (!empty($pesanan))
                            <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
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
                                            <td>
                                                <img src="{{ $pesanan_detail->barang->image() }}" width="100" alt="...">
                                            </td>
                                            <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                            <td>{{ $pesanan_detail->jumlah }} buah</td>
                                            <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                            <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                        <td><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga) }}</strong></td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                        <td><strong>{{ $pesanan->kode}}</strong></td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                        <td><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga) }}</strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>


     <div class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Donasi</h2>
            </div>
            <div class="row">

                        {{-- <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <div class="info">
                                    <form action="{{ route('storeDonasi') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""><b>Nama Donatur</b></label>
                                            <input type="text" name="nm_donatur"
                                                class="form-control @error('nm_donatur') is-invalid @enderror">
                                            @error('nm_donatur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for=""><b>Email</b></label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>No Telepon</b></label>
                                            <input type="number" name="telepon"
                                                class="form-control @error('telepon') is-invalid @enderror">
                                            @error('telepon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <label for=""><b>Tanggal</b></label>
                                            <input type="date" name="tanggal"
                                                class="form-control @error('tanggal') is-invalid @enderror">
                                            @error('tanggal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        <br>
                                        <div class="form-group">
                                            <label for=""><b>Nominal</b></label>
                                            <input type="number" name="nominal" placeholder="Rp. "
                                                class="form-control @error('nominal') is-invalid @enderror">
                                            @error('nominal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for=""><b>Keterangan</b></label>
                                            <textarea name="keterangan" rows="3"
                                                placeholder="(-- Pesan atau do'a yang akan disampaikan --)"
                                                class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                            @error('keterangan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for=""><b>Foto Bukti Transfer</b></label>
                                            <input type="file" name="cover"
                                                class="form-control @error('cover') is-invalid @enderror">
                                            @error('cover')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-outline-primary" style="background:#5cb874; border-color: #5cb874; color: white;">KIRIM</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

                            <div class="col-lg-5 d-flex align-items-stretch" style="height: 366px">
                                <div class="info" style="background:#5cb87525">
                                            <table class="table">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Bank</th>
                                                    <th>Rekening</th>
                                                    <th>Atas Nama</th>
                                                    <th>Link Internet Bangking</th>
                                                </tr>
                                                <tr>
                                                    <th>1</th>
                                                    <td>BCA</td>
                                                    <td>2828 555 222</td>
                                                    <td>YAYASAN PONDOK YATIM</td>
                                                    <td><a href="https://www.klikbca.com/">Klik disini</a></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>BSI</td>
                                                    <td>7666666617</td>
                                                    <td>PONDOK YATIM</td>
                                                    <td><a href="https://bsinet.bankbsi.co.id/cms/index.php">Klik disini</a></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>Mandiri</td>
                                                    <td>132 004 118 5555</td>
                                                    <td>YAY PONDOK YATIM</td>
                                                    <td><a href="https://ibank.bankmandiri.co.id/retail3/">Klik disini</a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
        </div>
@endsection
