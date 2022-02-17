@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard 

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
                            <table class="table" id="pesanan_detail">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Barang</th>
                                    <th>Pemesan</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Harga</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                                </thead>
                                @php $no=1; @endphp
                                <tbody>
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
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection


@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pesanan_detail').DataTable();
        });
    </script>
    {{-- <script>
        $(".delete-confirm").click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script> --}}


@endsection
