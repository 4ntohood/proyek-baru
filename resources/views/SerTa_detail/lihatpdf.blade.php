 <form action="{{route('open_pdf',$data->Column_ID)}}" method="GET">
     <div class="row">
         <div class="col-md-12 ">
             <label for="no" class="form-label">No.SerTa :</label>
             <input type="text" class="form-control" id="no" name="no" value="{{ $data->NO }}">
         </div>
     </div>
     <div class="row">
         <div class="col-md-12 ">
             <label for="nama" class="form-label">Nama Hak :</label>
             <div class="input-group-prepend">
                 <input type="text" class="form-control " id="nama" name="nama" value="{{ $data->NAMA }}">
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-12 ">
             <label for="suno" class="form-label">No.SU :</label>
             <div class="input-group-prepend">
                 <input type="text" class="form-control " id="suno" name="suno" value="{{ ($data->SUNO) }}">
             </div>
         </div>
     </div>
     <input type="text" name="cJenis" value="2" hidden />
     <div class="modal-footer">
         <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="hapus_temp()"><i class="fa fa-ban"></i> Close</button>
         <button type="submit" class="btn btn-outline-primary"><i class=" fa fa-book"></i> Open PDF</button>
     </div>
 </form>
 <script>
     function hapus_temp() {
         url = "hapus_temp_pdf";
         $.get(url, {}, function(data, status) {

         });
     }
 </script>