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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/alumni')}}">Data Alumni</a></div>
              <div class="breadcrumb-item">Tambah Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Data Alumni</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('alumni.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>Siswa</label>
                           <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="id_siswa" name="id_siswa" required 
                           placeholder="Masukkan siswa Anda">
                            <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                            @foreach($siswa as $sw)
                            <option value="<?= $sw->id_siswa ?>">{{$sw->nama_lengkap}}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('id_siswa'))
                        <span class="text-danger">{{ $errors->first('id_siswa') }}</span>
                        @endif
                      </div>
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="text" name="tahun" class="form-control" placeholder="Masukkan Tahun Kelulusan Anda">
                    </div>
                     <div class="form-group">
                      <label>No Ijazah</label>
                      <input type="text" name="no_ijazah" class="form-control" placeholder="Masukkan Nama No Ijazah Anda">
                      @if ($errors->has('no_ijazah'))
                      <span class="text-danger">{{$errors->first('no_ijazah')}}</span>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <label>Ijazah</label>
                      <input type="file" name="ijazah" class="form-control" placeholder="Masukkan Ijazah Anda">
                      @if ($errors->has('ijazah'))
                      <span class="text-danger">{{$errors->first('ijazah')}}</span>
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