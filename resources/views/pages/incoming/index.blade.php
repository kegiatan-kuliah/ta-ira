@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Surat Masuk Internal</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Surat Masuk Internal</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Surat Masuk Internal</h3>

    @can('tambah surat masuk')
      <div class="card-tools">
        <a href="{{ route('in.report') }}" target="__blank" class="btn btn-info">Cetak Laporan</a>
        <a href="{{ route('in.new') }}" class="btn btn-primary">Tambah Surat Masuk Internal</a>
      </div>
    @endcan
  </div>
  <div class="card-body">
    {{ $dataTable->table() }}
  </div>
</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush