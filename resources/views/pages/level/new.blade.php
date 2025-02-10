@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Sifat Surat</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Sifat Surat</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
{{ html()->form('POST', route('level.store'))->open() }}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Sifat Surat</h3>

      <div class="card-tools">
        
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        {{ html()->label('Nama', 'name')->class('form-label') }}
        {{ html()->input('text', 'name')
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan nama') }}
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="{{ route('level.index') }}" class="btn btn-default">Kembali</a>
        {{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
      </div>
    </div>
  </div>
{{ html()->form()->close() }}
@endsection