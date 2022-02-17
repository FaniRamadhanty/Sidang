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
                        <a href="{{ url('/') }}" class="btn btn-outline-warning ">Beranda</a>
                        <a href="{{ route('barang.create') }}" class="btn btn-outline-secondary ">Tambah
                            Barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="barangs">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Barang</th>
                                        <th>Cover</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php $no=1; @endphp
                                <tbody>
                                    @foreach ($barangs as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td><img src="{{ $data->image() }}" alt="" style="width:150px; height:150px;"
                                                    alt="Cover"></td>
                                            <td>{{ $data->harga }}</td>
                                            <td>{{ $data->stok }}</td>
                                            <td>{!! $data->keterangan !!}</td>
                                            <td>
                                                <form action="{{ route('barang.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('barang.edit', $data->id) }}"
                                                        class="btn btn-outline-info">Edit</a>
                                                    {{-- <a href="{{ route('barang.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a> --}}
                                                    <button type="submit"
                                                        class="btn btn-outline-danger delete-confirm">Hapus</button>
                                                </form>
                                            </td>
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
            $('#barangs').DataTable();
        });
    </script>
    <script>
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
    </script>
    @include('sweetalert::alert')

@endsection
