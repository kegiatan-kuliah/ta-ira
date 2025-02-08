@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Surat Masuk</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Surat Masuk</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Surat Masuk</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary">
          <i class="fas fa-plus"></i> Tambah Surat Masuk
        </button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Nomor Surat</th>
            <th>Pengirim</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th style="width: 50px"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td>1</td>
              <td>001/FIN/2025</td>
              <td>PT Maju Jaya</td>
              <td>2025-02-03</td>
              <td>2025-02-04</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fas fa-user"></i></button>
                  <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
              </td>
          </tr>
          <tr>
              <td>2</td>
              <td>002/FIN/2025</td>
              <td>Bank Nagari</td>
              <td>2025-02-03</td>
              <td>2025-02-04</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fas fa-user"></i></button>
                  <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
              </td>
          </tr>
          <tr>
              <td>3</td>
              <td>003/IT/2025</td>
              <td>PT Teknologi Nusantara</td>
              <td>2025-02-05</td>
              <td>2025-02-06</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fas fa-user"></i></button>
                  <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
              </td>
          </tr>
          <tr>
              <td>4</td>
              <td>004/MKT/2025</td>
              <td>CV Digital Media</td>
              <td>2025-02-07</td>
              <td>2025-02-08</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fas fa-user"></i></button>
                  <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
              </td>
          </tr>
          <tr>
              <td>5</td>
              <td>005/ADM/2025</td>
              <td>PT Sentosa Abadi</td>
              <td>2025-02-07</td>
              <td>2025-02-08</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fas fa-user"></i></button>
                  <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
              </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection