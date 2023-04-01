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
              <div class="breadcrumb-item"><a href="{{url('/dokumen/siswa')}}">Data Siswa</a></div>
              <div class="breadcrumb-item">Edit Data</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data siswa</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('siswa.update',['id_siswa' => $siswa->id_siswa])}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('PUT')
                      {{csrf_field()}}
                      <input type="hidden" value="PUT" name="_method">
                      <div class="form-group">
                      <label>NISN</label>
                      <input type="text" name="nisn" value="{{$siswa->nisn}}" class="form-control" placeholder="Masukkan Nuptk Anda">
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama_lengkap"
                      value="{{$siswa->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Anda">
                    </div>
                     <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat"
                      value="{{$siswa->alamat}}" 
                      class="form-control" placeholder="Masukkan Alamat Anda">
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="jk" name="jk" required 
                         placeholder="Masukkan jk Anda">
                          <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                          <option value="Laki-laki" {{$siswa->jk == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                          <option value="Perempuan" {{$siswa->jk == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                          </select>
                          @if ($errors->has('jk'))
                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                         <select onblur="onSelect()" class="form-select" aria-label="Default select example" id="id_kelas" name="id_kelas" required 
                         placeholder="Masukkan kelas Anda">
                          <option value="Masukkan Pilihan Anda">Masukkan Pilihan Anda</option>
                          @foreach($kelas as $kl)
                          <option value="<?= $kl->id_kelas ?>" {{ $kl->id_kelas == $siswa->id_kelas ? 'selected' : ''}}>{{$kl->nama_kelas}}</option>
                          @endforeach
                          </select>
                          @if ($errors->has('jk'))
                      <span class="text-danger">{{ $errors->first('jk') }}</span>
                      @endif
                    </div>
                   
                     <div class="form-group">
                      <label>No HP</label>
                      <input type="text" name="no_hp"
                      value="{{$siswa->no_hp}}" 
                      class="form-control" placeholder="Masukkan No HP Anda">
                    </div>
                    <div class="form-group">
                      <label>Skl Siswa</label>
                      <input type="file" name="skl_siswa"
                      class="form-control" placeholder="Masukkan SKL Anda">
                      <images src="{{ url('storage/siswa/'.$siswa->skl_siswa) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>Pip Siswa</label>
                      <input type="file" name="pip_siswa"
                      class="form-control" placeholder="Masukkan pip_siswa Anda">
                      <images src="{{ url('storage/siswa/'.$siswa->pip_siswa) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>KK</label>
                      <input type="file" name="kk"
                      class="form-control" placeholder="Masukkan Kk Anda">
                      <images src="{{ url('storage/siswa/'.$siswa->kk) }}"widh="200px" height="100px">
                    </div>
                     <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar"
                      class="form-control" placeholder="Masukkan gambar Anda">
                      <images src="{{ url('storage/siswa/'.$siswa->gambar) }}"widh="200px" height="100px">
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
  