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
            <h1>Detail Alumni</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Alumni</a></div>
              <div class="breadcrumb-item">Detail Alumni</div>
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
                        
                          <td>Nama Lengkap</td>
                          <td>{{$alumni ->nama_siswa}}</td>
                        </tr>
                        <tr>
                          <td>Tahun</td>
                          <td>{{$alumni ->tahun}}</td>
                        </tr>
                        <tr>
                          <td>No Ijazah</td>
                          <td>{{$alumni ->no_ijazah}}</td>
                        </tr>
                        
                      </table>
                      <div class="row">
                       
                        <div class="col-3">
                          <h4>Ijazah</h4>
                        <img src="{{ url('public/dokumen/'.$alumni->ijazah) }}" alt="" width="40%">
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                     <a type="button" class="btn btn-dark" href="/dokumen/alumni/" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy " aria-hidden="true">
                  </i> Back</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      @include('dokumen.layout.footer')

    </div>
  </div>
  @endsection