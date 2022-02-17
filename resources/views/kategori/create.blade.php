@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Dashboard

@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Buku</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Input addon -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Kategori</h3>
        </div>
        <div class="card-body">
            <h4>Nama</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username">
            </div>

            <h4>Banner</h4>
            <div class="input-group mb-12">
                <div class="input-group-prepend">
                  
                </div>
                <input type="file" class="form-control file" multiple data-max-file-count="3" placeholder="Username">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>







            <!-- /.card-body -->
        </div>
    @endsection

    @section('css')
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css">
    <style>
    .file-input{
        width:100%;
    }
    </style>

    @endsection


    @section('js')
        <script src="{{ asset('js/sweetalert2.js') }}"></script>
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

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            var konten = document.getElementById("keterangan");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
        

          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
    @endsection

