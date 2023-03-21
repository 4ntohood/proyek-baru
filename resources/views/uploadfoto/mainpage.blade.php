  <div class="row">
      <div class="col-sm-6">
          <div class="card" height="700">
              <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div style="text-align: center">
                      <img src="{{ asset('assets/img/SDSD3.png') }}" class="img-circle " height="100px">
                      <form action="{{route('generate_pdf_plus')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group ">
                              <label for="wm_file">
                                  <H1>Upload Foto Kontainer</h1>
                              </label>
                              <center>
                                  <input type="file" accept="pdf/*" name="file_pdf" id="file_pdf" onchange="loadFile(event)">
                              </center>
                          </div>
                          <br>
                          <div class="card w-50 mx-auto">
                              <div class="card-body">
                                  <div class="mb-3 row text-left">
                                      <div class="col-sm-6 ">
                                          <div class="icheck-primary">
                                              <input type="checkbox" id="PilihA4" name="checkbox_a4" Value="1" onclick="checkboxFunction()">
                                              <label class="small mb-1" for="PilihA4" id="lblPilihA4">
                                                  Kirim Lokal
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="icheck-primary">
                                              <input type="checkbox" id="PilihF4" name="checkbox_f4" Value="1" onclick="checkboxFunction()">
                                              <label class="small mb-1" for="PilihF4" id="lblPilihF4">
                                                  Kirim Ekspor
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="mb-3 row text-left">
                                      <div class="col-sm-6">
                                          <div class="icheck-primary">
                                              <input type="checkbox" id="Pilihjenis1" name="checkbox_small" Value="1" onclick="checkboxFunction()">
                                              <label class="small mb-1" for="Pilihjenis1" id="lblPilihjenis1">
                                                  LCL
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="icheck-primary">
                                              <input type="checkbox" id="Pilihjenis2" name="checkbox_large" Value="1" onclick="checkboxFunction()">
                                              <label class="small mb-1" for="Pilihjenis2" id="lblPilihjenis2">
                                                  Full
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <div class="col-sm-6">
                                          <div class="input-group">
                                              <select class="form-control col-md-12 " aria-label="Default select example" id="option_wm" name="option_wm" style="display:none">
                                                  <option value="">-- Text --</option>
                                                  <option value="CONFIDENTIAL">CONFIDENTIAL</option>
                                                  <option value="COPY">COPY</option>
                                                  <option value="DRAFT">DRAFT</option>
                                                  <option value="TOP SECRET">TOP SECRET</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <input type="text" class="form-control " id="note" name="checkbox_text" style="display:none" placeholder="for PT.XYZ">
                                      </div>
                                  </div>

                                  <div class="mb-3 row">
                                      <div class="col-sm-6">
                                          <div class="input-group">
                                              <select class="form-control col-md-12 " aria-label="Default select example" id="font_wm" name="font_wm" style="display:none">
                                                  <option value="">-- Fonts --</option>
                                                  <option value="Arial">Arial</option>
                                                  <option value="ArialBOLD">ArialBOLD</option>
                                                  <option value="Courier">Courier</option>
                                                  <option value="Times New Roman">Times New Roman</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="input-group">
                                              <select class="form-control col-md-12 " aria-label="Default select example" id="opacity_wm" name="opacity_wm" style="display:none">
                                                  <option value="">-- Opacity --</option>
                                                  <option value="1">0.1</option>
                                                  <option value="2">0.2</option>
                                                  <option value="3">0.3</option>
                                                  <option value="4">0.4</option>
                                                  <option value="5">0.5</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Upload</button>
                      </form>
                  </div>
              </div>

          </div>
      </div>
      <div class="col-sm-6">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div style="text-align: center">
                      <center>
                          <iframe id="output" width="75%" height="700">
                              This browser does not support PDFs. Please download the PDF to view it: Download PDF.
                          </iframe>
                      </center>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script>
      var loadFile = function(event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
  </script>
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
                  font_wm.style.display = "block",
                  opacity_wm.style.display = "block",
                  checkBox1.style.display = "none",
                  lbl1.style.display = "none";

          } else {
              optionwm.style.display = "none",
                  text.style.display = "none",
                  font_wm.style.display = "none",
                  opacity_wm.style.display = "none",
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
  </script>