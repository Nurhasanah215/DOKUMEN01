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
            <h1>Data Guru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Guru</a></div>
              <div class="breadcrumb-item">Data Guru</div>
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
                     <a type="button" class="btn btn-success" href="/dokumen/guru/create" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy fa fa-plus" aria-hidden="true">
                  </i> Tambah Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>NUPTK</th>
                          <th>Nama Lengkap</th>
                           <th>JK</th>
                          <th>Status Sertifikasi</th>
                           <th>Tgl Sertifikasi</th>
                           <th>Aksi</th>
                        </tr>
                        @foreach($guru as $index => $data)
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$data ->nuptk}}</td>
                          <td>{{$data ->nama_lengkap}}</td>
                          <td>{{$data ->jk}}</td>
                          <td>{{$data ->status_sertifikasi}}</td>
                          <td>{{$data ->tgl_sertifikasi}}</td>
                        
                        
                          
                        <td>
                          <form method="POST" action="{{route('guru.delete', ['id_guru' => $data->id_guru])}}">
                                <a class="btn btn-warning btn-sm" href="{{route('guru.edit', ['id_guru' => $data->id_guru])}}" data-color="#ffffff"><i class="icon-copy fa fa-pen" aria-hidden="true"></i></a>
                                <a class="btn btn-info btn-sm" href="{{route('guru.detail', ['id_guru' => $data->id_guru])}}" data-color="#ffffff"><i class="icon-copy fa fa-eye" aria-hidden="true"></i></a>
                                 @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm tn-flat show_confirm" data-color="#ffffff" onclick="return confirm('Yakin ingin menghapus data ini ?')" data-toggle="tooltip"><i class="icon-copy fa fa-trash" aria-hidden="true"></i>
                                </button>
                        </form>
                        </td>
                      </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
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