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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/siswa')}}">Data Siswa</a></div>
              <div class="breadcrumb-item">Tambah Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Data Siswa</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('siswa.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label>NISN</label>
                      <input type="text" name="nisn" class="form-control" placeholder="Masukkan nisn Anda">
                      @if ($errors->has('nisn'))
                      <span class="text-danger">{{ $errors->first('nisn') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Anda">
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="jk" name="jk" required 
                         placeholder="Masukkan jk Anda">
                          <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                          </select>
                          @if ($errors->has('jk'))
                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="id_kelas" name="id_kelas" required 
                         placeholder="Masukkan jk Anda">
                          <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                          @foreach($kelas as $kl)
                          <option value="<?= $kl->id_kelas ?>">{{$kl->nama_kelas}}</option>
                          @endforeach
                          </select>
                          @if ($errors->has('jk'))
                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>No Hp</label>
                      <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Hp Anda">
                    </div>
                    
                      <div class="form-group">
                      <label>Skl Siswa</label>
                      <input type="file" name="skl_siswa" class="form-control" placeholder="Masukkan skl Anda">
                      @if ($errors->has('skl_siswa'))
                      <span class="text-danger">{{$errors->first('skl_siswa')}}</span>
                      @endif
                    </div>

                     <div class="form-group">
                      <label>Pip siswa</label>
                      <input type="file" name="pip_siswa" class="form-control" placeholder="Masukkan Pip Anda">
                      @if ($errors->has('pip_siswa'))
                      <span class="text-danger">{{$errors->first('pip_siswa')}}</span>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <label>KK</label>
                      <input type="file" name="kk" class="form-control" placeholder="Masukkan kk Anda">
                      @if ($errors->has('kk'))
                      <span class="text-danger">{{$errors->first('kk')}}</span>
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