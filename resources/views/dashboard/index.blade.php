@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ url('/') }}" class="btn btn-outline-info">Beranda</a>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fw fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Barang</span>
                    <span class="info-box-number">
                        <h3><b>{{ DB::table('barangs')->count() }}</b></h3>
                    </span>
                    <span class="info-box-content">
                        <a href="{{ route('barang.index') }}" class="text-right">Lihat Detail</a>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-fw fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Pesanan</span>
                    <span class="info-box-number">
                        <h3><b>{{ DB::table('pesanans')->count() }}</b></h3>
                    </span>
                    <span class="info-box-content">
                        <a href="{{ route('pesan.index') }}" class="text-right">Lihat Detail</a>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
             <span class="info-box-icon bg-success elevation-1"><i class="fas fa-fw fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Pesanan Detail</span>
                    <span class="info-box-number">
                        <h3><b>{{ DB::table('pesanan_details')->count() }}</b></h3>
                    </span>
                    <span class="info-box-content">
                        <a href="{{ route('pesanan_detail.index') }}" class="text-right">Lihat Detail</a>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       

        <!-- Main row -->
    
    </section>
@endsection

@section('css')

@endsection


@section('js')
@endsection
