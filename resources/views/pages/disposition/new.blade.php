@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Disposisi Untuk Surat {{$data->letter_no}}</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Disposisi Surat</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
{{ html()->form('POST', route('disposition.store'))->attribute('enctype', 'multipart/form-data')->open() }}
  {{ html()->hidden('in_letter_id', $data->id) }}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $data->letter_no }}</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            {{ html()->label('Disposisikan Kepada', 'employee_id')->class('form-label') }}
            {{ html()->select('employee_id', ['' => 'Pilih Karyawan'] + $employees)
                ->class('form-control')
              }}
          </div>
          <div class="form-group">
            {{ html()->label('Instruksi', 'instruction')->class('form-label') }}
            {{ html()->input('text', 'instruction')
              ->class('form-control')->attribute('required', true)
              ->attribute('placeholder', 'Isikan no instruksi') }}
          </div>
          <div class="form-group">
            <a href="/storage/{{ $data->attachment }}">Download Surat</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="{{ route('in.index') }}" class="btn btn-default">Kembali</a>
        {{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
      </div>
    </div>
  </div>
{{ html()->form()->close() }}
@endsection