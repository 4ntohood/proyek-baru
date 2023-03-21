<form action="{{route('sertadetail.store')}}" method="POST" enctype="multipart/form-data">
    <input class="text" name="kodemaster" id="kodemaster" value="{{$kodemaster}}" hidden>
    <input name="last_url" value="{{  URL::previous() }}" hidden>
    @csrf
    @method('POST')
    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tgl" class="form-label">Tanggal :</label>
                <div class="input-group date" id="tgl" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl" id="tgl" name="tgl">
                    <div class="input-group-append" data-target="#tgl" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group mb-1">
                <label for="hak" class="form-label">Hak :</label>
                <div class="input-group">
                    <select class=" form-control form-select" aria-label=".form-select-sm example" name="hak" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        <option selected></option>
                        <option value="1">Milik</option>
                        <option value="2">Guna Bangunan</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="mb-1 row ">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglterbit" class="form-label">Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit" id="tglterbit" name="tglterbit">
                    <div class="input-group-append" data-target="#tglterbit" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglhabis" class="form-label">Tgl Habis :</label>
                <div class="input-group date" id="tglhabis" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis" id="tglhabis" name="tglhabis">
                    <div class="input-group-append" data-target="#tglhabis" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-1 row ">
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.Sertifikat :</label>
            <input type="text" class="form-control" id="no" name="no" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="col-md-6 ">
            <label for="nama" class="form-label">Nama Hak :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="nama">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="provinsi" class="form-label">Provinsi :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="provinsi" name="provinsi">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="kota" class="form-label">Kota/Kab. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kota" name="kota">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="kecamatan" class="form-label">Kecamatan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kecamatan" name="kecamatan">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="desa" class="form-label">Desa/Kel. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="desa" name="desa">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglsu" class="form-label">Tanggal SU :</label>
                <div class="input-group date" id="tglsu" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglsu" id="tglsu" name="sutgl">
                    <div class="input-group-append" data-target="#tglsu" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="suno" class="form-label">No.SU :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="suno" name="suno" placeholder="0.00">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <label for="suluas" class="col-sm-3 col-form-label">Luas SU :</label>
        <div class="col-sm-6">
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="suluas" name="suluas" placeholder="0.00">
            </div>
        </div>

    </div>

    <div class="mb-1 row">
        <label for="files" class="col-sm-3 col-form-label">File SerTa :</label>
        <div class="col-sm-9">
            <div class="input-group-prepend">
                <input type="file" class="form-control " id="files" name="files">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <label for="isiketerangan" class="col-sm-3 col-form-label">Keterangan :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="isiketerangan" name="keterangan" placeholder="">
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-cloud"></i> Simpan</button>
    </div>

</form>
<script type="text/javascript">
    $(function() {
        $('#tgl').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglterbit').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglhabis').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglsu').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    })
</script>