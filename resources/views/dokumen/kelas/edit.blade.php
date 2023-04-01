@extends('dokumen.layout.layout')

@section('content')
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <!-- Navbar -->
    @include('dokumen.layout.navbar')

    <!-- Sidebar /-->
    @include('dokumen.layout.sidebar')
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit data</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dokumen')}}">Beranda</a></div>
              <div class="breadcrumb-item"><a href="{{url('/dokumen/kelas')}}">Data Kelas</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data Kelas</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('kelas.update',['id_kelas' => $kelas->id_kelas])}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('PUT')
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">

                      <div class="form-group">
                      <label>Id Guru</label>
                      <input type="text" name="id_guru" value="{{$kelas->id_guru}}" class="form-control" placeholder="Masukkan id Anda">
                    </div>
                      <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" value="{{$kelas->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" name="nama_kelas"
                      value="{{$kelas->nama_kelas}}" 
                      class="form-control" placeholder="Masukkan Nama Kelas Anda">
                    </div>

                    <div class="card-footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Submit</button>
                      <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                    </form>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
     <!--footer-->
    @include('dokumen.layout.footer')
    </div>
  </div>
  @endsection 
  