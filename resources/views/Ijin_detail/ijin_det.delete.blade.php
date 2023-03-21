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

    .green {
        background-color: rgb(60, 179, 113, 20%) !important;
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

    .dataTables_paginate {
        display: none;
    }
</style>
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/daterangepicker/daterangepicker.css')}}">
<!--Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset ('admin/LTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endsection
@section('content')
<!------------------------------- Modal Pilih Wmark--------------------------------------------------------------------------------------------->

<!------------------------------- Modal Wm end----------------------------------------------------------------------------------------------->
<input class="text" name="kodenya" id="kodenya" value="{{($kodex)}}" hidden>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        PERIJINAN DETAIL
        <i class="float-sm-right">
            <button type="button" class="btn btn-primary btn-sm" onclick="create({{$kodex}})">
                <i class=" fas fa-plus-square"></i> Tambah</button>
        </i>

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
<div class="modal fade" id="perijinan" tabindex="-1" aria-labelledby="judulmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
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
@endsection
@section('js')

<!--    <script type="text/javascript" src="{{asset ('assets/plugin/date3/jquery/jquery-1.8.3.min.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{asset ('assets/plugin/date3/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/plugin/date3/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{asset ('assets/plugin/date3/js/locales/bootstrap-datetimepicker.en.js')}}" charset="UTF-8"></script>

  
    -->
<!-- InputMask -->
<script src="{{asset ('admin/LTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset ('admin/LTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset ('admin/LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script>
    var cid = document.getElementById("kodenya").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        read(cid);
    });

    function read(cid) {
        url = 'readijin';
        id = cid;
        editUrl = 'readijin' + '/' + id;
        $.get(editUrl, {}, function(data, status) {
            $("#read").html(data);
        });
    }

    // Modal create
    function create() {
        $.ajax({
            type: "GET",
            url: "{{ route('perijinan.create') }}",
            data: {
                kodenya: cid
            },
            success: function(data) {
                $("#judulmodal").html('Isi Data')
                $("#page").html(data);
                $("#perijinan").modal('show');
            }
        });
    }

    // untuk proses create data
    function store() {
        var formdata = $("#frmisi").serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('perijinan.store') }}",
            data: formdata,
            success: function(data) {
                $("#close").click();
                read(cid);
            }
        });
    }

    // Untuk modal edit
    function edit(Column_ID) {
        url = "perijinan";
        id = Column_ID;
        editUrl = id + '/edit';
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal").html('Edit Data')
            $("#page").html(data);
            $("#perijinan").modal('show');
        });
    }
</script>
<script>
    $(function() {
        $('#tgl').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tgl2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglterbit').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglterbit2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglhabis').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglhabis2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglsu').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglsu2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    });
</script>
<script>
    function SwalDelete(column_id) {
        url = "perijinan";
        id = column_id;
        editUrl = id;
        swal({
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

                        })
                        .done(function(response) {
                            swal('Data sudah dihapus!', response.message, response.status);
                            read(cid)
                        })
                        .fail(function() {
                            swal('Gagal Terhapus !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

    function cetak(Column_ID) {
        url = "cetak2";
        id = Column_ID;
        editUrl = url + '/' + id;
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal").html('Print Setting')
            $("#page").html(data);
            $("#perijinan").modal('show');
        });
    }
</script>
<script>
    function checkboxFunction() {
        var checkBox1 = document.getElementById("Pilihjenis1");
        var checkBox2 = document.getElementById("Pilihjenis2");
        var lbl1 = document.getElementById("lblPilihjenis1");
        var lbl2 = document.getElementById("lblPilihjenis2");

        var checkBox3 = document.getElementById("PilihA4");
        var checkBox4 = document.getElementById("PilihF4");
        var lbl3 = document.getElementById("lblPilihA4");
        var lbl4 = document.getElementById("lblPilihF4");

        var text = document.getElementById("mycheck");


        if (checkBox2.checked == true) {
            text.style.display = "block",
                checkBox1.style.display = "none",
                lbl1.style.display = "none";

        } else {
            text.style.display = "none",
                checkBox1.style.display = "inline",
                lbl1.style.display = "inline";
        }
        if (checkBox1.checked == true) {
            checkBox2.style.display = "none",
                lbl2.style.display = "none";

        } else {
            checkBox2.style.display = "inline",
                lbl2.style.display = "inline";
        }
        if (checkBox3.checked == true) {
            checkBox4.style.display = "none",
                lbl4.style.display = "none";

        } else {
            checkBox4.style.display = "inline",
                lbl4.style.display = "inline";
        }
        if (checkBox4.checked == true) {
            checkBox3.style.display = "none",
                lbl3.style.display = "none";

        } else {
            checkBox3.style.display = "inline",
                lbl3.style.display = "inline";
        }
    }
</script>
<script>
    function uncheck() {
        document.getElementById("Pilihjenis1").checked = false;
        document.getElementById("Pilihjenis2").checked = false;
        document.getElementById("PilihA4").checked = false;
        document.getElementById("PilihF4").checked = false;
    }
</script>
<script>
    var table = $('#tabel1').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "retrieve": true,
        "paging": false,
        "rowCallback": function(row, data, index) {
            let exp = new Date();
            var x_exp = moment(exp).format('YYYY-MM-DD');

            let tgl90 = new Date(data[6]);
            var x_tgl90 = moment(tgl90).subtract(90, 'd').format('YYYY-MM-DD');
            var x_tgl61 = moment(tgl90).subtract(61, 'd').format('YYYY-MM-DD');

            let tgl60 = new Date(data[6]);
            var x_tgl60 = moment(tgl60).subtract(60, 'd').format('YYYY-MM-DD');
            var x_tgl31 = moment(tgl60).subtract(31, 'd').format('YYYY-MM-DD');

            let tgl30 = new Date(data[6]);
            var x_tgl30 = moment(tgl30).subtract(30, 'd').format('YYYY-MM-DD');
            var x_tgl0 = moment(tgl30).format('YYYY-MM-DD');

            $node = this.api().row(row).nodes().to$();

            if (moment(x_tgl90).isBefore(x_exp, 'day')) {
                $node.addClass('yellow')
            } else {

            }

            if (moment(x_tgl0).isSame(x_exp, 'day')) {
                $node.addClass('red')
            } else {

            }

        }
    });
</script>

@endsection