@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Petugas</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Petugas</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Petugas</h3>

    @can('tambah petugas')
    <div class="card-tools">
      <a href="{{ route('employee.new') }}" class="btn btn-primary">Tambah Petugas</a>
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