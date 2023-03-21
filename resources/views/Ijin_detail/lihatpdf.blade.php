<form action="{{route('open_pdf',$dt->column_id)}}" method="GET">
    <div class="row">
        <div class="col-md-12 ">
            <label for="no" class="form-label">No.Perijinan :</label>
            <input type="text" class="form-control" id="no" name="no" value="{{ $dt->no }}" placeholder="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <label for="nama" class="form-label">Nama Perijinan:</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="nama" value="{{$dt->nama}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="editketerangan" class="form-label">Nama File :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control" id="editketerangan" name="keterangan" placeholder="" value="{{ $dt->namafile }}">
            </div>
        </div>
    </div>
    <input type="text" name="cJenis" value="1" hidden />
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="hapus_temp()"><i class="fa fa-ban"></i> Close</button>
        <button type="submit" class="btn btn-outline-primary"><i class=" fa fa-book"></i> Open PDF</button>
    </div>
</form>
<script>
    function hapus_temp() {
        url = "hapus_temp_pdf";
        $.get(url, {}, function(data, status) {

        });
    }
</script>