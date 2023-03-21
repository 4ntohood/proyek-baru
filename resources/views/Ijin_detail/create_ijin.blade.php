<form action="{{route('perijinan.store')}}" method="POST" enctype="multipart/form-data">
    <input type="text" name="kodemaster2" value="{{$kodemaster}}" hidden />
    <input name="last_url" value="{{  URL::previous() }}" hidden>
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="tgl" class="form-label">Tanggal :</label>
                <div class="input-group date" id="tgl" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tgl" id="tgl" name="tgl">
                    <div class="input-group-append" data-target="#tgl" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <label for="no" class="form-label">No.Perijinan :</label>
            <input type="text" class="form-control" id="no" name="no" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="form-group">
                <label for="nama" class="form-label">Perijinan :</label>
                <div class="input-group">
                    <select class="form-control col-md-12 " aria-label="Default select example" id="nama_ijin" name="nama_ijin">
                        @foreach($kelompok as $kel)
                        <option value="{{$kel->KELOMPOK}}">{{$kel->KELOMPOK}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <label for="penerbit" class="form-label">Nama :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="nama" name="nama">
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="tglterbit" class="form-label">Tgl Terbit :</label>
                <div class="input-group date" id="tglterbit" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglterbit" id="tglterbit" name="tglterbit">
                    <div class="input-group-append" data-target="#tglterbit" data-toggle="datetimepicker">
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
                    <input type="text" class="form-control datetimepicker-input" data-target="#tglhabis" id="tglhabis" name="tglhabis">
                    <div class="input-group-append" data-target="#tglhabis" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <label for="pengingat" class="form-label">Pengingat :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="pengingat" name="pengingat">
            </div>
        </div>
        <div class="col-md-3 ">
            <label for="box" class="form-label">No.box. :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="box" name="box">
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-12 ">
            <label for="penerbit" class="form-label">Penerbit :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control " id="penerbit" name="penerbit">
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-12">
            <label for="files" class="col-form-label">File Perijinan :</label>
            <div class="input-group-prepend">
                <input type="file" class="form-control " id="files" name="files">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <label for="isiketerangan" class="form-label">Keterangan :</label>
            <div class="input-group-prepend">
                <input type="text" class="form-control" id="isiketerangan" name="keterangan" placeholder="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>