@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Hak Akses</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Hak Akses</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
{{ html()->form('PUT', route('role.update'))->open() }}
  {{ html()->hidden('id', $data->id) }}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sunting Hak Akses</h3>
    </div>
    <div class="card-body">
      <div class="mb-3">
        {{ html()->label('Nama', 'name')->class('form-label') }}
        {{ html()->input('text', 'name', $data->name)
          ->class('form-control')->attribute('required', true)
          ->attribute('placeholder', 'Isikan nama') }}
      </div>
      <div class="mb-3">
        {{ html()->label('Permission', 'permission')->class('form-label') }}
        <div class="row">
          @foreach($permissions as $permission)
            <div class="col-md-4">
              <div class="form-check">
                @if(in_array($permission->name, $hasPermissions))
                  <input class="form-check-input" type="checkbox" name="permissions[]" checked value="{{ $permission->name }}" id="{{ $permission->id }}">
                @else
                  <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}">
                @endif
                <label class="form-check-label" for="{{ $permission->id }}">
                  {{ $permission->name }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <a href="{{ route('role.index') }}" class="btn btn-default">Kembali</a>
        {{ html()->button('Simpan')->class('btn btn-primary')->attribute('type', 'submit') }}
      </div>
    </div>
  </div>
{{ html()->form()->close() }}
@endsection