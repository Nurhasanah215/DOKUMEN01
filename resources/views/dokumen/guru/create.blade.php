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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/guru')}}">Data Guru</a></div>
              <div class="breadcrumb-item">Tambah Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Data Guru</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label>NUPTK</label>
                      <input type="text" name="nuptk" class="form-control" placeholder="Masukkan Nuptk Anda">
                      @if ($errors->has('nuptk'))
                      <span class="text-danger">{{ $errors->first('nuptk') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="jk" name="jk" required 

                         placeholder="Masukkan Nama Lengkap Anda">
                          <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                          </select>
                          @if ($errors->has('jk'))
                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Status Sertifikasi</label>
                      <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="status_sertifikasi" name="status_sertifikasi" required 

                       placeholder="Masukkan Nama Lengkap Anda">
                       <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                      </select>
                      @if ($errors->has('status_sertifikasi'))
                      <span class="text-danger">{{ $errors->first('status_sertifikasi') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Tgl Sertikasi</label>
                      <input type="date" name="tgl_sertifikasi" class="form-control" placeholder="Masukkan tgl sertifikasi Anda">
                      @if ($errors->has('tgl_sertifikasi'))
                      <span class="text-danger">{{ $errors->first('tgl_sertifikasi') }}</span>
                      @endif
                    </div>
                    {{-- <div class="form-group">
                      <label>SK Guru</label>
                      <input type="file" name="gambar" class="form-control" placeholder="Masukkan SK Anda">
                      @if ($errors->has('sk_guru'))
                      <span class="text-danger">{{$errors->first('sk_guru')}}</span>
                      @endif
                    </div> --}}
                     <div class="form-group">
                      <label>SK Guru</label>
                      <input type="file" name="sk_guru" class="form-control" placeholder="Masukkan SK Anda">
                      @if ($errors->has('sk_guru'))
                      <span class="text-danger">{{$errors->first('sk_guru')}}</span>
                      @endif
                    </div>
                     <div class="form-group">
                      <label>Ijazah</label>
                      <input type="file" name="ijazah" class="form-control" placeholder="Masukkan Ijazah Anda">
                      @if ($errors->has('ijazah'))
                      <span class="text-danger">{{$errors->first('ijazah')}}</span>
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
                      <label>KTP</label>
                      <input type="file" name="ktp" class="form-control" placeholder="Masukkan ktp Anda">
                      @if ($errors->has('ktp'))
                      <span class="text-danger">{{$errors->first('ktp')}}</span>
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