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
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Guru</h4>
                  </div>
                  <div class="card-body">
                    28
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Siswa Baru</h4>
                  </div>
                  <div class="card-body">
                    140
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Alumni</h4>
                  </div>
                  <div class="card-body">
                    800
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-home"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Kelas</h4>
                  </div>
                  <div class="card-body">
                    6
                  </div>
                </div>
              </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Prasarana</h4>
                  </div>
                  <div class="card-body">
                    3
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