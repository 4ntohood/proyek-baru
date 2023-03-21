@extends('template')
@section('css')
<Style>
    .table-responsive {
        max-height: 700px;
        overflow: auto;
        display: inline-block;
    }

    .blue {
        background-color: rgb(0, 0, 255, 20%) !important;
    }

    .orange {
        background-color: rgb(255, 165, 0, 20%) !important;
    }

    .yellow {
        background-color: rgb(255, 255, 0, 20%) !important;
    }

    .red {
        background-color: rgb(255, 0, 0, 20%) !important;
    }

    .white {
        background-color: rgb(255, 255, 255, 20%) !important;
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

    .high-light {
        background-color: #05f9fc !important;
    }

    #tabel1 tbody tr:hover {
        background-color: #05f9fc !important;
    }

    /* 
    .dataTables_paginate {
        display: none;
    } */
</style>
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/daterangepicker/daterangepicker.css')}}">
<!--Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection
@section('content')
<input class="text" id="kodemaster" value="{{$kode}}" hidden>
<div class="card mb-4">
    <div class="card-header ">
        <h2 class="card-title" style=" float:left;margin-left:10px;"><i class="fas fa-table me-1"></i> SERTIFIKAT TANAH DETAIL </h2>
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
        <div id="read">
        </div>
    </div>
</div>
<div class="modal fade" id="sertifikat" tabindex="-1" aria-labelledby="judulmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="judulmodal"></h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page">
                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal kecil lihat -->
<div class="modal fade " id="frmlihat_tanah" tabindex="-1" role="dialog" aria-labelledby="judulmodal_tanah" aria-hidden="true">
    <div class="modal-dialog ">
        <div class=" modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="judulmodal_tanah"></h5>
                <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page_frmlihat_tanah"></div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
<!-- InputMask -->
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
        read();

    });

    function loading() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-spin"
        });
    }

    function read() {
        $.get("{{ route('readserta_detail') }}", {
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
            url: "readserta_detail?kdmstr=" + kodemaster + "&page=" + page,
            success: function(data) {
                $('#read').html(data);
            }
        });
    }
    // Modal create
    function create() {
        $.ajax({
            type: "GET",
            url: "{{ route('sertadetail.create') }}",
            data: {
                kdmstr: kodemaster
            },
            success: function(data) {
                console.log(data)
                $("#judulmodal").html('Isi Data')
                $("#page").html(data);
                $("#sertifikat").modal('show');
            }
        });
    }

    // untuk proses create data
    function store() {
        var formdata = $("#frmisi").serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('sertadetail.store') }}",
            data: formdata,
            success: function(data) {
                $("#close").click();
                read();
            }
        });
    }

    // Untuk modal edit
    function edit(Column_ID) {
        url = "sertadetail";
        id = Column_ID;
        editUrl = url + '/' + id + '/edit';
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal").html('Edit Data')
            $("#page").html(data);
            $("#sertifikat").modal('show');
        });
    }

    function cari() {
        $.get("{{ route('filterserta') }}", {
            kdmstr: kodemaster
        }, function(data, status) {
            $("#judulmodal").html('Filter Data')
            $("#page").html(data);
            $("#sertifikat").modal('show');

        });
    }

    function nofilter() {
        read()
        $(".close").click();
    }


    // // untuk proses update data
    // function update(Column_ID, e) {
    //     e = e || window.event;
    //     e.preventDefault();
    //     var fdd = $("form#sertif").serialize()[0];
    //     var fd = new FormData();
    //     var files = $('#files')[0].files;

    //     // Check file selected or not
    //     if (files.length > 0) {
    //         fd.append('files', files[0]);
    //         url = "sertadetail";
    //         id = Column_ID;
    //         editUrl = id;
    //         $.ajax({
    //             enctype: 'multipart/form-data',
    //             processData: false, // Important!
    //             contentType: false,
    //             cache: false,
    //             type: "PUT",
    //             url: editUrl,
    //             data: [fdd] + fd,

    //             success: function(data) {
    //                 console.log("SUCCESS : ", data);
    //                 $("#close").click();
    //                 read()
    //             }
    //         });
    //     } else {
    //         alert("Please select a file.");
    //     }
    // }

    function SwalDelete(Column_ID) {
        url = "sertadetail";
        id = Column_ID;
        editUrl = url + '/' + id;
        swal.fire({
            title: 'Yakin Hapus?',
            text: "Data akan hilang permanen!",
            type: 'warning',
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
                        .done(function(response) {
                            swal.close();
                            read()
                        })
                        .fail(function() {});
                });
            },
            allowOutsideClick: false
        });
    }

    function cetak(Column_ID) {
        url = "cetak";
        id = Column_ID;
        editUrl = url + '/' + id;
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal").html('Print Setting')
            $("#page").html(data);
            $("#sertifikat").modal('show');
        });
    }

    // function printpdf(Column_ID) {
    //     var formdata = $("form").serialize();
    //     url1 = "generate_pdf";
    //     id = Column_ID;
    //     editUrl = url1 + '/' + id;
    //     $.ajax({
    //         type: "GET",
    //         url: editUrl,
    //         data: formdata,
    //         contentType: "application/pdf; charset=UTF-8",
    //         success: function(response) {
    //             $("#close").click();
    //             download(response, "mydownload.pdf", "application/pdf;base64");
    //             //open a new window note:this is a popup so it may be blocked by your browser
    //             // var newWindow = window.open();

    //             // //write the data to the document of the newWindow
    //             // newWindow.document.write(response);
    //         }
    //     });
    // }
</script>

<!-- <script>
    $('#date').datetimepicker({
        dateFormat: 'dd-mm-yy'
    }).val();
</script> -->

<script>
    function uncheck() {
        document.getElementById("Pilihjenis1").checked = false;
        document.getElementById("Pilihjenis2").checked = false;
        document.getElementById("PilihA4").checked = false;
        document.getElementById("PilihF4").checked = false;
    }
</script>


@endsection