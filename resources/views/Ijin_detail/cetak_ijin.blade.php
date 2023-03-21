<form action="{{route('generate_pdf',$datax->column_id)}}" method="GET">
    <div class="mb-3 row">
        <div class="col-sm-6">
            <div class="icheck-primary">
                <input type="checkbox" id="PilihA4" name="checkbox_a4" Value="1" onclick="checkboxFunction()">
                <label class="small mb-1" for="PilihA4" id="lblPilihA4">
                    A4
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="icheck-primary">
                <input type="checkbox" id="PilihF4" name="checkbox_f4" Value="1" onclick="checkboxFunction()">
                <label class="small mb-1" for="PilihF4" id="lblPilihF4">
                    Legal
                </label>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-6">
            <div class="icheck-primary">
                <input type="checkbox" id="Pilihjenis1" name="checkbox_small" Value="1" onclick="checkboxFunction()">
                <label class="small mb-1" for="Pilihjenis1" id="lblPilihjenis1">
                    Small Diagonaly
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="icheck-primary">
                <input type="checkbox" id="Pilihjenis2" name="checkbox_large" Value="1" onclick="checkboxFunction()">
                <label class="small mb-1" for="Pilihjenis2" id="lblPilihjenis2">
                    Large Diagonaly
                </label>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-6">
            <div class="input-group">
                <select class="form-control col-md-12 " aria-label="Default select example" id="option_wm" name="option_wm" style="display:none">
                    <option value="">-- Text Watermark --</option>
                    <option value="CONFIDENTIAL">CONFIDENTIAL</option>
                    <option value="COPY">COPY</option>
                    <option value="DRAFT">DRAFT</option>
                    <option value="TOP SECRET">TOP SECRET</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control " id="note" name="checkbox_text" style="display:none" placeholder="Watermark for PT.XYZ">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <input type="text" class="form-control " id="keterangan_wm" name="keterangan_wm" placeholder="Keterangan">
        </div>
    </div>
    <input type="text" name="cJenis" value="1" hidden />
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="hapus_temp()"><i class="fa fa-ban"></i> Close</button>
        <button type="submit" class="btn btn-outline-primary"><i class=" fa fa-print"></i> PDF</button>
    </div>
</form>
<script>
    $('#option_wm').change(function() {
        var text = document.getElementById("note");
        var val = $("#option_wm option:selected").text();
        if (val === 'CONFIDENTIAL') {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    });

    function checkboxFunction() {
        var checkBox1 = document.getElementById("Pilihjenis1");
        var checkBox2 = document.getElementById("Pilihjenis2");
        var lbl1 = document.getElementById("lblPilihjenis1");
        var lbl2 = document.getElementById("lblPilihjenis2");

        var checkBox3 = document.getElementById("PilihA4");
        var checkBox4 = document.getElementById("PilihF4");
        var lbl3 = document.getElementById("lblPilihA4");
        var lbl4 = document.getElementById("lblPilihF4");

        var optionwm = document.getElementById("option_wm");
        var text = document.getElementById("note");


        if (checkBox2.checked == true) {
            optionwm.style.display = "block",
                checkBox1.style.display = "none",
                lbl1.style.display = "none";

        } else {
            optionwm.style.display = "none",
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

    function hapus_temp() {
        url = "hapus_temp_pdf";
        $.get(url, {}, function(data, status) {

        });
    }
</script>