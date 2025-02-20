@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Tambah Surat Masuk Internal</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Tambah Surat Masuk Internal</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
{{ html()->form('POST', route('in.store'))->attribute('enctype', 'multipart/form-data')->open() }}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Surat Masuk Internal</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('No Surat', 'letter_no')->class('form-label') }}
            {{ html()->input('text', 'letter_no')
              ->class('form-control')->attribute('required', true)
              ->attribute('placeholder', 'Isikan no surat') }}
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('Tanggal Surat', 'letter_date')->class('form-label') }}
            {{ html()->input('text', 'letter_date')
              ->class('form-control datepicker')->attribute('required', true)
              ->attribute('placeholder', 'Isikan tanggal surat') }}
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('Lampiran', 'lampiran')->class('form-label') }}
            {{ html()->file('attachment')
								->class('form-control')->attribute('required', true) }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('Jenis Surat', 'category_id')->class('form-label') }}
            {{ html()->select('category_id', ['' => 'Pilih Jenis Surat'] + $categories->toArray())
                ->class('form-control')
              }}
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('Sifat Surat', 'level_id')->class('form-label') }}
            {{ html()->select('level_id', ['' => 'Pilih Sifat Surat'] + $levels->toArray())
                ->class('form-control')
              }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            {{ html()->label('Unit', 'sender')->class('form-label') }}
            {{ html()->input('text', 'sender')
              ->class('form-control')->attribute('required', true)
              ->attribute('placeholder', 'Isikan unit') }}
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            {{ html()->label('Perihal', 'subject')->class('form-label') }}
            {{ html()->input('text', 'subject')
              ->class('form-control')->attribute('required', true)
              ->attribute('placeholder', 'Isikan perihal') }}
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
@push('scripts')
<script>
  $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
  });
</script>
@endpush