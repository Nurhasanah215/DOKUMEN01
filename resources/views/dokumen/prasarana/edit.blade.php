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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/prasarana')}}">Data Prasarana</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data Prasarana</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('prasarana.update',['id_prasarana' => $prasarana->id_prasarana])}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('PUT')
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">

                      <div class="form-group">
                      <label>Id Guru</label>
                      <input type="text" name="id_guru" value="{{$prasarana->id_guru}}" class="form-control" placeholder="Masukkan id Anda">
                    </div>
                      <div class="form-group">
                      <label>Nama Prasarana</label>
                      <input type="text" name="nama_prasarana" value="{{$prasarana->nama_prasarana}}" class="form-control" placeholder="Masukkan Nama Prasarana Anda">
                    </div>
                     <div class="form-group">
                      <label>SK Prasarana</label>
                      <input type="file" name="sk_prasarana"
                      class="form-control" placeholder="Masukkan sk_prasaranaAnda">
                      <images src="{{ url('storage/prasarana/'.$prasarana->sk_prasarana) }}"widh="200px" height="100px">
                    </div>
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar"
                      class="form-control" placeholder="Masukkan gambarAnda">
                      <images src="{{ url('storage/prasarana/'.$prasarana->gambar) }}"widh="200px" height="100px">
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
  