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
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">
                      <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" value="{{$kelas->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                   <div class="form-group">
                      <label>Kelas</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="nama_kelas" name="jk" required placeholder="Masukkan Nama Lengkap Anda">
                          <option value="Masukkan Kelas Anda">Masukkan Kelas Anda</option>
                          <option value="IPA 1">IPA 1</option>
                          <option value="IPA 2">IPA 2</option>
                          <option value="IPA 3">IPA 3</option>
                          <option value="IPS 1">IPS 1</option>
                          <option value="IPS 2">IPS 2</option>
                          <option value="IPS 3">IPS 3</option>
                          </select>
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
  