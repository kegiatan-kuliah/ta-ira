@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Karyawan</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Karyawan</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
{{ html()->form('POST', route('employee.store'))->open() }}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Karyawan</h3>
    </div>
    <div class="card-body">
      <div class="mb-3">
        {{ html()->label('Nama', 'name')->class('form-label') }}
        {{ html()->input('text', 'name')
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan nama') }}
      </div>
      <div class="mb-3">
        {{ html()->label('NIP', 'identity_no')->class('form-label') }}
        {{ html()->input('number', 'identity_no')
          ->class('form-control')->attribute('required', true)
          ->attribute('min', 1)
          ->attribute('placeholder', 'Isikan nip') }}
      </div>
      <div class="mb-3">
        {{ html()->label('Golongan', 'rank')->class('form-label') }}
        {{ html()->input('text', 'rank')
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan golongan') }}
      </div>
      <div class="mb-3">
        {{ html()->label('No Hp', 'phone_no')->class('form-label') }}
        {{ html()->input('text', 'phone_no')
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan no hp') }}
      </div>
      <div class="mb-3">
        {{ html()->label('Email', 'email')->class('form-label') }}
        {{ html()->input('email', 'email')
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan email') }}
      </div>
      <div class="mb-3">
        {{ html()->label('Jabatan', 'role')->class('form-label') }}
        {{ html()->select('role', ['' => 'Pilih Jabatan', 'staff' => 'Staff', 'kabag' => 'Kabag', 'wakil dekan' => 'Wakil Dekan', 'dekan' => 'Dekan'])
            ->class('form-control')
            ->attribute('required', true) }}
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="{{ route('employee.index') }}" class="btn btn-default">Kembali</a>
        {{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
      </div>
    </div>
  </div>
{{ html()->form()->close() }}
@endsection