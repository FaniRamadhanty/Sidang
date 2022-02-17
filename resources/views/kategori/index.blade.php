@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            @section('content')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ url('/') }}" class="btn btn-outline-warning ">Beranda</a>
                                    <a href="{{ route('kategori.create') }}" class="btn btn-outline-secondary ">Tambah
                                        Barang</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="pesanan">
                                            <thead>
                                                <tr>
                                                    <th>Nomor</th>
                                                    <th>Nama katgeori</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            @php $no=1; @endphp
                                            <tbody>
                                                @foreach ($kategori as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama_kategori }}</td>
                                                    <td><img src="{{ $data->image() }}" alt="" style="width:150px; height:150px;"
                                                    alt="Banner"></td>
                                                        <td>{{ $data->status }}</td>
                                                        <td>
                                                            <form action="{{ route('kategori.destroy', $data->id) }}"
                                                                method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <a href="{{ route('kategori.edit', $data->id) }}"
                                                                    class="btn btn-outline-info">Edit</a> 
                                                                {{-- <a href="{{ route('barang.show', $data->id) }}"
                                                                    class="btn btn-outline-warning">Show</a>  --}}
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
                        $('#pesanan').DataTable();
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


            @endsection

            <h1>Kategori</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ url('/') }}" class="btn btn-outline-info">Beranda</a>

            </ol>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
