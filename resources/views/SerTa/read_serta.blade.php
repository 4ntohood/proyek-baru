<div class="table-responsive">
    <table id="tabel1" class="table table-bordered table-striped table-sm display">
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
                <td class="text-center">{{++$i}}</td>
                <td><a id="mylink" class="nav-link" href="javascript:;" onclick='detailperkode("{{ $post->kode}}" );'>{{ strtoupper($post->nama) }}</a></td>
                <!-- <td><a href="javascript:void(0);" class="nav-link" data-id="{{$post->kode}}">{{ strtoupper($post->nama) }}</a></td> -->
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
<!-- <script>
    var table = $('#tabel1').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "retrieve": true,
        "paging": false,
        "rowCallback": function(row, data, index) {
            $node = this.api().row(row).nodes().to$();
            var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            var pengingat = data[7];
            var firstDate = new Date();
            var secondDate = new Date(data[3]);
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));

            if (diffDays > pengingat) {
                $node.addClass('green')
            }
            if ((diffDays > 1) && (diffDays < pengingat)) {
                $node.addClass('yellow')
            }
            if (diffDays < 1) {
                $node.addClass('red')
            }

        }
    })
</script> -->