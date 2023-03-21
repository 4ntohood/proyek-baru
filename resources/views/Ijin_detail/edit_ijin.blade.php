<form action="{{route('perijinan.update', $dt->column_id)}}" method="POST" enctype="multipart/form-data">
    <input type="text" name="kodemaster2" value="{{$kodemaster}}" hidden />
    <input name="last_url" value="{{  URL::previous() }}" hidden>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="tgl2" class="form-label">Tanggal :</label>
                <div class="input-group date" id="tgl2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl2" id="tgl2" name="tgl" value="{{date('d-m-Y', strtotime($dt->tgl))}}">
                    <!--  <input type="text" class="form-control datetimepicker-input" data-target="#tgl2" id="tgl2" name="tgl" value="{{date('d-m-Y', strtotime($dt->tgl))}}"> -->
                    <div class="input-group-append" data-target="#tgl2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.Perijinan :</label>
            <input type="text" class="form-control" id="no" name="no" value="{{ $dt->no }}" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="form-group">
                <label for="nama" class="form-label">Perijinan :</label>
                <div class="input-group">
                    <select class="form-control col-md-12 " aria-label="Default select example" id="nama_ijin" name="nama_ijin">
                        @foreach($kelompok as $kel)
                        <option @if (old('nama_ijin' , $dt->nama_ijin) == $kel->KELOMPOK) selected @endif >{{$kel->KELOMPOK}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <label for="nama" class="form-label">Nama :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="nama" value="{{$dt->nama}}">
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="tglterbit2" class="form-label">Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit2" id="tglterbit2" name="tglterbit" value="{{date('d-m-Y', strtotime($dt->tglterbit))}}">
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
                <label for="tglhabis2" class="form-label">Tgl Habis :</label>
                <div class="input-group date" id="tglhabis2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis2" id="tglhabis2" name="tglhabis" value="{{date('d-m-Y', strtotime($dt->tglhabis))}}">
                    <div class="input-group-append" data-target="#tglhabis2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <label for="pengingat" class="form-label">Pengingat :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="pengingat" name="pengingat" value="{{ $dt->pengingat }}">
            </div>
        </div>
        <div class="col-md-3 ">
            <label for="box" class="form-label">No.box. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="box" name="box" value="{{ $dt->nobox }}" placeholder="0">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <label for="penerbit" class="form-label">Penerbit :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="penerbit" name="penerbit" value="{{ $dt->penerbit }}">
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="files" class="form-label">File Perijinan :</label>
            <div class="input-group-prepend">
                <input type="file" class="form-control " id="files" name="files">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="editketerangan" class="form-label">Keterangan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control" id="editketerangan" name="keterangan" placeholder="" value="{{ $dt->keterangan }}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
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
    })
</script>