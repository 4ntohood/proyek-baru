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

    .high-light {
        background-color: #05f9fc !important;
    }

    #tabel1 tbody tr:hover {
        background-color: #05f9fc !important;
    }
</style>
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/daterangepicker/daterangepicker.css')}}">
<!--Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection
@section('content')
<input type="text" id="kodemaster" value="{{$kode}}" hidden>

<div class="card">
    <div class="card-header ">
        <h2 class="card-title" style=" float:left;margin-left:10px;"><i class="fas fa-table me-1"></i> DETAIL PERIJINAN </h2>
        <div class="card-tools" style=" float:right;margin-right:10px;">
            <button type=" button" class="btn btn-primary btn-sm " onclick="create()">
                <i class="fas fa-plus-square"></i> Tambah</button>
            <button type="button" class="btn btn-primary btn-sm " onclick="cari()">
                <i class="fa fa-filter"></i> Filter</button>
        </div>
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
    <div class="modal fade " id="frmijindet" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
        <div class="modal-dialog ">
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

    <!-- Modal long content -->
    <div class="modal fade" id="ModalLong" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="frmmodal_lihat"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal kecil lihat -->
    <div class="modal fade " id="frmlihat" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class=" modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="judulmodal"></h5>
                    <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page_frmlihat"></div>
                </div>

            </div>
        </div>
    </div>

    @endsection
    @section('js')
    <script src="{{asset ('admin/LTE/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset ('admin/LTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset ('admin/LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script>
        var kodemaster = document.getElementById('kodemaster').value
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
            $.get("{{ route('readijin_detail') }}", {
                kdmstr: kodemaster
            }, function(data, status) {
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
                url: "readijin_detail?kdmstr=" + kodemaster + "&page=" + page,
                success: function(data) {
                    $('#read').html(data);
                }
            });
        }

        function create() {
            $.get("{{ route('perijinan.create') }}", {
                kdmstr: kodemaster
            }, function(data, status) {
                $("#judulmodal").html('Isi Data')
                $("#page_frmijin").html(data);
                $("#frmijindet").modal('show');

            });
        }
        // Untuk modal edit 
        function edit(column_id) {
            url = "perijinan";
            id = column_id;
            editUrl = url + '/' + id + '/edit';
            $.get(editUrl, {
                kdmstr: kodemaster
            }, function(data, status) {
                $("#judulmodal").html('Edit Data')
                $("#page_frmijin").html(data);
                $("#frmijindet").modal('show');
            });
        }

        function cari() {
            $.get("{{ route('filterijin') }}", {
                kdmstr: kodemaster
            }, function(data, status) {
                $("#judulmodal").html('Filter Data')
                $("#page_frmijin").html(data);
                $("#frmijindet").modal('show');

            });
        }

        function nofilter() {
            read()
            $(".close").click();
        }


        // function store() {
        //     var formdata = $("form").serialize();
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('perijinan.store') }}",
        //         data: formdata,
        //         success: function(data) {
        //             $(".close").click();
        //             read();
        //         },
        //     });
        // }

        // untuk proses update data
        function update(column_id) {
            url = "perijinan";
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
            url = "perijinan";
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

        function cetak(column_id) {
            url = "cetak2";
            id = column_id;
            editUrl = url + '/' + id;
            $.get(editUrl, {}, function(data, status) {
                $("#judulmodal").html('Print Setting')
                $("#page_frmijin").html(data);
                $("#frmijindet").modal('show');
            });
        }
    </script>
    @endsection