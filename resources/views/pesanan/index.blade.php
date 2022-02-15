@extends('admin')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Pesanan</h1>
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
                            href="{{ route('pesan.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Pesanan</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nomor</th>
                                    <th>User ID</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Jumlah Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($pesanan as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->kode }}</td>
                                        <td>{{ $data->jumlah_harga }}</td>
                                        {{-- <td>
                                            <form action="{{ route('pesan.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                {{-- <a href="{{ route('pesan.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a> --}}
                                                {{-- <a href="{{ route('barang.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a> --}}
                                                {{-- <button type="submit" class="btn btn-outline-danger delete-confirm">Hapus</button>
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
