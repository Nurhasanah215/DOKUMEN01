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
            <h1>Data Alumni</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Alumni</a></div>
              <div class="breadcrumb-item">Data Alumni</div>
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
                     <a type="button" class="btn btn-success" href="/dokumen/alumni/create" data-bgcolor="#00b489" data-color="#ffffff"><i class="icon-copy fa fa-plus" aria-hidden="true">
                  </i> Tambah Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Tahun</th>
                           <th>No Ijazah</th>
                          <th>Ijazah</th>
                           <th>Aksi</th>
                        </tr>
                        @foreach($alumni as $index => $data)
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$data ->nama_siswa}}</td>
                          <td>{{$data ->tahun}}</td>
                          <td>{{$data ->no_ijazah}}</td>
                          <td>{{$data ->ijazah}}</td>
                        <td>
                          <form method="POST" action="{{route('alumni.delete', ['id_alumni' => $data->id_alumni])}}">
                                <a class="btn btn-warning btn-sm" href="{{route('alumni.edit', ['id_alumni' => $data->id_alumni])}}" data-color="#ffffff"><i class="icon-copy fa fa-pen" aria-hidden="true"></i></a>
                                 <a class="btn btn-info btn-sm" href="{{route('alumni.detail', ['id_alumni' => $data->id_alumni])}}" data-color="#ffffff"><i class="icon-copy fa fa-eye" aria-hidden="true"></i></a>
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