<form>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Perusahaan" value="{{$data->nama}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan :</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Ket.Perusahaan" value="{{$data->keterangan}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button id="btnbatal" type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button id="btnsimpan" type="button" class="btn btn-outline-primary" onclick='update("{{ $data->column_id }}")'><i class=" fa fa-cloud"></i> Simpan</button>
    </div>
</form>