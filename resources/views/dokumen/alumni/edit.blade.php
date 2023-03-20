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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/alumni')}}">Data Alumni</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data Alumni</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('alumni.update',['id_alumni' => $alumni->id_alumni])}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">
                      <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" value="{{$alumni->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                      <label>No Ijazah</label>
                      <input type="text" name="no_ijazah"
                      value="{{$alumni->no_ijazah}}" class="form-control" placeholder="Masukkan No Ijazah Anda">
                    </div>
                    <div class="form-group">
                      <label>Ijazah</label>
                      <input type="file" name="ijazah"
                      class="form-control" placeholder="Masukkan SK Anda">
                      <images src="{{ url('storage/alumni/'.$alumni->ijazah) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>Ijazah</label>
                      <input type="file" name="ijazah"
                      class="form-control" placeholder="Masukkan Ijazah Anda">
                      <images src="{{ url('storage/alumni/'.$alumni->ijazah) }}"widh="200px" height="100px">
                      </images>
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
  