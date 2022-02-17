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
                            href="{{ route('pesan.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Pesanan</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pesanan" >
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>User ID</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                      <th>Kode</th>
                                    <th>Jumlah Harga</th>
                                </tr>
                                </thead>
                                @php $no=1; @endphp
                                <tbody>
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
            $('#pesanan').DataTable();
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
