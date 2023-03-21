<form action="{{route('sertadetail.update', $data->Column_ID)}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="kodemaster2" id="kodemaster2" value="{{$kodemaster}}" />
    <input name="last_url" value="{{  URL::previous() }}" hidden>
    @csrf
    @method('PUT')
    <div class="mb-1 row ">
        <div class="col-md-6 no-gutters">
            <div class="form-group mb-1">
                <label for="tgl2" class="form-label">Tanggal :</label>
                <div class="input-group date" id="tgl2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl2" id="tgl2" name="tgl" value="{{date('d-m-Y', strtotime($data->TGL))}}">
                    <div class="input-group-append" data-target="#tgl2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="hak" class="form-label">Hak :</label>
                <div class="input-group">
                    <select class=" form-control form-select" aria-label=".form-select-sm example" name="hak">
                        <option value="">--Hak--</option>
                        <option value="1" {{ $data->HAK == 1 ? 'selected' : '' }}>Milik</option>
                        <option value="2" {{ $data->HAK == 2 ? 'selected' : '' }}>GunaB</option>

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label for="tglterbit2" class="form-label">Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit2" id="tglterbit2" name="tglterbit" value="{{date('d-m-Y', strtotime($data->TGLTERBIT))}}">
                    <div class="input-group-append" data-target="#tglterbit2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label for="tglhabis2" class="form-label">Tgl Habis :</label>
                <div class="input-group date" id="tglhabis2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis2" id="tglhabis2" name="tglhabis" value="{{date('d-m-Y', strtotime($data->TGLHABIS))}}">
                    <div class="input-group-append" data-target="#tglhabis2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.SerTa :</label>
            <input type="text" class="form-control" id="no" name="no" value="{{ $data->NO }}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="col-md-6 ">
            <label for="nama" class="form-label">Nama Hak :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="nama" value="{{ $data->NAMA }}">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="provinsi" class="form-label">Provinsi :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="provinsi" name="provinsi" value="{{ $data->PROVINSI }}">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="kota" class="form-label">Kota/Kab. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kota" name="kota" value="{{ $data->KOTA }}">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <label for="kecamatan" class="form-label">Kecamatan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="kecamatan" name="kecamatan" value="{{ $data->KECAMATAN }}">
            </div>
        </div>

        <div class="col-md-6 ">
            <label for="desa" class="form-label">Desa/Kel. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="desa" name="desa" value="{{ $data->DESA }}">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <div class="col-md-6 ">
            <div class="form-group mb-1">
                <label for="tglsu2" class="form-label">Tanggal SU :</label>
                <div class="input-group date" id="tglsu2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglsu2" id="tglsu2" name="sutgl" value="{{date('d-m-Y', strtotime($data->SUTGL))}}">
                    <div class="input-group-append" data-target="#tglsu2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <label for="suno" class="form-label">No.SU :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="suno" name="suno" value="{{ ($data->SUNO) }}">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <label for="suluas" class="col-sm-3 col-form-label">Luas SU :</label>
        <div class="col-sm-6">
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="suluas" name="suluas" value="{{ ($data->SULUAS) }}">
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="files" class="col-sm-3 col-form-label">File SerTa :</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="file" class="form-control" id="files" name="files">
            </div>
        </div>
    </div>

    <div class="mb-1 row">
        <label for="isiketerangan" class="col-sm-3 col-form-label">Keterangan :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="isiketerangan" name="keterangan" value="{{ ($data->KETERANGAN) }}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button type="submit" class="btn btn-outline-primary"><i class=" fa fa-cloud"></i> Update</button>

    </div>

</form>
<script type="text/javascript">
    $(function() {
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