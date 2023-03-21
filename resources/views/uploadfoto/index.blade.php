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

    .center {
        margin: 0 auto !important;
        /* I have added the !important attribute just for debugging, you can remove it. */
    }

    #outerContainer #mainContainer div.toolbar {
        display: none !important;
        /* hide PDF viewer toolbar */
    }

    #outerContainer #mainContainer #viewerContainer {
        top: 0 !important;
        /* move doc up into empty bar space */
    }
</style>
@endsection
@section('content')


<div class="card">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        UPLOAD FOTO KONTAINER
    </div>
    <div class="card-body">

        <div class="content">
            <div id="mainpage"></div>
        </div>
    </div>

    <!-- modal kecil -->
    <div class="modal fade " id="frmcetak" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class=" modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="judulmodal"></h5>
                    <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page_frmcetak"></div>
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
            $.get("{{ route('readuploadfoto') }}", {}, function(data, status) {
                $("#mainpage").html(data);
                $.LoadingOverlay("hide");
            });
        }

        function cetak() {
            $('#btn_ok').on('click', function() {
                $('#frmcetak').show();
            });
        }
    </script>


    @endsection