@extends('admin')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Pesanan Detail</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/') }}" class="btn btn-outline-info">Kembali</a>
                         {{-- <a
                            href="{{ route('pesanan_detail.create') }}"
                            class="btn btn-sm btn-outline-primary float-right">Tambah
                            Pesanan Detail</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Barang</th>
                                    <th>Pemesan</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Harga</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($pesanan_detail as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->barang->nama_barang }}</td>
                                        <td>{{ $data->pesanan->user_id }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>{{ $data->jumlah_harga }}</td>
                                        {{-- <td>
                                            <form action="{{ route('pesanan_detail.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                {{-- <a href="{{ route('pesanan_detail.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a> --}}
                                                {{-- <a href="{{ route('barang.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a> --}}
                                                {{-- <button type="submit"
                                                    class="btn btn-outline-danger delete-confirm">Hapus</button>

                                            </form>
                                        </td> --}} 
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
