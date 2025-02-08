@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Tambah Surat Masuk</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Tambah Surat Masuk</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Surat Masuk</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Nomor Surat</label>
            <input type="text" name="" id="" placeholder="Masukan Nomor Surat" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Pengirim</label>
            <input type="text" name="" id="" placeholder="Masukan Pengirim" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="" id="" placeholder="Masukan Keterangan" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Tanggal Surat</label>
            <input type="text" name="" id="" placeholder="Masukan Tanggal Surat" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Tanggal Diterima</label>
            <input type="text" name="" id="" placeholder="Masukan Tanggal Diterima" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Ringkasan</label>
            <textarea name="" id="" placeholder="Tuliskan Ringkasan" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Jenis Surat</label>
            <select name="" id="" class="form-control">
              <option value="">Pilih Jenis Surat</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Lampiran</label>
            <input type="file" name="" id="" class="form-control">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <button type="button" class="btn">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
@endsection