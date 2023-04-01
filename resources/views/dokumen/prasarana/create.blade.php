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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/prasarana')}}">Data Prasarana</a></div>
              <div class="breadcrumb-item">Tambah Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Data Prasarana</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('prasarana.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                     
                    
                    <div class="form-group">
                      <label>Guru</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="id_guru" name="id_guru" required placeholder="Masukkan Nama Lengkap Anda">
                          <option value="Masukkan prasarana Anda">Masukkan prasarana Anda</option>
                          @foreach($prasarana as $kl)
                          <option value="<?= $kl->id_guru ?>">{{$kl->nama_lengkap}}</option>
                          @endforeach
                          </select>
                          @if ($errors->has('id_guru'))
                          <span class="text-danger">{{ $errors->first('id_guru') }}</span>
                          @endif
                    </div>
                    <div class="form-group">
                      <label>Nama Prasarana</label>
                      <input type="text" name="nama_prasarana" class="form-control" placeholder="Masukkan Nama Prasarana Anda">
                    </div>
                     <div class="form-group">
                      <label>SK Prasarana</label>
                      <input type="file" name="sk_prasarana" class="form-control" placeholder="Masukkan SK Anda">
                      @if ($errors->has('sk_prasarana'))
                      <span class="text-danger">{{$errors->first('sk_prasarana')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar" class="form-control" placeholder="Masukkan gambar Anda">
                      @if ($errors->has('gambar'))
                      <span class="text-danger">{{$errors->first('gambar')}}</span>
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