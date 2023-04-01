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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/guru')}}">Data guru</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data Guru</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('guru.update',['id_guru' => $guru->id_guru])}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('PUT')
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">
                      <div class="form-group">
                      <label>NUPTK</label>
                      <input type="text" name="nuptk" value="{{$guru->nuptk}}" class="form-control" placeholder="Masukkan Nuptk Anda">
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap"
                      value="{{$guru->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Anda">
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                      <input type="text" name="jk"
                      value="{{$guru->jk}}" 
                      class="form-control" placeholder="Masukkan JK Anda">
                    </div>
                    <div class="form-group">
                      <label>Status Sertifikasi</label>
                      <input type="text" name="status_sertifikasi"
                      value="{{$guru->status_sertifikasi}}" 
                      class="form-control" placeholder="Masukkan Status Anda">
                    </div>
                     <div class="form-group">
                      <label>Tgl Sertifikasi</label>
                      <input type="date" name="tgl_sertifikasi"
                      value="{{$guru->tgl_sertifikasi}}" 
                      class="form-control" placeholder="Masukkan Tgl Sert Anda">
                    </div>
                    <div class="form-group">
                      <label>SK-Guru</label>
                      <input type="file" name="sk_guru"
                      class="form-control" placeholder="Masukkan SK Anda">
                      <images src="{{ url('storage/guru/'.$guru->sk_guru) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>Ijazah</label>
                      <input type="file" name="ijazah"
                      class="form-control" placeholder="Masukkan Ijazah Anda">
                      <images src="{{ url('storage/guru/'.$guru->ijazah) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>KK</label>
                      <input type="file" name="kk"
                      class="form-control" placeholder="Masukkan Kk Anda">
                      <images src="{{ url('storage/guru/'.$guru->kk) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>KTP</label>
                      <input type="file" name="ktp"
                      class="form-control" placeholder="Masukkan KTP Anda">
                      <images src="{{ url('storage/guru/'.$guru->ktp) }}"widh="200px" height="100px">
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
  