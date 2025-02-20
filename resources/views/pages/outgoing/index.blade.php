@extends('layouts.master')
@section('breadcrumbs')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Surat Keluar</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Surat Keluar</li>
    </ol>
  </div>
</div>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Surat Keluar</h3>

    @can('tambah surat keluar')
      <div class="card-tools">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
          Cetak Laporan
        </button>
        <a href="{{ route('out.new') }}" class="btn btn-primary">Tambah Surat Keluar</a>
      </div>
    @endcan
  </div>
  <div class="card-body">
    {{ $dataTable->table() }}
  </div>

  <div class="modal fade" id="modal-default"  aria-hidden="true">
    <div class="modal-dialog">
      {{ html()->form('POST', route('out.report'))->open() }}
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cetak Data Period</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="dates" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div>
        </div>
      {{ html()->form()->close() }}
    </div>
  </div>

</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
      $(document).ready(function() {
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
      })
    </script>
@endpush