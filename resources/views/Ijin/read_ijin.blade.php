 <div class="table-responsive">
     <table id="tabel1" class="table table-bordered table-striped table-sm">
         <thead>
             <tr class="small mb-1">
                 <th width="10px" class="text-center">No</th>
                 <th width="400px" class="text-center">Nama Perusahaan</th>
                 <th class="text-center">Keterangan</th>
                 <th width="180px" class="text-center">Action</th>
             </tr>
         </thead>
         <tbody>
             @if(!empty($datax) && $datax->count())
             @foreach ($datax as $post)
             <tr class="small mb-1">
                 <td class="text-center">{{ ++$i }}</td>
                 <td><a class="nav-link" href="javascript:;" onclick='detailperkode("{{ $post->kode}}" );'>{{ strtoupper($post->nama) }}</a></td>
                 <td>{{ strtoupper($post->keterangan) }}</td>
                 <td style="white-space: nowrap" width=5%>
                     <button style="vertical-align: middle;" class="btn btn-success btn-xs btn-light" onclick='show("{{ $post->column_id }}")' title="Edit"><i class="fas fa-edit"></i></button>
                     <button style="vertical-align: middle;" class="btn btn-danger btn-xs btn-light" onclick='SwalDelete("{{ $post->column_id }}")' title="Hapus"><i class="fas fa-trash-alt"></i> </button>
                 </td>
             </tr>
             @endforeach
             @else
             <tr>
                 <td colspan="4" style="text-align: center;vertical-align:middle">Data Not Found!.</td>
             </tr>
             @endif
         </tbody>
     </table>
     <div class="d-flex justify-content-end">
         {{$datax->links()}}
     </div>
 </div>