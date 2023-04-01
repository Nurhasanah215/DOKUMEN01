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
            <h1>Detail Prasarana</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Prasarana</a></div>
              <div class="breadcrumb-item">Detail Prasarana</div>
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
                          <td>{{$prasarana ->id_guru}}</td>
                        </tr>
                        <tr>
                          <td>Nama Prasarana</td>
                          <td>{{$prasarana ->nama_prasarana}}</td>
                        </tr>
                        <tr>
                          <td>SK Prasarana</td>
                          <td>{{$prasarana ->sk_prasarana}}</td>
                        </tr>
                        <tr>
                          <td>SK Prasarana</td>
                          <td>{{$prasarana ->sk_prasarana}}</td>
                        </tr>
                        </table>

                        <div class="row">
                        <div class="col-3">
                          <h4>SK Prasarana</h4>
                        <img src="{{ url('public/dokumen/'.$prasarana->sk_prasarana) }}" alt="" width="40%">
                        </div>
                         </div>

                         <div class="row">
                          <div class="col-3">
                          <h4>Gambar</h4>
                        <img src="{{ url('public/dokumen/'.$prasarana->gambar) }}" alt="" width="40%">
                        </div>
                      </div>
                    </div>
                  </div>
                   
                  
                  <div class="card-footer text-right">
                     <a type="button" class="btn btn-dark" href="/dokumen/prasarana/" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy " aria-hidden="true">
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