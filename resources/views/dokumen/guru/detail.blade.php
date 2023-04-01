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
            <h1>Detail Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Guru</a></div>
              <div class="breadcrumb-item">Detail Guru</div>
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
                          <td>NUPTK</td>
                          <td>{{$guru ->nuptk}}</td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td>{{$guru ->nama_lengkap}}</td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>{{$guru ->jk}}</td>
                        </tr>
                        <tr>
                          <td>Status Sertifikasi</td>
                          <td>{{$guru ->status_sertifikasi}}</td>
                        </tr>
                        <tr>
                          <td>Tanggal Sertifikasi</td>
                          <td>{{$guru ->tgl_sertifikasi}}</td>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-3">
                          <h4>SK Guru</h4>
                        <img src="{{ url('public/dokumen/'.$guru->sk_guru) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>Ijazah</h4>
                        <img src="{{ url('public/dokumen/'.$guru->ijazah) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>KK</h4>
                        <img src="{{ url('public/dokumen/'.$guru->kk) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>KTP</h4>
                        <img src="{{ url('public/dokumen/'.$guru->ktp) }}" alt="" width="40%">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                     <a type="button" class="btn btn-dark" href="/dokumen/guru/" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy " aria-hidden="true">
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