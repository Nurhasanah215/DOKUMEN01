@extends('dokumen.layout.layout')

@section('content')
<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>


      @include('dokumen.layout.navbar')

      @include('dokumen.layout.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Kelas</a></div>
              <div class="breadcrumb-item">Detail Kelas</div>
            </div>
          </div>

          <div class="section-body">

          @if (session('success'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
             {{ session('success') }}
            </div>
          </div>
          @endif
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                  
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <td>Id Guru</td>
                          <td>{{$kelas ->id_guru}}</td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td>{{$kelas ->nama_lengkap}}</td>
                        </tr>
                        <tr>
                          <td>Kelas</td>
                          <td>{{$kelas ->nama_kelas}}</td>
                        </tr>
                        </table>
                         </div>
                   
                  
                  <div class="card-footer text-right">
                     <a type="button" class="btn btn-dark" href="/dokumen/kelas/" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy " aria-hidden="true">
                  </i> Back</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
           
        </section>
     
      @include('dokumen.layout.footer')

    </div>
  </div>
  @endsection