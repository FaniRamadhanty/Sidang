
@extends('admin')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Buku</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
       <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Buku</div>
                <div class="card-body">
                   <form action="{{route('barang.update',$barangs->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$barangs->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Produk</label>
                            <br>
                            <img src="{{ $barangs->image() }}" height="75" style="padding:10px;" />
                            <input type="file" name="cover" class="form-control">
                        </div>
                          <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" value="{{$barangs->harga}}" class="form-control @error('harga') is-invalid @enderror">
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                          <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" name="stok" value="{{$barangs->stok}}" class="form-control @error('stok') is-invalid @enderror">
                             @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                          <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" value="{{$barangs->keterangan}}" class="form-control @error('keterangan') is-invalid @enderror">
                             @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

