@extends('layouts.apps')

@section('title', 'Admin Dashboard Hotel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Manage Bank Account</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5>Tambah Rekening</h5>
                                <form id="form-bank">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Nama Bank</label>
                                                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Nama Bank" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="no_rek">No. Rekening</label>
                                                <input type="text" name="no_rek" id="no_rek" class="form-control form-control-sm" placeholder="No. Rekening" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="a_n">Atas Nama</label>
                                                <input type="text" name="a_n" id="a_n" class="form-control form-control-sm" placeholder="Atas Nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="hidden_id" id="hidden_id">
                                            <input type="hidden" id="action" value="add">
                                            <input type="submit" id="btn" value="Simpan" class="btn btn-sm btn-success shadow-sm">
                                            <button id="btn-cancel" class="btn btn-sm btn-danger shadow-sm">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil!</strong> {{ session('sukses') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-sm table-bordered" id="table">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Bank</th>
                                            <th>No. Rekening</th>
                                            <th>A/N</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
{{-- Data Table Css --}}
<link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<style>
    #btn-cancel {
        display: none;
    }
</style>
@endpush

@push('js')
{{-- data-table js --}}
<script src="{{ asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            orderable: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('bank') }}",
            },
            columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'no_rek',
                name: 'no_rek'
            },
            {
                data: 'a_n',
                name: 'a_n'
            },
            {
                data: 'action',
                name: 'action',
            }
            ]
        });

        $('#btn-cancel').on('click', function () {
            $('#form-bank')[0].reset();
            $('#btn').removeClass('btn-info').addClass('btn-success').val('Simpan');
            $('#action').val('add');
            $('#btn-cancel').hide();
        });
        
        $('#form-bank').on('submit', function (event) {
            event.preventDefault();
            var url = '';

            if ($('#action').val() == 'add') {
                url = "{{ route('bank') }}";
            } if ($('#action').val() == 'edit') {
                url = "{{ route('bank-update') }}";
            }

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.success) {
                        toastr.success(data.success);
                        $('#table').DataTable().ajax.reload();
                        $('#form-bank')[0].reset();
                        $('#btn').removeClass('btn-info').addClass('btn-success').val('Simpan');
                        $('#action').val('add');
                        $('#btn-cancel').hide();
                    } else if (data.error) {
                        toastr.error(data.error);
                    }
                }
            });
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '/admin/bank/'+id,
                dataType: 'JSON',
                success: function (data) {
                    $('#action').val('edit');
                    $('#btn').removeClass('btn-success').addClass('btn-info').val('Update');
                    $('#btn-cancel').show();
                    $('#hidden_id').val(data.type.id);
                    $('#name').val(data.type.name);
                    $('#no_rek').val(data.type.no_rek);
                    $('#a_n').val(data.type.a_n);
                }
            });
        });

        $(document).on('click', '.delete', function () {
            var room_id = $(this).attr('id');

            $.ajax({
                url: '/admin/bank/delete/'+room_id,
                success: function (data) {
                    if (data.success) {
                        toastr.success(data.success);
                        $('#table').DataTable().ajax.reload();
                    } else if (data.error) {
                        toastr.error(data.error);
                    }
                }
            });
        });
    });
</script>
@endpush