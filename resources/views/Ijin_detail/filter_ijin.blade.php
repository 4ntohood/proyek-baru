<form>
    <input type="text" name="kdmstr" value="{{$kodemaster}}" hidden />
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
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
            <div class="form-group">
                <label for="tgl" class="form-label">s/d Tgl :</label>
                <div class="input-group date" id="tgl2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl2" id="tgl2" name="ftgl2">
                    <div class="input-group-append" data-target="#tgl2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.Perijinan :</label>
            <input type="text" class="form-control" id="no" name="fno" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        <div class="col-md-6 ">
            <label for="penerbit" class="form-label">Nama :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="fnama">
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12 ">
            <div class="form-group">
                <label for="nama" class="form-label">Perijinan :</label>
                <div class="input-group">
                    <select class="form-control col-md-12 " aria-label="Default select example" id="nama_ijin" name="fnama_ijin">
                        @foreach($kelompok as $kel)
                        <option value="{{$kel->KELOMPOK}}">{{$kel->KELOMPOK}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
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
            <div class="form-group">
                <label for="tglterbit2" class="form-label">s/d Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit2" id="tglterbit2" name="ftglterbit2">
                    <div class="input-group-append" data-target="#tglterbit2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
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
            <div class="form-group">
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
    <div class="mb-3 row">
        <div class="col-md-3 ">
            <label for="box" class="form-label">No.box. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="box" name="fbox">
            </div>
        </div>
        <div class="col-md-9 ">
            <label for="penerbit" class="form-label">Penerbit :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="penerbit" name="fpenerbit">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <label for="isiketerangan" class="form-label">Keterangan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control" id="isiketerangan" name="fketerangan" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button type="button" class="btn btn-outline-info" onclick="nofilter()"><i class="fa fa-history"></i> No Filter</button>
        <button type="button" class="btn btn-outline-info" onclick="filter()"><i class="fa fa-filter"></i> Filter</button>
    </div>

</form>

<script type="text/javascript">
    function filter() {
        var formdata = $("form").serialize();
        $.ajax({
            type: "GET",
            url: "{{ route('readijin_detail') }}",
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
        $('#tgl2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglterbit2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#tglhabis2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    })
</script>