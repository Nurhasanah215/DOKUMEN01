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
            <h1>Tambah data</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dokumen')}}">Beranda</a></div>
              <div class="breadcrumb-item"><a href="{{url('/dokumen/kelas')}}">Data Kelas</a></div>
              <div class="breadcrumb-item">Tambah Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Data Kelas</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('kelas.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                     
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                      <label>Guru</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="id_guru" name="id_guru" required placeholder="Masukkan Nama Lengkap Anda">
                          <option value="Masukkan Kelas Anda">Masukkan Kelas Anda</option>
                          @foreach($kelas as $kl)
                          <option value="<?= $kl->id_guru ?>">{{$kl->nama_lengkap}}</option>
                          @endforeach
                          </select>
                          @if ($errors->has('id_guru'))
                          <span class="text-danger">{{ $errors->first('id_guru') }}</span>
                          @endif
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="nama_kelas" name="nama_kelas" required placeholder="Masukkan Nama Lengkap Anda">
                          <option value="Masukkan Kelas Anda">Masukkan Kelas Anda</option>
                          <option value="IPA 1">IPA 1</option>
                          <option value="IPA 2">IPA 2</option>
                          <option value="IPA 3">IPA 3</option>
                          <option value="IPS 1">IPS 1</option>
                          <option value="IPS 2">IPS 2</option>
                          <option value="IPS 3">IPS 3</option>
                          </select>
                           @if ($errors->has('nama_kelas'))
                      <span class="text-danger">{{ $errors->first('nama_kelas') }}</span>
                      @endif
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