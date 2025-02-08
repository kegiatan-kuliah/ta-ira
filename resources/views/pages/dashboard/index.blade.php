@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Home Page</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <!-- <li class="breadcrumb-item active">Dashboard Page</li> -->
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>2</h3>

          <p>Surat Masuk</p>
        </div>
        <div class="icon">
          <i class="fas fa-inbox"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>2</h3>

          <p>Surat Keluar</p>
        </div>
        <div class="icon">
          <i class="fas fa-paper-plane"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>2</h3>

          <p>Agenda</p>
        </div>
        <div class="icon">
          <i class="fas fa-book"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</div>
@endsection