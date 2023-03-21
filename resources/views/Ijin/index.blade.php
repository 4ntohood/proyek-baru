@extends('Template')
@section('css')
<style>
    .table-responsive {
        max-height: 700px;
        overflow: auto;
        display: inline-block;
    }

    table {
        overflow-y: scroll;
        height: 200px;
    }

    tbody td {
        font-family: tahoma;
        font-size: 10px;
    }

    .dataTables_length {
        display: none;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_paginate {
        display: none;
    }
</style>
@endsection
@section('content')


<div class="card">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        MASTER PERUSAHAAN (PERIJINAN)
        <i class="float-sm-right"><button type="button" class="btn btn-primary btn-sm" onclick="create()">
                <i class="fas fa-plus-square"></i> Tambah</button>
        </i>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body">
        <div class="content">
            <div class="container-fluid">
                <div id="read"></div>
            </div>
        </div>
    </div>
    <!-- modal kecil -->
    <div class="modal fade " id="frmijin" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class=" modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="judulmodal"></h5>
                    <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page_frmijin"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="{{asset ('admin/LTE/plugins/moment/moment.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            loading()
            read()
        });

        function loading() {
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            });
        }

        function read() {
            $.get("{{ route('readijin') }}", {}, function(data, status) {
                $("#read").html(data);
                $.LoadingOverlay("hide");
            });
        }

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            read_pagination(page);
        });

        function read_pagination(page) {
            $.ajax({
                url: "readijin?page=" + page,
                success: function(data) {
                    $('#read').html(data);
                }
            });
        }

        function create() {
            $.get("{{ route('ijin.create') }}", {}, function(data, status) {
                $("#judulmodal").html('Isi Data')
                $("#page_frmijin").html(data);
                $("#frmijin").modal('show');

            });
        }
        // Untuk modal edit 
        function show(Column_ID) {
            url = "ijin";
            id = Column_ID;
            editUrl = url + '/' + id + '/edit';
            $.get(editUrl, {}, function(data, status) {
                $("#judulmodal").html('Edit Data')
                $("#page_frmijin").html(data);
                $("#frmijin").modal('show');
            });
        }

        function store() {
            var formdata = $("form").serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('ijin.store') }}",
                data: formdata,
                success: function(data) {
                    $(".close").click();
                    read();
                },
            });
        }

        // untuk proses update data
        function update(column_id) {
            url = "ijin";
            id = column_id;
            editUrl = url + '/' + id;
            var formdata = $("form").serialize();
            $.ajax({
                type: "PUT",
                url: editUrl,
                data: formdata,
                success: function(data) {
                    $(".close").click();
                    read()
                }

            });
        }

        function SwalDelete(column_id) {
            url = "ijin";
            id = column_id;
            editUrl = url + '/' + id;
            swal.fire({
                title: 'Yakin Hapus?',
                text: "Data akan hilang permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#30c8d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: editUrl,
                                type: "delete",
                                data: $("form").serialize(),
                            })
                            .done(function() {
                                swal.close();
                                read();
                            })
                            .fail(function() {});
                    });
                },
                allowOutsideClick: false
            });
        }

        function detailperkode(kode) {
            url = "ijin_det";
            id = kode;
            editUrl = url;
            $.get(editUrl, {
                kode: id
            }, function(data, status) {
                window.open("ijin_det?kode=" + id, "_self");
            });
        }
    </script>
    @endsection