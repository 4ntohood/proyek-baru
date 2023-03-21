<form>
    <input class="text" name="kdmstr" id="kodemaster" value="{{$kodemaster}}" hidden>
    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tgl" class="form-label">Tanggal :</label>
                <div class="input-group date" id="tgl" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl" id="tgl" name="ftgl">
                    <div class="input-group-append" data-target="#tgl" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tgl2" class="form-label">s/d Tanggal :</label>
                <div class="input-group date" id="tgl2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl2" id="tgl2" name="ftgl2">
                    <div class="input-group-append" data-target="#tgl2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row ">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglterbit" class="form-label">Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit" id="tglterbit" name="ftglterbit">
                    <div class="input-group-append" data-target="#tglterbit" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglterbit2" class="form-label">s/d Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit2" id="tglterbit2" name="ftglterbit2">
                    <div class="input-group-append" data-target="#tglterbit2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglhabis" class="form-label">Tgl Habis :</label>
                <div class="input-group date" id="tglhabis" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis" id="tglhabis" name="ftglhabis">
                    <div class="input-group-append" data-target="#tglhabis" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglhabis2" class="form-label">s/d Tgl Habis :</label>
                <div class="input-group date" id="tglhabis2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis2" id="tglhabis2" name="ftglhabis2">
                    <div class="input-group-append" data-target="#tglhabis2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row ">
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.Sertifikat :</label>
            <input type="text" class="form-control" id="no" name="fno" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="col-md-6 ">
            <label for="nama" class="form-label">Nama Hak :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="fnama">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="provinsi" class="form-label">Provinsi :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="provinsi" name="fprovinsi">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="kota" class="form-label">Kota/Kab. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kota" name="fkota">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="kecamatan" class="form-label">Kecamatan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kecamatan" name="fkecamatan">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="desa" class="form-label">Desa/Kel. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="desa" name="fdesa">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglsu" class="form-label">Tanggal SU :</label>
                <div class="input-group date" id="tglsu" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglsu" id="tglsu" name="ftglsu">
                    <div class="input-group-append" data-target="#tglsu" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglsu2" class="form-label">s/d Tanggal SU :</label>
                <div class="input-group date" id="tglsu2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglsu2" id="tglsu2" name="ftglsu2">
                    <div class="input-group-append" data-target="#tglsu2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-md-6">
            <label for="suno" class="form-label">No.SU :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="suno" name="fsuno" placeholder="0.00">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label for="hak" class="form-label">Hak :</label>
                <div class="input-group">
                    <select class=" form-control form-select" aria-label=".form-select-sm example" name="fhak" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        <option selected></option>
                        <option value="1">Milik</option>
                        <option value="2">Guna Bangunan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-md-12">
            <label for="fket" class="form-label">Ket :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="fket" name="fket" placeholder="">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button type="button" class="btn btn-outline-primary" onclick="nofilter()"><i class="fa fa-history"></i> No Filter</button>
        <button type="button" class="btn btn-outline-primary" onclick="filter()"><i class="fa fa-filter"></i> Filter</button>
    </div>
</form>
<script type="text/javascript">
    function filter() {
        var formdata = $("form").serialize();
        $.ajax({
            type: "GET",
            url: "{{ route('readserta_detail') }}",
            data: formdata,
            success: function(data) {
                $("#read").html(data);
                $(".close").click();
            }
        });
    }
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
        $('#tgl2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglterbit2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglhabis2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglsu2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    })
</script>