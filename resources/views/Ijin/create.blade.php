<form>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="mb-3">
                <label for="isinama" class="form-label">Nama :</label>
                <input type="text" class="form-control" id="isinama" name="nama" placeholder="Nama Perusahaan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="mb-3">
                <label for="isiketerangan" class="form-label">Keterangan :</label>
                <input type="text" class="form-control" id="isiketerangan" name="keterangan" placeholder="Ket.Perusahaan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
        <button type="button" class="btn btn-outline-primary" onclick="store()"><i class="fa fa-cloud"></i> Simpan</button>
    </div>
    </div>
</form>