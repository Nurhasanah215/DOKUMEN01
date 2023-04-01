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
            <h1>Detail Siswa</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Siswa</a></div>
              <div class="breadcrumb-item">Detail Siswa</div>
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
                          <td>Id Alumni</td>
                          <td>{{$siswa ->id_alumni}}</td>
                        </tr>
                        <tr>
                          <td>NISN</td>
                          <td>{{$siswa ->nisn}}</td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td>{{$siswa ->nama_lengkap}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>{{$siswa ->alamat}}</td>
                        </tr>
                        <tr>
                          <td>JK</td>
                          <td>{{$siswa ->jk}}</td>
                        </tr>
                        <tr>
                          <td>No Hp</td>
                          <td>{{$siswa ->no_hp}}</td>
                        </tr>
                        
                      </table>
                      <div class="row">
                        <div class="col-3">
                          <h4>Skl Siswa</h4>
                        <img src="{{ url('public/dokumen/'.$siswa->skl_siswa) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>Pip Siswa</h4>
                        <img src="{{ url('public/dokumen/'.$siswa->pip_siswa) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>KK</h4>
                        <img src="{{ url('public/dokumen/'.$siswa->kk) }}" alt="" width="40%">
                        </div>
                        <div class="col-3">
                          <h4>Gambar</h4>
                        <img src="{{ url('public/dokumen/'.$siswa->gambar) }}" alt="" width="40%">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                     <a type="button" class="btn btn-dark" href="/dokumen/siswa/" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy " aria-hidden="true">
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